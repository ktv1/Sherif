<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');

        Permission::generateFor('roles');

        Permission::generateFor('users');

        Permission::generateFor('settings');

        Permission::generateFor('products');

        Permission::generateFor('categories');

        Permission::generateFor('currencies');

        Permission::generateFor('product_statuses');

        Permission::generateFor('product_labels');

        Permission::generateFor('colors');

        Permission::generateFor('interests');

        Permission::generateFor('product-service-statuses');

        Permission::generateFor('providers');

        Permission::generateFor('articles');

        Permission::generateFor('articles_categories');
    }
}
