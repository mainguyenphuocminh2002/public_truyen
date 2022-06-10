<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Admin\Roles;
use App\Models\Admin\Authors;
use App\Models\Admin\Chapters;
use App\Models\Admin\Products;
use App\Models\Admin\Categorys;
use App\Models\Admin\Permissions;
use App\Policies\Admin\AdminUserPolicy;
use App\Policies\Admin\AdminRolesPolicy;
use App\Policies\Admin\AdminAuthorsPolicy;
use App\Policies\Admin\AdminChaptersPolicy;
use App\Policies\Admin\AdminProductsPolicy;
use App\Policies\Admin\AdminCategorysPolicy;
use App\Policies\Admin\AdminPermissionsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => AdminUserPolicy::class,
        Roles::class=>AdminRolesPolicy::class,
        Permissions::class=>AdminPermissionsPolicy::class,
        Chapters::class=>AdminChaptersPolicy::class,
        Authors::class=>AdminAuthorsPolicy::class,
        Categorys::class=>AdminCategorysPolicy::class,
        Products::class=>AdminProductsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Gate::define('check',function($user){
        //     return TRUE;
        // });


    }
}
