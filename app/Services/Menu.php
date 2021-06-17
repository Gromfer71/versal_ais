<?php
namespace App\Services;

use App\Role;
use \Auth;
use \Request;

class Menu
{

	protected static $__default = [
		[
			'title' => 'Карта',
			'route' => 'home',
			'icon' => 'map',
		],
	];

	public static function view()
	{
		if (!Auth::user()) {
			return '';
		}

		$isRoot = Role::acl(Role::ADMIN);

		$menuConfig = static::$__default;
		$menu = [];
		foreach ($menuConfig as $item) {

			if ($item == 'hr') {
				$menu[] = 'hr';
				continue;
			}
			if (isset($item['link'])) {
				$link = $item['link'];
			} else {
				if (is_array($item['route'])) {
					$link = route($item['route'][0], $item['route'][1], false);
				} else {
					$link = route($item['route'], [], false);
				}
			}

			if (strpos($link, '/') === 0) {
				$link = substr($link, 1);
			}

			$active = false;
			if (Request::is($link . '/*') || Request::is($link)) {
				$active = true;
			}

			$menu[] = [
				'title' => $item['title'],
				'link' => url($link),
				'active' => $active,
				'icon' => (isset($item['icon']) ? $item['icon'] : false)
			];

		}

		return view('services.menu.default', [
			'menu' => $menu
		]);
	}

}
