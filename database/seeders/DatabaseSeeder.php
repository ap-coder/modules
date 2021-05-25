<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call(PermissionsTableSeeder::class);
        $this->call(\Modules\Mcode\Database\Seeders\McodePermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);

        $this->call(McodeCategoriesTableSeeder::class);
    }
}
