<?php

namespace App;

enum SupportedLocale: string
{
 case EN = 'en';
    case HI = 'hi';
    case FR = 'fr'; 
    case ES = 'es';
    case PT = 'pt';

    public static function labels(): array
    {
        return [
            self::EN->value => 'English',
            self::HI->value => 'Hindi',
            self::FR->value => 'French',
            self::ES->value => 'Spanish',
            self::PT->value => 'Portuguese',
        ];
    }
}
