<?php

use App\Models\Setting;

if (!function_exists('getSetting')) {
    /**
     * Get setting value by key
     */
    function getSetting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('getLogo')) {
    /**
     * Get logo URL
     */
    function getLogo()
    {
        $logo = Setting::get('logo');
        return $logo ? asset('storage/' . $logo) : null;
    }
}

if (!function_exists('getFavicon')) {
    /**
     * Get favicon URL
     */
    function getFavicon()
    {
        $favicon = Setting::get('favicon');
        return $favicon ? asset('storage/' . $favicon) : null;
    }
}
