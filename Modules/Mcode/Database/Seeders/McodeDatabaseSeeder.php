<?php

namespace Modules\Mcode\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class McodeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(McodePermissionsTableSeeder::class);
        $this->call(McodeProductModelsTableSeeder::class);
        $this->call(McodeCategoriesTableSeeder::class);
        $this->call(McodeCategoryMcodeFeatureTableSeeder::class);
        $this->call(McodeFeatureMcodeProductModelTableSeeder::class);
        $this->call(McodeFeaturesTableSeeder::class);
        $this->call(McodeMcodeProductModelTableSeeder::class);
        $this->call(McodesTableSeeder::class);
        $this->call(MediaTableSeeder::class);
 

    }
}
