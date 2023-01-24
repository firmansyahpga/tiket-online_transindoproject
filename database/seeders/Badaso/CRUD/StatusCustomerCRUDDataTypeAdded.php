<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class StatusCustomerCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'status_customer')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'status_customer')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 6,
                'name' => 'status_customer',
                'slug' => 'status-customer',
                'display_name_singular' => 'Status Customer',
                'display_name_plural' => 'Status Customer',
                'icon' => 'check',
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
                'created_at' => '2023-01-24T09:27:10.000000Z',
                'updated_at' => '2023-01-24T09:27:47.000000Z',
            ));

            Badaso::model('Permission')->generateFor('status_customer');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/status-customer')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Status Customer',
                    'target' => '_self',
                    'icon_class' => 'check',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_status_customer',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/status-customer';
                $menu_item->title = 'Status Customer';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'check';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_status_customer';
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
