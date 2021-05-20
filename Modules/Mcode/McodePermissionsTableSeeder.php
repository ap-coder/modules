<?php

namespace Modules\Mcode\Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class McodePermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
          
            [ 'title' => 'mcode_manager_access', ],
            [ 'title' => 'mcode_feature_create', ],
            [ 'title' => 'mcode_feature_edit', ],
            [ 'title' => 'mcode_feature_show', ],
            [ 'title' => 'mcode_feature_delete', ],
            [ 'title' => 'mcode_feature_access', ],
            [ 'title' => 'mcode_category_create', ],
            [ 'title' => 'mcode_category_edit', ],
            [ 'title' => 'mcode_category_show', ],
            [ 'title' => 'mcode_category_delete', ],
            [ 'title' => 'mcode_category_access', ],
        ];

        App\Models\Permission::insert($permissions);
    }
}
