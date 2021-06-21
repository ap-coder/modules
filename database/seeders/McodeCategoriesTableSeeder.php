<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class McodeCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcode_categories')->delete();
        
        \DB::table('mcode_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'published' => 1,
                'name' => 'Bluetooth Settings',
                'description' => NULL,
                'slug' => 'bluetooth-settings',
                'order' => NULL,
                'created_at' => '2021-05-24 23:42:05',
                'updated_at' => '2021-05-24 23:42:05',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'published' => 1,
                'name' => 'Communication Mode Settings',
                'description' => NULL,
                'slug' => 'communication-mode-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:04:50',
                'updated_at' => '2021-05-25 00:04:50',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'published' => 1,
                'name' => 'Custom Terminal Settings',
                'description' => NULL,
                'slug' => 'custom-terminal-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:05:05',
                'updated_at' => '2021-05-25 00:05:05',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'published' => 1,
            'name' => 'Data Formatting (Prefix/Suffix) Settings',
                'description' => NULL,
                'slug' => 'data-formatting-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:05:31',
                'updated_at' => '2021-05-25 00:05:31',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'published' => 1,
                'name' => 'Data Validation',
                'description' => NULL,
                'slug' => 'data-validation',
                'order' => NULL,
                'created_at' => '2021-05-25 00:05:50',
                'updated_at' => '2021-05-25 00:05:50',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'published' => 1,
                'name' => 'General Modem Settings',
                'description' => NULL,
                'slug' => 'general-modem-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:05:59',
                'updated_at' => '2021-05-25 00:05:59',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'published' => 1,
                'name' => 'General Reading Mode Settings',
                'description' => NULL,
                'slug' => 'general-reading-mode-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:06:08',
                'updated_at' => '2021-05-25 00:06:08',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'published' => 1,
                'name' => 'Keyboard Language Settings',
                'description' => NULL,
                'slug' => 'keyboard-language-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:06:17',
                'updated_at' => '2021-05-25 00:06:17',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'published' => 1,
                'name' => 'Miscellaneous Settings',
                'description' => NULL,
                'slug' => 'miscellaneous-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:06:25',
                'updated_at' => '2021-05-25 00:06:25',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'published' => 1,
                'name' => 'Operating System Settings',
                'description' => NULL,
                'slug' => 'operating-system-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:06:36',
                'updated_at' => '2021-05-25 00:06:36',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'published' => 1,
                'name' => 'Reader / Modem Command Settings',
                'description' => NULL,
                'slug' => 'reader-modem-command-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:06:52',
                'updated_at' => '2021-05-25 00:06:52',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'published' => 1,
                'name' => 'Reset Clear and Save Reader Settings',
                'description' => NULL,
                'slug' => 'reset-clear-and-save-reader-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:07:07',
                'updated_at' => '2021-05-25 00:07:07',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'published' => 1,
                'name' => 'RS232 Settings',
                'description' => NULL,
                'slug' => 'rs232-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:07:16',
                'updated_at' => '2021-05-25 00:07:16',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'published' => 1,
                'name' => 'Scan Delay Settings',
                'description' => NULL,
                'slug' => 'scan-delay-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:07:25',
                'updated_at' => '2021-05-25 00:07:25',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'published' => 1,
                'name' => 'Symbology Settings',
                'description' => NULL,
                'slug' => 'symbology-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:07:34',
                'updated_at' => '2021-05-25 00:07:34',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'published' => 1,
                'name' => 'USB Settings',
                'description' => NULL,
                'slug' => 'usb-settings',
                'order' => NULL,
                'created_at' => '2021-05-25 00:07:42',
                'updated_at' => '2021-05-25 00:07:42',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'published' => 1,
                'name' => 'Obsolete',
                'description' => NULL,
                'slug' => 'obsolete',
                'order' => NULL,
                'created_at' => '2021-06-07 22:35:47',
                'updated_at' => '2021-06-07 22:35:47',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'published' => 1,
                'name' => 'Reader Feedback Settings',
                'description' => NULL,
                'slug' => NULL,
                'order' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'published' => 1,
                'name' => 'Direct Part Mark Reading Mode Settings',
                'description' => NULL,
                'slug' => NULL,
                'order' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}