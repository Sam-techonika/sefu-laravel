<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key or all settings
     * 
     * @param string|null $key Setting key
     * @param mixed $default Default value
     * @return mixed
     */
    function setting(?string $key = null, $default = null)
    {
        try {
            if (is_null($key)) {
                return Setting::allAsArray();
            }
            return Setting::get($key, $default);
        } catch (\Throwable $e) {
            return is_null($key) ? [] : $default;
        }
    }
}

if (!function_exists('whatsapp_url')) {
    /**
     * Generate WhatsApp URL
     * 
     * @param string|null $number WhatsApp number
     * @param string $message Pre-filled message
     * @return string|null
     */
    function whatsapp_url(?string $number = null, string $message = ''): ?string
    {
        $number = $number ?? setting('whatsapp_number');
        if (empty($number)) return null;
        
        $clean = preg_replace('/[^0-9]/', '', $number);
        $url = "https://wa.me/{$clean}";
        
        if ($message) {
            $url .= "?text=" . urlencode($message);
        }
        
        return $url;
    }
}
