<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class McodeCategoryMcodeFeatureTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcode_category_mcode_feature')->delete();
        
        \DB::table('mcode_category_mcode_feature')->insert(array (
            0 => 
            array (
                'mcode_feature_id' => 1,
                'mcode_category_id' => 1,
            ),
        ));
        
        
    }
}