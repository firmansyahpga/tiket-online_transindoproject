<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class CustomerCRUDDataTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        \DB::beginTransaction();

        try {

            $data_type = Badaso::model('DataType')->where('name', 'customer')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'customer')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 5,
                'name' => 'customer',
                'slug' => 'customer',
                'display_name_singular' => 'Customer',
                'display_name_plural' => 'Customer',
                'icon' => 'face',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => NULL,
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2023-01-24T09:21:49.000000Z',
                'updated_at' => '2023-01-24T09:23:24.000000Z',
            ));

            Badaso::model('Permission')->generateFor('customer');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/customer')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Customer',
                    'target' => '_self',
                    'icon_class' => 'face',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_customer',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/customer';
                $menu_item->title = 'Customer';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'face';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_customer';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
