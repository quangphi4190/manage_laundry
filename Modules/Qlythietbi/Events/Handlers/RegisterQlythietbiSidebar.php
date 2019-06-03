<?php

namespace Modules\Qlythietbi\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterQlythietbiSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('qlythietbi::qlythietbis.title.qlythietbis'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('qlythietbi::qlythietbis.title.qlythietbis'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.qlythietbi.qlythietbi.create');
                    $item->route('admin.qlythietbi.qlythietbi.index');
                    $item->authorize(
                        $this->auth->hasAccess('qlythietbi.qlythietbis.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
