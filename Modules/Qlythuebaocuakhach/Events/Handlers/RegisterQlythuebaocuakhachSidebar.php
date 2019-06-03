<?php

namespace Modules\Qlythuebaocuakhach\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterQlythuebaocuakhachSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('qlythuebaocuakhach::qlythuebaocuakhaches.title.qlythuebaocuakhaches'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('qlythuebaocuakhach::qlythuebaocuakhaches.title.qlythuebaocuakhaches'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.qlythuebaocuakhach.qlythuebaocuakhach.create');
                    $item->route('admin.qlythuebaocuakhach.qlythuebaocuakhach.index');
                    $item->authorize(
                        $this->auth->hasAccess('qlythuebaocuakhach.qlythuebaocuakhaches.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
