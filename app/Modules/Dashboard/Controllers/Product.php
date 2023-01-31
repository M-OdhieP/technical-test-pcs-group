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
            } else {
                $item->kupon = 0;
            }

            $item->total_each_product_price = $item->product_price * $item->quantity;
            $data['total_price'] += $item->total_each_product_price;
            $data['kupon_from_product_total'] += $item->kupon;
        }
        $data['kupon_from_total_price'] = floor($data['total_price'] / 100000);
        $data['total_kupon'] =    $data['kupon_from_total_price'] + $data['kupon_from_product_total'];
        return view(dashboard_view("cms/summary"), $data);
    }

    public function create_order()
    {
        $user_id = getUserId();
        $data = $this->request->getVar('data');
        $data['description'] = json_encode($this->request->getVar('description'));

        $model = new Models\Cart();
        $model->whereIn('user_id',  [$user_id])->delete();

        $model_orders = new Models\Orders();
        $model_orders->save([
            'user_id' => $user_id,
            'description' =>  $data['description'],
            'total_kupon' => $data['total_kupon'],
            'total_price' => $data['total_price'],
        ]);
        return redirect('history', 'refresh');
    }

    public function history()
    {
        $data['title'] =  'History';

        $model = new Models\Orders();

        $data['history'] = $model->where(['user_id' => getUserId()])->orderBy('created_at', 'DESC')->findAll();

        foreach ($data['history'] as $item) {
            $item->description = json_decode($item->description);

            $createdAt = strtotime($item->created_at);
            $currentTime = strtotime(date("Y-m-d H:i:s"));
            $difference = $currentTime - $createdAt;
            $hours = floor($difference / 3600);
            if ($hours <= 3) {
                $item->status = 'Open';
            } else {
                $item->status = 'Closed';
            }
        }

        return view(dashboard_view("cms/history"), $data);
    }
}
