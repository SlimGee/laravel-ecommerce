<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('legal.refund_policy', '');
        $this->migrator->add('legal.privacy_policy', '');
        $this->migrator->add('legal.terms_of_service', '');
    }
};
