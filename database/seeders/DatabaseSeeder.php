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

        // $this->call(\Modules\Mcode\Database\Seeders\McodeCategoriesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeCategoryMcodeFeatureTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeFeatureMcodeProductModelTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeFeaturesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeMcodeProductModelTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeProductModelsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(McodeFeaturesTableSeeder::class);
        $this->call(McodeProductModelsTableSeeder::class);
    }
}
