<?php

namespace Modules\Qlydichvu\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterQlydichvuSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('qlydichvu::qlydichvus.title.qlydichvus'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('qlydichvu::qlydichvus.title.qlydichvus'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.qlydichvu.qlydichvu.create');
                    $item->route('admin.qlydichvu.qlydichvu.index');
                    $item->authorize(
                        $this->auth->hasAccess('qlydichvu.qlydichvus.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
