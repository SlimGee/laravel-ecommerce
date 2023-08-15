<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    /**
     * @var string The name of the site
     */
    public string $site_name;

    /**
     * @var string The contact email of the site
     */
    public string $contact_email;

    /**
     * @var string The sender email of the site
     */
    public string $sender_email;

    /**
     * @var string The legal name of the site
     */
    public string $legal_name;

    /**
     * @var string The phone number of the site
     */
    public string $phone;

    /**
     * @var string The address of the site
     */
    public string $address;

    /**
     * @var string The city of the site
     */
    public string $city;

    /**
     * @var string The country of the site
     */
    public string $country;

    /**
     * @var string The currency of the site
     */
    public string $currency;

    /**
     * @var string The currency symbol of the site
     */
    public string $currency_symbol;

    /**
     * @var string The analytics code of the site
     */
    public string $google_analytics_code;

    /**
     * @var bool The status of the site
     */
    public bool $active;


    public static function group(): string
    {
        return 'general';
    }
}
