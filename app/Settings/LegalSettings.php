<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LegalSettings extends Settings
{
    public string $refund_policy;

    public string $privacy_policy;

    public string $terms_of_service;

    public static function group(): string
    {
        return 'legal';
    }
}
