<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dashboard\Models;

class Product extends BaseController
{

    function __construct()
    {
    }

    public function index()
    {
        $model = new Models\Product();

        $data = [
            'title' =>  'Product',
            'products' => $model->paginate(6, 'products'),
            'pager' => $model->pager,
        ];

        return view(dashboard_view("cms/product"), $data);
    }

    public function summary()
    {
        $data['title'] =  'Summary';
        $model = new Models\Cart();
        $data['summary'] = $model
            ->select('carts.*')
            ->select('products.name as product_name, products.price as product_price, products.description as product_description')
            ->join('products', 'products.id=carts.product_id')
            ->where(['user_id' => getUserId()])
            ->findAll();

        $data['total_price'] = 0;
        $data['kupon_from_product_total'] = 0;

        foreach ($data['summary'] as $item) {
            if ($item->product_price > 50000) {
                $item->kupon = 1 * $item->quantity;
            }

            $item->total_each_product_price = $item->product_price * $item->quantity;
            $data['total_price'] += $item->total_each_product_price;
            $data['kupon_from_product_total'] += $item->kupon;
        }
        $data['kupon_from_total_price'] = floor($data['total_price'] / 100000);


        // echo '<pre>';
        // var_dump($data['summary']);
        // die;

        return view(dashboard_view("cms/summary"), $data);
    }
    public function crud_ajax_new()
    {
        $data['title'] =  'New Content';

        return view(dashboard_view("cms/CRUD_AJAX_View_Example/new"), $data);
    }
}
