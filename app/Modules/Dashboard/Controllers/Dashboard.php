<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{

    function __construct()
    {
    }

    public function index()
    {
        $data['title'] =  'Bina Marga dan Bina Konstruksi';

        return view(dashboard_view("cms/dashboard"), $data);
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
