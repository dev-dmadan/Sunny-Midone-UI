<?php

namespace App\Radiant\Midone;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

class MenuHelper
{
    public static function getAll()
    {
        $second = (int)env('SESSION_LIFETIME', 120) * 60;
        $parentMenu = Cache::remember('all_menu', $second, function () {
            return Menu::with('sub_menu')
                ->whereNull('parent_id')
                ->orderBy('position', 'asc')
                ->get();
        });

        return self::getSubMenu($parentMenu);
    }

    public static function getSubMenu($parentMenu)
    {
        $sub_menu = [];

        foreach ($parentMenu as $menu) {
            $childMenu = [
                'id' => $menu->id,
                'title' => $menu->title,
                'icon' => $menu->icon,
                'url' => $menu->url,
                'is_divider' => $menu->is_divider,
                'sub_menu' => self::getSubMenu($menu->sub_menu)
            ];

            $sub_menu[] = $childMenu;
        }

        return $sub_menu;
    }
}