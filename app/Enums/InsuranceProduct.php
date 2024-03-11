<?php

namespace App\Enums;

enum InsuranceProduct: string
{
    case HOME = 'home';
    case AUTO = 'auto';
    case RECREATIONAL_VEHICLE = 'recreational_vehicle';

    public static function toArray(): array
    {
        $cases = [];

        foreach (self::cases() as $case) {
            $cases[$case->value] = $case->name;
        }

        return $cases;
    }
}