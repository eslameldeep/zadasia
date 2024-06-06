<?php

namespace App\Domain\Core\Traits;

trait EnumTrait
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function inverted_array(): array
    {
        return array_combine(self::names(), self::values());
    }


    public static function findValueByName(string $name): ?string
    {
        $invertedArray = self::inverted_array();
        return $invertedArray[$name] ?? null;
    }
}
