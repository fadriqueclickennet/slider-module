<?php

namespace Modules\Slider\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterSliderSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('slider::sliders.title'), function (Item $item) {
                $item->weight(3);
                $item->icon('far fa-images');
                $item->route('admin.slider.slider.index');
                $item->authorize(
                    $this->auth->hasAccess('slider.sliders.index')
                );
            });
        });

        return $menu;
    }
}
