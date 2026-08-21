<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * Rewrites the data-model generator's raw output into this package's house
 * style.
 *
 * The emitter is deliberately crude: no indentation, no blank lines, no
 * `declare(strict_types=1)`, fully-qualified attribute names, `string|null`
 * instead of `?string`, and every constant grouped ahead of every property.
 * Rather than fork the emitter, this pass reads what it wrote and fixes all of
 * it in one place:
 *
 *  - inserts `declare(strict_types=1);` and sorts imports
 *  - shortens `#[\Zerotoprod\DataModel\Describe(` to the imported `#[Describe(`
 *  - rewrites the `DataModelHelper::class` cast to `[self::class, 'mapOf']`
 *  - collapses `T|null` to `?T` and gives it a `= null` default
 *  - gives every `array` property a `'default' => []`
 *  - re-pairs each constant with the property it documents
 *  - indents four spaces and separates members with blank lines
 *
 * It parses the emitter's own output shape, not arbitrary PHP: a line is a
 * constant, a case, a property, a trait use, an attribute, or a comment.
 *
 * @internal
 */
final class Normalizer
{
    public const INDENT = '    ';

    /** Column the class docblock and description text wrap at. */
    public const WIDTH = 74;

    private const FQ_DESCRIBE = '#[\\Zerotoprod\\DataModel\\Describe(';
    private const FQ_HELPER = '\\Zerotoprod\\DataModelHelper\\DataModelHelper::class';

    /**
     * Normalize one emitted file.
     *
     * @throws GeneratorException when the input is not something the emitter produced.
     */
    public static function normalize(string $source): string
    {
        $lines = array_map(rtrim(...), explode("\n", trim($source)));

        if ($lines[0] !== '<?php') {
            throw new GeneratorException('Emitted file does not begin with `<?php` — refusing to normalize it.');
        }

        $declaration = null;

        foreach ($lines as $index => $line) {
            if (preg_match('/^(?:readonly )?(?:class|enum) /', $line) === 1) {
                $declaration = $index;
                break;
            }
        }

        if ($declaration === null) {
            throw new GeneratorException('Emitted file declares neither a class nor an enum.');
        }

        $namespace = null;
        $imports = [];
        $docblock = [];

        foreach (array_slice($lines, 1, $declaration - 1) as $line) {
            if (str_starts_with($line, 'namespace ')) {
                $namespace = $line;
            } elseif (preg_match('/^use \S+;$/', $line) === 1) {
                $imports[] = $line;
            } elseif ($line !== '') {
                $docblock[] = $line;
            }
        }

        sort($imports);

        $body = self::renderBody(
            self::parseMembers(array_slice($lines, $declaration + 2, count($lines) - $declaration - 3)),
        );

        $out = ['<?php', '', 'declare(strict_types=1);', ''];

        if ($namespace !== null) {
            $out[] = $namespace;
            $out[] = '';
        }

        if ($imports !== []) {
            $out = [...$out, ...$imports, ''];
        }

        $out = [...$out, ...$docblock, $lines[$declaration], '{', ...$body, '}'];

        return implode("\n", $out) . "\n";
    }

    /**
     * Split the class body into members. Comments and attributes accumulate
     * until the line they belong to arrives.
     *
     * @param  list<string> $lines
     * @return list<array{kind: string, name: string, doc: list<string>, attributes: list<string>, line: string}>
     */
    private static function parseMembers(array $lines): array
    {
        $members = [];
        $doc = [];
        $attributes = [];

        foreach ($lines as $line) {
            if ($line === '') {
                continue;
            }

            if (str_starts_with($line, '#[')) {
                $attributes[] = $line;
                continue;
            }

            $kind = null;
            $name = '';

            if (preg_match('/^use \S+;$/', $line) === 1) {
                $kind = 'trait';
            } elseif (preg_match('/^(?:public|protected|private) const (?:\S+ )?(\w+) =/', $line, $match) === 1) {
                $kind = 'constant';
                $name = $match[1];
            } elseif (preg_match('/^case (\w+)/', $line, $match) === 1) {
                $kind = 'case';
                $name = $match[1];
            } elseif (preg_match('/^(?:public|protected|private)(?: readonly)? \S+ \$(\w+)/', $line, $match) === 1) {
                $kind = 'property';
                $name = $match[1];
            }

            if ($kind === null) {
                $doc[] = $line;
                continue;
            }

            $members[] = ['kind' => $kind, 'name' => $name, 'doc' => $doc, 'attributes' => $attributes, 'line' => $line];
            $doc = [];
            $attributes = [];
        }

        return $members;
    }

