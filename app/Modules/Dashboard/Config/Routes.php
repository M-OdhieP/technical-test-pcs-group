<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}


// $routes->group("dashboard", ["namespace" => "App\Modules\Dashboard\Controllers", 'filter' => 'IonAuth'], function ($routes) {
//     $routes->add("/", "Dashboard::index");
// });
$routes->add("/", "Product::index", ['filter' => 'IonAuth']);
$routes->add("blank", "Product::blank", ['filter' => 'IonAuth']);

$routes->post("cart", "Cart::add", ['filter' => 'IonAuth']);

$routes->get('/cart/get', 'Cart::get', ['filter' => 'IonAuth']);

$routes->post('/cart/(:num)', 'Cart::update/$1', ['filter' => 'IonAuth']);

$routes->get('/cartget_all', 'Cart::get_all', ['filter' => 'IonAuth']);

$routes->post('cart/delete', 'Cart::delete', ['filter' => 'IonAuth']);


$routes->add("summary", "Product::summary", ['filter' => 'IonAuth']);
$routes->add("history", "Product::history", ['filter' => 'IonAuth']);
$routes->post("create_order", "Product::create_order", ['filter' => 'IonAuth']);


// example crud ajax 
$routes->add("example_index_crud", "ExampleController::index", ['filter' => 'IonAuth']);
$routes->add("example_get_all_data", "ExampleController::get_all_data", ['filter' => 'IonAuth']);
$routes->add("example_get_one/(:num)", "ExampleController::get_one/$1", ['filter' => 'IonAuth']);

$routes->post("example_update", "ExampleController::update", ['filter' => 'IonAuth']);
$routes->post("example_create", "ExampleController::create", ['filter' => 'IonAuth']);
$routes->delete("example_delete/(:any)", "ExampleController::delete/$1", ['filter' => 'IonAuth']);



$routes->group("dashboard", ["namespace" => "App\Modules\Dashboard\Controllers", 'filter' => 'IonAuth'], function ($routes) {
    $routes->add("/", "Dashboard::index");
    $routes->add("setting", "Setting::index");
    $routes->post("setting/update", "Setting::update");
});
