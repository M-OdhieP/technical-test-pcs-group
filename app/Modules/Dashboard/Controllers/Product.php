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

    public function blank()
    {
        $data['title'] =  'Blank Page';

        return view(dashboard_view("cms/blank_card_template/index"), $data);
    }
    public function crud_ajax_new()
    {
        $data['title'] =  'New Content';

        return view(dashboard_view("cms/CRUD_AJAX_View_Example/new"), $data);
    }
}
