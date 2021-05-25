<?php

namespace Modules\Mcode\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class McodePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [

            ['title' => 'mcode_manager_access', ],
            ['title' => 'mcode_feature_create', ],
            ['title' => 'mcode_feature_edit', ],
            ['title' => 'mcode_feature_show', ],
            ['title' => 'mcode_feature_delete', ],
            ['title' => 'mcode_feature_access', ],
            ['title' => 'mcode_category_create', ],
            ['title' => 'mcode_category_edit', ],
            ['title' => 'mcode_category_show', ],
            ['title' => 'mcode_category_delete', ],
            ['title' => 'mcode_category_access', ],
            ['title' => 'mcode_create', ],
            ['title' => 'mcode_edit', ],
            ['title' => 'mcode_show', ],
            ['title' => 'mcode_delete', ],
            ['title' => 'mcode_access', ],
            ['title' => 'mcode_product_model_create', ],
            ['title' => 'mcode_product_model_edit', ],
            ['title' => 'mcode_product_model_show', ],
            ['title' => 'mcode_product_model_delete', ],
            ['title' => 'mcode_product_model_access', ],
        ];

        \App\Models\Permission::insert($permissions);
    }
}
