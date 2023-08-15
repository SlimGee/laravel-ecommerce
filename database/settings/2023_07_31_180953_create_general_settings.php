<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Site Name');
        $this->migrator->add('general.contact_email', 'please@change.me');
        $this->migrator->add('general.sender_email', 'please@change.me');
        $this->migrator->add('general.phone', '077 526 2092');
        $this->migrator->add('general.legal_name', 'Your Business Name');
        $this->migrator->add('general.address', 'Street Address');
        $this->migrator->add('general.city', 'Harare');
        $this->migrator->add('general.country', 'Zimbabwe');
        $this->migrator->add('general.currency', 'USD');
        $this->migrator->add('general.currency_symbol', '$');
        $this->migrator->add('general.google_analytics_code', '');
        $this->migrator->add('general.active', true);
    }
};
