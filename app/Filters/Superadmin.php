<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Superadmin implements FilterInterface
{

	public function before(RequestInterface $request, $arguments = null)
	{
		$this->ionAuth    = new \App\Modules\Auth\Libraries\IonAuth();
		if (!($this->ionAuth->inGroup('superadmin'))) {
			session()->set('redirect_url', current_url());
			session()->setFlashdata('error', 'anda tidak punya akses');
			return redirect()->to('/');
		}
		return true;
	}


	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
		//
	}
}
