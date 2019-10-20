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
				<h5 for="personal_menu_chevron marginLeft-xl" style="font-size: 1.5rem; "> Bourse Admin</h5>
				<input type="checkbox" id="personal_menu_chevron" style="display: none"/>
				',
				'style' => 'height:59px'
			],
			[
				'key' => 'client',
				'attributes' => [
					'class' => 'icon-orga btn-nav'
				],
				'links' => [
					[
						'key' => 'client.list',
						'route' => 'client.list',
					],
				],
			],
			[
				'key' => 'provider',
				'attributes' => [
					'class' => 'icon-orga btn-nav'
				],
				'links' => [
					[
						'key' => 'provider.list',
						'route' => 'provider.list',
					],
				],
			],
            [
                'key' => 'product',
                'attributes' => [
                    'class' => 'icon-parking btn-nav'
                ],
                'links' => [
                    [
                        'key' => 'product.list',
                        'route' => 'dashboard',
                    ],
                ],
            ],
		];

		return $configArray;
	}
}
