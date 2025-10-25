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

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function fromValue(string $value): ?self
    {
        return match($value) {
            'en' => self::EN,
            'hi' => self::HI,
            default => null
        };
    }

    public function getDisplayName(): string
    {
        return self::options()[$this->value];
    }

    public function getFlagCode(): string
    {
        return match($this) {
            self::EN => 'us',
            self::HI => 'in',
        };
    }
}
