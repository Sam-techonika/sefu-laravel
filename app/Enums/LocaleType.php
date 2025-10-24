<?php

namespace App\Enums;

enum LocaleType: string
{
    case EN = 'en';
    case HI = 'hi';

    public static function options(): array
    {
        return [
            self::EN->value => 'English',
            self::HI->value => 'Hindi',
        ];
    }
}
