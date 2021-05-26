<?php

namespace Database\Seeders;

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
                'mcode_id' => 6,
                'mcode_product_model_id' => 17,
            ),
            2 => 
            array (
                'mcode_id' => 7,
                'mcode_product_model_id' => 3,
            ),
            3 => 
            array (
                'mcode_id' => 7,
                'mcode_product_model_id' => 15,
            ),
            4 => 
            array (
                'mcode_id' => 8,
                'mcode_product_model_id' => 4,
            ),
            5 => 
            array (
                'mcode_id' => 9,
                'mcode_product_model_id' => 11,
            ),
            6 => 
            array (
                'mcode_id' => 9,
                'mcode_product_model_id' => 12,
            ),
            7 => 
            array (
                'mcode_id' => 10,
                'mcode_product_model_id' => 12,
            ),
            8 => 
            array (
                'mcode_id' => 11,
                'mcode_product_model_id' => 25,
            ),
            9 => 
            array (
                'mcode_id' => 12,
                'mcode_product_model_id' => 26,
            ),
            10 => 
            array (
                'mcode_id' => 13,
                'mcode_product_model_id' => 9,
            ),
            11 => 
            array (
                'mcode_id' => 14,
                'mcode_product_model_id' => 8,
            ),
            12 => 
            array (
                'mcode_id' => 15,
                'mcode_product_model_id' => 8,
            ),
            13 => 
            array (
                'mcode_id' => 16,
                'mcode_product_model_id' => 19,
            ),
            14 => 
            array (
                'mcode_id' => 5,
                'mcode_product_model_id' => 18,
            ),
            15 => 
            array (
                'mcode_id' => 17,
                'mcode_product_model_id' => 7,
            ),
            16 => 
            array (
                'mcode_id' => 3,
                'mcode_product_model_id' => 14,
            ),
            17 => 
            array (
                'mcode_id' => 4,
                'mcode_product_model_id' => 24,
            ),
        ));
        
        
    }
}