<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		$this->ionAuth    = new \App\Modules\Auth\Libraries\IonAuth();
		if (!($this->ionAuth->isAdmin()) and !($this->ionAuth->inGroup('superadmin'))) {
			session()->set('redirect_url', current_url());
			session()->setFlashdata('error', 'anda tidak punya akses');
			return redirect()->to('dashboard');
		}
		return true;
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
