<?php

namespace Modules\Mcode\Database\Seeders;

use Illuminate\Database\Seeder;

class McodeMcodeProductModelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcode_mcode_product_model')->delete();
        
        \DB::table('mcode_mcode_product_model')->insert(array (
            0 => 
            array (
                'mcode_id' => 1,
                'mcode_product_model_id' => 1,
            ),
            1 => 
            array (
                'mcode_id' => 2,
                'mcode_product_model_id' => 23,
            ),
            2 => 
            array (
                'mcode_id' => 2,
                'mcode_product_model_id' => 30,
            ),
            3 => 
            array (
                'mcode_id' => 2,
                'mcode_product_model_id' => 35,
            ),
            4 => 
            array (
                'mcode_id' => 3,
                'mcode_product_model_id' => 14,
            ),
            5 => 
            array (
                'mcode_id' => 3,
                'mcode_product_model_id' => 24,
            ),
            6 => 
            array (
                'mcode_id' => 4,
                'mcode_product_model_id' => 24,
            ),
            7 => 
            array (
                'mcode_id' => 5,
                'mcode_product_model_id' => 7,
            ),
            8 => 
            array (
                'mcode_id' => 5,
                'mcode_product_model_id' => 18,
            ),
            9 => 
            array (
                'mcode_id' => 6,
                'mcode_product_model_id' => 17,
            ),
            10 => 
            array (
                'mcode_id' => 7,
                'mcode_product_model_id' => 3,
            ),
            11 => 
            array (
                'mcode_id' => 7,
                'mcode_product_model_id' => 15,
            ),
            12 => 
            array (
                'mcode_id' => 8,
                'mcode_product_model_id' => 28,
            ),
            13 => 
            array (
                'mcode_id' => 9,
                'mcode_product_model_id' => 11,
            ),
            14 => 
            array (
                'mcode_id' => 9,
                'mcode_product_model_id' => 29,
            ),
            15 => 
            array (
                'mcode_id' => 10,
                'mcode_product_model_id' => 12,
            ),
            16 => 
            array (
                'mcode_id' => 11,
                'mcode_product_model_id' => 25,
            ),
            17 => 
            array (
                'mcode_id' => 12,
                'mcode_product_model_id' => 26,
            ),
            18 => 
            array (
                'mcode_id' => 13,
                'mcode_product_model_id' => 9,
            ),
            19 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 8,
            ),
            20 => 
            array (
                'mcode_id' => 16,
                'mcode_product_model_id' => 19,
            ),
            21 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 19,
            ),
            22 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 31,
            ),
            23 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 32,
            ),
            24 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 33,
            ),
            25 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 36,
            ),
            26 => 
            array (
                'mcode_id' => 15,
                'mcode_product_model_id' => 8,
            ),
            27 => 
            array (
                'mcode_id' => 17,
                'mcode_product_model_id' => 7,
            ),
            28 => 
            array (
                'mcode_id' => 17,
                'mcode_product_model_id' => 18,
            ),
        ));
        
        
    }
}