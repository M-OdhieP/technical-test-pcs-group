<?php

if (!isset($routes)) {
	$routes = \Config\Services::routes(true);
}



$routes->group('auth', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->get('/', 'Auth::index', ['filter' => 'Admin']);
	$routes->add('create_user', 'Auth::create_user', ['filter' => 'Admin']);
	$routes->add('groups', 'Auth::groups', ['filter' => 'Superadmin']);
	$routes->add('edit_user/(:num)', 'Auth::edit_user/$1', ['filter' => 'Admin']);
	$routes->add('edit_group/(:num)', 'Auth::edit_group/$1', ['filter' => 'Superadmin']);
	$routes->add('delete_group/(:num)', 'Auth::delete_group/$1', ['filter' => 'Superadmin']);
	$routes->add('delete_user/(:num)', 'Auth::delete_user/$1', ['filter' => 'Admin']);
	$routes->add('create_group', 'Auth::create_group', ['filter' => 'Superadmin']);
	$routes->get('activate/(:num)', 'Auth::activate/$1', ['filter' => 'Admin']);
	$routes->get('activate/(:num)/(:hash)', 'Auth::activate/$1/$2', ['filter' => 'Admin']);
	$routes->add('deactivate/(:num)', 'Auth::deactivate/$1', ['filter' => 'Admin']);
	$routes->add('change_password', 'Auth::change_password');
	// $routes->add('forgot_password', 'Auth::forgot_password');
	// $routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
	// $routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
});
