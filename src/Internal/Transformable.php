<?php

namespace Zerotoprod\Sdk\Internal;

use BackedEnum;

/** @internal */
trait Transformable
{
    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return self::convertToArray((array) $this);
    }

    /**
     * Recursively convert nested objects/arrays to plain arrays.
     *
     * @param  array<mixed, mixed>  $items
     * @return array<string, mixed>
     */
    private static function convertToArray(array $items): array
    {
        $array = [];

        /** @var mixed $value */
        foreach ($items as $property => $value) {
            if ($value !== null) {
                if ($value instanceof BackedEnum) {
                    $array[$property] = $value->value;
                    continue;
                }
                $array[$property] = is_array($value) || is_object($value)
                    ? self::convertToArray((array) $value)
                    : $value;
            }
        }

        return $array;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray()) ?: '';
    }
}
