<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Modules\Dashboard\Models;


class Setting extends BaseController
{
    protected $settings;
    protected $session;
    function __construct()
    {
        $this->settings = new Models\Settings;
        $this->session   = \Config\Services::session();
    }

    public function index()
    {

        $data['item'] = $this->settings->first();
        $data['title'] =  'Setting';

        return view(dashboard_view("cms/setting"), $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = $this->request->getPost();

        $login_image = $this->request->getFile('login_image');
        if ($login_image->isValid()) {
            Services::image()
                ->withFile($login_image->getTempName())
                ->save("uploaded_file/settings/login_image.jpg", 90);
        }

        $logo = $this->request->getFile('logo');
        if ($logo->isValid()) {
            $info = Services::image()
                ->withFile($logo->getTempName())
                ->getFile()
                ->getProperties(true);
            $height = (250 / $info['width']) * $info['height'];
            Services::image()
                ->withFile($logo->getTempName())
                ->resize(250, $height, true, 'width')
                ->save("uploaded_file/settings/logo.png", 90);
        }

        $favicon = $this->request->getFile('favicon');
        if ($favicon->isValid()) {
            Services::image()
                ->withFile($favicon->getTempName())
                ->resize(80, 80, true, 'width')
                ->save("uploaded_file/settings/favicon.png", 50);
        }

        $save = $this->settings->update($id, $data);
        if ($save) {
            $this->session->setFlashdata('success', 'Update Data Berhasil');
            return redirect("dashboard/setting");
        }
    }
}
