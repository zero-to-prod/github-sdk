<?php

declare(strict_types=1);

namespace Zerotoprod\Sdk\Generator;

/**
 * What one OpenAPI schema became, in PHP terms.
 *
 * This is the currency passed between {@see SchemaMapper} and its callers: the
 * PHP types to declare, whether null is allowed, the `#[Describe]` entries the
 * hydrator needs, and the `@var` docblock for anything the type declaration
 * cannot express (element types of an array, most importantly).
 *
 * @internal
 */
final class TypeSpec
{
    /**
     * @param list<string>          $types     PHP type names, never including `null`.
     * @param array<string, string> $describe  `#[Describe]` entries as raw key => raw PHP expression.
     * @param string|null           $docType   `@var` type when the declaration cannot say it.
     * @param string|null           $className Model or enum class this maps to, when it maps to one.
     * @param bool                  $isEnum    Whether `$className` is an enum rather than a model.
     * @param bool                  $hasUnknown Whether that enum has an `unknown` case to default to.
     */
    public function __construct(
        public readonly array $types,
        public readonly bool $nullable = false,
        public readonly array $describe = [],
        public readonly ?string $docType = null,
        public readonly ?string $className = null,
        public readonly bool $isEnum = false,
        public readonly bool $hasUnknown = false,
    ) {}

    /** A scalar or pseudo-type with nothing else attached. */
    public static function of(string $type, bool $nullable = false): self
    {
        return new self([$type], $nullable);
    }

    /** The same spec, but permitting null. */
    public function asNullable(): self
    {
        return $this->nullable ? $this : new self(
            $this->types,
            true,
            $this->describe,
            $this->docType,
            $this->className,
            $this->isEnum,
            $this->hasUnknown,
        );
    }

    /** Whether this is exactly `array` — the shape that carries a `default => []`. */
    public function isArray(): bool
    {
        return $this->types === ['array'];
    }
}
