<?php

namespace Modules\Qlyloaiquanao\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterQlyloaiquanaoSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('Quản lý'), function (Group $group) {
            $group->item(trans('qlyloaiquanao::qlyloaiquanaos.title.qlyloaiquanaos'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('qlyloaiquanao::qlyloaiquanaos.title.qlyloaiquanaos'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.qlyloaiquanao.qlyloaiquanao.create');
                    $item->route('admin.qlyloaiquanao.qlyloaiquanao.index');
                    $item->authorize(
                        $this->auth->hasAccess('qlyloaiquanao.qlyloaiquanaos.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