    /**
     * Emit the members in house order: trait uses, then each property directly
     * behind the constant that names it, then anything left over.
     *
     * @param  list<array{kind: string, name: string, doc: list<string>, attributes: list<string>, line: string}> $members
     * @return list<string>
     */
    private static function renderBody(array $members): array
    {
        $traits = array_values(array_filter($members, static fn(array $m): bool => $m['kind'] === 'trait'));
        $cases = array_values(array_filter($members, static fn(array $m): bool => $m['kind'] === 'case'));
        $properties = array_values(array_filter($members, static fn(array $m): bool => $m['kind'] === 'property'));

        /** @var array<string, array{kind: string, name: string, doc: list<string>, attributes: list<string>, line: string}> $constants */
        $constants = [];

        foreach ($members as $member) {
            if ($member['kind'] === 'constant') {
                $constants[$member['name']] = $member;
            }
        }

        $blocks = [];

        foreach ($traits as $trait) {
            $blocks[] = [self::INDENT . $trait['line']];
        }

        foreach ($properties as $property) {
            $block = [];

            if (isset($constants[$property['name']])) {
                $block = self::plain($constants[$property['name']]);
                unset($constants[$property['name']]);
            }

            $blocks[] = [...$block, ...self::renderProperty($property)];
        }

        foreach ($constants as $constant) {
            $blocks[] = self::plain($constant);
        }

        // Enum cases read as a table; a blank line between each would only
        // stretch it out.
        if ($cases !== []) {
            $blocks[] = array_merge(...array_map(self::plain(...), $cases));
        }

        $out = [];

        foreach ($blocks as $index => $block) {
            if ($index > 0) {
                $out[] = '';
            }

            $out = [...$out, ...$block];
        }

        return $out;
    }

    /**
     * A member that needs no rewriting — a constant, an enum case, a trait use.
     *
     * @param  array{kind: string, name: string, doc: list<string>, attributes: list<string>, line: string} $member
     * @return list<string>
     */
    private static function plain(array $member): array
    {
        return array_map(
            static fn(string $line): string => self::INDENT . $line,
            [...$member['doc'], ...$member['attributes'], $member['line']],
        );
    }

    /**
     * A property: shortened attributes, `?T` instead of `T|null`, a `= null`
     * default where one is implied, and a `'default' => []` for lists.
     *
     * @param  array{kind: string, name: string, doc: list<string>, attributes: list<string>, line: string} $property
     * @return list<string>
     */
    private static function renderProperty(array $property): array
    {
        preg_match(
            '/^(public|protected|private)( readonly)? (\S+) \$(\w+)(?: = (.+))?;$/',
            $property['line'],
            $match,
        );

        if ($match === []) {
            throw new GeneratorException("Cannot parse emitted property: {$property['line']}");
        }

        [, $visibility, $readonly, $rawType, $name] = $match;
        $given = $match[5] ?? '';

        $types = explode('|', $rawType);
        $nullable = in_array('null', $types, true);
        $bare = array_values(array_filter($types, static fn(string $type): bool => $type !== 'null'));

        if (in_array('mixed', $bare, true)) {
            // `mixed` already admits null and PHP rejects `?mixed`, so the
            // nullability is expressed by the default alone.
            $type = 'mixed';
        } elseif ($nullable && count($bare) === 1) {
            // `?T` only reads as null-or-T for a single type; a real union keeps
            // `|null` because PHP has no shorthand for it.
            $type = "?$bare[0]";
        } else {
            $type = implode('|', [...$bare, ...($nullable ? ['null'] : [])]);
        }

        $default = $given !== '' ? $given : ($nullable ? 'null' : null);
        $attributes = array_map(self::attribute(...), $property['attributes']);

        // A list is never null here: it defaults to `[]` so callers can append
        // without a null check.
        if ($rawType === 'array' && !$readonly) {
            $attributes = self::withArrayDefault($attributes);
        }

        $signature = implode(' ', array_filter([$visibility, trim($readonly), $type, "\$$name"]))
            . ($default !== null ? " = $default" : '')
            . ';';

        return [
            ...array_map(static fn(string $line): string => self::INDENT . $line, $property['doc']),
            ...array_merge([], ...array_map(self::indentAttribute(...), $attributes)),
            self::INDENT . $signature,
        ];
    }

