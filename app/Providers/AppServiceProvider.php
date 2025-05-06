<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Device;
use App\Models\Document;
use App\Models\DeviceType;
use App\Models\Worksheet;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\DevicePolicy;
use App\Policies\DocumentPolicy;
use App\Policies\DeviceTypePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\WorksheetPolicy;
// use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        DeviceType::class => DeviceTypePolicy::class,
        Device::class => DevicePolicy::class,
        Document::class => DocumentPolicy::class,
        Worksheet::class => WorksheetPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // DB::connection()
        //     ->getDoctrineSchemaManager()
        //     ->getDatabasePlatform()
        //     ->registerDoctrineTypeMapping('enum', 'string');
    }
}
