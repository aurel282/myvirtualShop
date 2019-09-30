<?php
namespace App\Http\Middleware;

use App\Service\MenuServices;
use Closure;

class MenuMiddleware
{
	/** @var MenuServices */
	protected $_menuService;

	/**
	 * MenuMiddleware constructor.
	 *
	 * @param MenuServices $menuServices
	 */
	public function __construct(
		MenuServices $menuServices
	)
	{
		$this->_menuService = $menuServices;
	}

	/**
	 * @param $request
	 * @param Closure $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$menu = $this->_menuService->generateMenu($this->_getConfig());

		view()->share('menuMain', $menu->render('ul', 'li', ['id' => 'mainMenu']));

		return $next($request);
	}

	/**
	 * configuration of the menu
	 *
	 * @return array
	 */
	protected function _getConfig()
	{
		$configArray = [
			[
				'key' => 'home',
				'class' => 'home-item',
				'title' => '
				<h5 for="personal_menu_chevron marginLeft-xl" style="font-size: 1.5rem; "><img src="https://admin.business.bepark.eu/img/logo_bepark/logo.png" width="77" class="image" alt="BePark"/> Business Admin</h5>
				<input type="checkbox" id="personal_menu_chevron" style="display: none"/>
				',
				'style' => 'height:59px'
			],
			[
				'key' => 'organisation',
				'attributes' => [
					'class' => 'icon-orga btn-nav'
				],
				'links' => [
					[
						'key' => 'organisation.list',
						'route' => 'dashboard',
					],
				],
			],
			[
				'key' => 'Profile',
				'attributes' => [
					'class' => 'icon-orga btn-nav'
				],
				'links' => [
					[
						'key' => 'profile.list',
						'route' => 'dashboard',
					],
				],
			],
            [
                'key' => 'parking',
                'attributes' => [
                    'class' => 'icon-parking btn-nav'
                ],
                'links' => [
                    [
                        'key' => 'parking.list',
                        'route' => 'dashboard',
                    ],
                ],
            ],
		];

		return $configArray;
	}
}