    /** Shorten the fully-qualified names the emitter writes out. */
    private static function attribute(string $attribute): string
    {
        return str_replace(
            [self::FQ_DESCRIBE, self::FQ_HELPER],
            ['#[Describe(', 'self::class'],
            $attribute,
        );
    }

    /**
     * Ensure exactly one `#[Describe]` carries `'default' => []`, adding the
     * attribute outright when the property has none.
     *
     * @param  list<string> $attributes
     * @return list<string>
     */
    private static function withArrayDefault(array $attributes): array
    {
        foreach ($attributes as $index => $attribute) {
            if (!str_starts_with($attribute, '#[Describe([')) {
                continue;
            }

            $entries = self::entries($attribute);

            foreach ($entries as $entry) {
                if (str_starts_with($entry, "'default'")) {
                    return $attributes;
                }
            }

            $entries[] = "'default' => []";
            $attributes[$index] = '#[Describe([' . implode(', ', $entries) . '])]';

            return $attributes;
        }

        return [...$attributes, "#[Describe(['default' => []])]"];
    }

    /**
     * Render one attribute, breaking a multi-entry `#[Describe]` across lines
     * with a trailing comma.
     *
     * @return list<string>
     */
    private static function indentAttribute(string $attribute): array
    {
        if (!str_starts_with($attribute, '#[Describe([')) {
            return [self::INDENT . $attribute];
        }

        $entries = self::entries($attribute);

        if (count($entries) < 2) {
            return [self::INDENT . $attribute];
        }

        return [
            self::INDENT . '#[Describe([',
            ...array_map(static fn(string $entry): string => self::INDENT . self::INDENT . "$entry,", $entries),
            self::INDENT . '])]',
        ];
    }

    /**
     * The top-level entries of a `#[Describe([...])]` payload. Splits on commas
     * that are not inside a nested array, call or string.
     *
     * @return list<string>
     */
    private static function entries(string $attribute): array
    {
        $inner = substr($attribute, strlen('#[Describe(['), -strlen('])]'));
        $entries = [];
        $buffer = '';
        $depth = 0;
        $quote = null;
        $length = strlen($inner);

        for ($i = 0; $i < $length; $i++) {
            $character = $inner[$i];

            if ($quote !== null) {
                $buffer .= $character;

                if ($character === '\\' && $i + 1 < $length) {
                    $buffer .= $inner[++$i];
                } elseif ($character === $quote) {
                    $quote = null;
                }

                continue;
            }

            if ($character === "'" || $character === '"') {
                $quote = $character;
            } elseif ($character === '[' || $character === '(') {
                $depth++;
            } elseif ($character === ']' || $character === ')') {
                $depth--;
            } elseif ($character === ',' && $depth === 0) {
                $entries[] = trim($buffer);
                $buffer = '';

                continue;
            }

            $buffer .= $character;
        }

        $buffer = trim($buffer);

        if ($buffer !== '') {
            $entries[] = $buffer;
        }

        return $entries;
    }
}
