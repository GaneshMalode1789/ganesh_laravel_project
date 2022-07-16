<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateSkillSeeder::class,
            PermissionTableSeeder::class,
            CreateDefaultRoleSeeder::class,
            CreateAdminUserSeeder::class
        ]);
    }
}
