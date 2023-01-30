<?php

namespace App\Filters;

use App\Modules\Auth\Libraries\IonAuth as LibrariesIonAuth;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IonAuth implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $this->ionAuth    = new LibrariesIonAuth;
        if (!($this->ionAuth->loggedIn())) {
            session()->set('redirect_url', current_url());
            return redirect()->to('auth/login');
        }
        return true;
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
