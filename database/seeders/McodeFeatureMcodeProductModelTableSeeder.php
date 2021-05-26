<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class McodeFeatureMcodeProductModelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcode_feature_mcode_product_model')->delete();
        
        \DB::table('mcode_feature_mcode_product_model')->insert(array (
            0 => 
            array (
                'mcode_feature_id' => 1,
                'mcode_product_model_id' => 2,
            ),
        ));
        
        
    }
}