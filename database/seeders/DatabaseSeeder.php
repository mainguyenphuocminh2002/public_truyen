<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeds;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // UserSeeds::class,
            // PermissionSeeds::class,
            // RoleSeeds::class,
            PermissionRoleSeeds::class,
            // UserRoleSeeds::class,
        ]);
    }
}
