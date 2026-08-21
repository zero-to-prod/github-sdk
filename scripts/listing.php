<?php

declare(strict_types=1);

/**
 * Render the composer script listing that CLAUDE.md carries.
 *
 * This is what `composer run -l` prints, rebuilt from the same source it reads:
 * the `scripts` and `scripts-descriptions` blocks of composer.json. Shelling out
 * to composer itself is not an option -- the php:*-alpine services the test
 * suite runs in ship php and nothing else, so `composer` there exits 127.
 *
 * Composer cannot know about per-script flags, so those are read back out of the
 * `# --flag` header comments of the script each entry points at, which is where
 * the old `./run` dispatcher read them from too.
 */

$root = dirname(__DIR__);
$manifest = $root.'/composer.json';

if (!is_file($manifest)) {
    fwrite(STDERR, "listing: composer.json not found at {$manifest}\n");
    exit(1);
}

$decoded = json_decode((string) file_get_contents($manifest), true);

if (!is_array($decoded)) {
    fwrite(STDERR, "listing: composer.json is not valid JSON\n");
    exit(1);
}

$scripts = is_array($decoded['scripts'] ?? null) ? $decoded['scripts'] : [];
$descriptions = is_array($decoded['scripts-descriptions'] ?? null) ? $decoded['scripts-descriptions'] : [];

$lines = ['Usage: composer <script>', '', 'Scripts:'];

foreach ($scripts as $name => $definition) {
    // Lifecycle hooks are wiring composer fires on its own, not commands.
    if (preg_match('/^(pre|post)-/', (string) $name) === 1) {
        continue;
    }

    $description = is_string($descriptions[$name] ?? null) ? $descriptions[$name] : '';
    $lines[] = rtrim(sprintf('  %-20s %s', $name, $description));

    // Flags live in the target script's header, and only single-command entries
    // point at one. A composite (`check`, `fix`) has no flags of its own.
    if (!is_string($definition) || !str_starts_with($definition, 'scripts/')) {
        continue;
    }

    $target = $root.'/'.$definition;

    if (!is_file($target)) {
        continue;
    }

    foreach (flags($target) as $flag) {
        $lines[] = rtrim(sprintf('  %-20s   %s', '', $flag));
    }
}

echo implode("\n", $lines)."\n";

/**
 * The `# --flag  description` comment lines in a script's header block, in order.
 *
 * @return list<string>
 */
function flags(string $script): array
{
    $found = [];

    foreach (array_slice((array) file($script), 2) as $line) {
        $line = rtrim((string) $line, "\n");

        // The header block ends at the first line that is not a comment.
        if ($line === '' || $line[0] !== '#') {
            break;
        }

        if (preg_match('/^#\s*(--.*)$/', $line, $matches) === 1) {
            $found[] = rtrim($matches[1]);
        }
    }

    return $found;
}
