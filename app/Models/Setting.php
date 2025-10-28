<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    /**
     * Get all settings as an associative array (values JSON-decoded when possible).
     */
    public static function allAsArray(): array
    {
        return static::all()->mapWithKeys(function ($item) {
            $val = $item->value;

            // try to decode JSON
            $decoded = null;
            if (is_string($val)) {
                $try = json_decode($val, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $decoded = $try;
                }
            }

            return [$item->key => $decoded ?? $val];
        })->toArray();
    }

    /**
     * Get a single setting value by key with optional default.
     */
    public static function get(string $key, $default = null)
    {
        $item = static::where('key', $key)->first();
        if (! $item) {
            return $default;
        }

        $val = $item->value;
        if (is_string($val)) {
            $try = json_decode($val, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return $try;
            }
        }

        return $val;
    }

    /**
     * Store a setting by key. Arrays/objects will be JSON-encoded.
     */
    public static function set(string $key, $value, ?string $type = null)
    {
        if (is_array($value) || is_object($value)) {
            $store = json_encode($value);
        } else {
            $store = $value;
        }

        return static::updateOrCreate([
            'key' => $key,
        ], [
            'value' => $store,
            'type' => $type,
        ]);
    }

    /**
     * If a value is stored as a storage path, return a public URL.
     */
    public static function url(string $key)
    {
        $item = static::where('key', $key)->first();
        if (! $item || ! $item->value) {
            return null;
        }

        if (Storage::disk('public')->exists($item->value)) {
            return Storage::url($item->value);
        }

        return $item->value;
    }
}
