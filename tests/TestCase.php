<?php

namespace Tests;

use App\Models\User;
use Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();

        Artisan::call('authorizer:permissions:generate');
    }

    /**
     * Create a super admin user.
     *
     * @return User
     */
    protected function superAdminUser(): User
    {
        $user = User::factory()->create();
        $user->assignRole(Role::findOrCreate('super admin'));

        return $user;
    }

    protected function adminUser()
    {
        $user = User::factory()->create();
        $user->givePermissionTo(
            Permission::findOrCreate('view admin dashboard'),
        );

        return $user;
    }

    /**
     * Create a user.
     *
     * @return User
     */
    protected function user(): User
    {
        return User::factory()->create();
    }
}
