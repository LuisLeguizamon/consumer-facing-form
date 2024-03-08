<?php

namespace App\Enums;

enum InsuranceProduct: string
{
    case HOME = 'home';
    case AUTO = 'auto';
    case RECREATIONAL_VEHICLE = 'recreational_vehicle';

    public static function toArray()
    {
        $cases = [];

        foreach (self::cases() as $case) {
            $cases[$case->value] = ucwords(strtolower(str_replace('_', ' ', $case->name )));
        }

        return $cases;
    }
}