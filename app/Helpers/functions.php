<?php

use App\Enums\SuporteStatus;

if (!function_exists('getStatusSuporte')) {
    function getStatusSuporte(string $status): string
    {
        return SuporteStatus::fromValue($status);
    }
}

if (!function_exists('getInitials')) {
    function getInitials($name)
    {
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1)); 
            if (strlen($initials) >= 2) {
                break; 
            }
        }

        return $initials;
    }
}