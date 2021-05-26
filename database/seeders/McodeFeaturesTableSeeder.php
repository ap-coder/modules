<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class McodeFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcode_features')->delete();
        
        \DB::table('mcode_features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'published' => 1,
                'mcode' => 'M10004',
                'name' => 'USB Downloader Mode',
            'description' => 'USB HID Native One-Way (Downloader) Mode',
            'source_string' => '%01X%1D%02C(1b)5%04%01X%1D%02C(42)0%04%01X%1D%02C(08)1%04',
            'safe_source' => '%01X%1D%02C(1b)5%04%01X%1D%02C(42)0%04%01X%1D%02C(08)1%04',
                'client_name' => 'USB Downloader Mode',
            'client_description' => 'Reader - USB HID Native One-Way (Downloader) Mode',
                'state' => 'Approved',
                'template' => NULL,
                'defaults' => NULL,
                'slug' => NULL,
                'created_at' => '2021-05-26 17:59:04',
                'updated_at' => '2021-05-26 17:59:04',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}