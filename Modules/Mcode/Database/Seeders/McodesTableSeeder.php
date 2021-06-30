<?php

namespace Modules\Mcode\Database\Seeders;

use Illuminate\Database\Seeder;

class McodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mcodes')->delete();
        
        \DB::table('mcodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'published' => 1,
                'name' => 'Code Reader 2700',
                'slug' => 'code-reader-2700',
                'desc' => NULL,
                'created_at' => '2021-05-26 17:43:16',
                'updated_at' => '2021-05-26 17:43:16',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'published' => 1,
                'name' => 'Code Reader 950',
                'slug' => 'code-reader-950',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:07:16',
                'updated_at' => '2021-05-26 18:07:16',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'published' => 1,
                'name' => 'Code Reader 1100',
                'slug' => 'code-reader-1100',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:11:09',
                'updated_at' => '2021-05-26 18:11:09',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'published' => 1,
                'name' => 'Code Reader 1100 XHD',
                'slug' => 'code-reader-1100-xhd',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:12:52',
                'updated_at' => '2021-05-26 18:12:52',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'published' => 1,
                'name' => 'Code Reader 1400 XHD',
                'slug' => 'code-reader-1400-xhd',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:13:11',
                'updated_at' => '2021-05-26 18:13:11',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'published' => 1,
                'name' => 'Code Reader 1500',
                'slug' => 'code-reader-1500',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:13:43',
                'updated_at' => '2021-05-26 18:13:43',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'published' => 1,
                'name' => 'Code Reader 2600 XHD',
                'slug' => 'code-reader-2600-xhd',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:14:39',
                'updated_at' => '2021-05-26 18:14:39',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'published' => 1,
                'name' => 'Code Reader 3600 DPM',
                'slug' => 'code-reader-3600-dpm',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:15:28',
                'updated_at' => '2021-05-26 18:15:28',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'published' => 1,
                'name' => 'Code Reader 5000',
                'slug' => 'code-reader-5000',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:27:53',
                'updated_at' => '2021-05-26 18:27:53',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'published' => 1,
                'name' => 'Code Reader 5200',
                'slug' => 'code-reader-5200',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:28:45',
                'updated_at' => '2021-05-26 18:30:17',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'published' => 1,
                'name' => 'Code Reader 5020',
                'slug' => 'code-reader-5020',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:29:11',
                'updated_at' => '2021-05-26 18:30:46',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'published' => 1,
                'name' => 'Code Reader 5025',
                'slug' => 'code-reader-5025',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:29:52',
                'updated_at' => '2021-05-26 18:29:52',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'published' => 1,
                'name' => 'Code Reader 6000',
                'slug' => 'code-reader-6000',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:31:37',
                'updated_at' => '2021-05-26 18:31:37',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'published' => 1,
                'name' => 'Code Reader 8000 Series',
                'slug' => 'code-reader-8000-series',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:32:37',
                'updated_at' => '2021-05-26 18:32:37',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'published' => 1,
                'name' => 'Code Reader 8000',
                'slug' => 'code-reader-8000',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:33:37',
                'updated_at' => '2021-05-26 18:33:37',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'published' => 1,
                'name' => 'Code Reader 8200',
                'slug' => 'code-reader-8200',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:34:30',
                'updated_at' => '2021-05-26 18:34:30',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'published' => 1,
                'name' => 'Code Reader 1400',
                'slug' => 'code-reader-1400',
                'desc' => NULL,
                'created_at' => '2021-05-26 18:36:11',
                'updated_at' => '2021-05-26 18:36:11',
                'deleted_at' => NULL,
                'order' => NULL,
            ),
        ));
        
        
    }
}