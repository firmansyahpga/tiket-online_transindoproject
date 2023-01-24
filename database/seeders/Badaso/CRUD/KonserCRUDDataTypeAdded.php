<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class KonserCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'konser')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'konser')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 3,
                'name' => 'konser',
                'slug' => 'konser',
                'display_name_singular' => 'Konser',
                'display_name_plural' => 'Konser',
                'icon' => 'video_label',
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
                'created_at' => '2023-01-24T08:40:26.000000Z',
                'updated_at' => '2023-01-24T08:51:26.000000Z',
            ));

            Badaso::model('Permission')->generateFor('konser');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/konser')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Konser',
                    'target' => '_self',
                    'icon_class' => 'video_label',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_konser',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/konser';
                $menu_item->title = 'Konser';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'video_label';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_konser';
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
