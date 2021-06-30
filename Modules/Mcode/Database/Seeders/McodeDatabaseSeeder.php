<?php

namespace Modules\Mcode\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class McodeDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodePermissionsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(PermissionRoleTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(RoleUserTableSeeder::class);

        // $this->call(\Modules\Mcode\Database\Seeders\McodeCategoriesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeCategoryMcodeFeatureTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeFeatureMcodeProductModelTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeFeaturesTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeMcodeProductModelTableSeeder::class);
        // $this->call(\Modules\Mcode\Database\Seeders\McodeProductModelsTableSeeder::class);
        $this->call(McodePermissionsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(McodeFeaturesTableSeeder::class);
        $this->call(McodeProductModelsTableSeeder::class);
        $this->call(McodeCategoriesTableSeeder::class);
        $this->call(McodesTableSeeder::class);
        $this->call(McodeCategoryMcodeFeatureTableSeeder::class);
        $this->call(McodeFeatureMcodeProductModelTableSeeder::class);
        $this->call(McodeMcodeProductModelTableSeeder::class);
        // $this->call(PersonalAccessTokensTableSeeder::class);
    }
}
