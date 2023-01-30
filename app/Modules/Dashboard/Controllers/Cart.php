<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Modules\Dashboard\Models;

class Cart extends BaseController
{

    function __construct()
    {
    }

    public function get()
    {
        $product_id = $this->request->getGet('product_id');
        $user_id = $this->request->getGet('user_id');

        $model = new Models\Cart();
        $cart = $model->where(['product_id' => $product_id, 'user_id' => $user_id])->first();
        return $this->response->setJSON($cart);
    }
    public function get_all()
    {
        $model = new Models\Cart();
        $cart = $model
            ->select('carts.*')
            ->select('products.name as product_name, products.price as product_price')
            ->join('products', 'products.id=carts.product_id')
            ->where(['user_id' => getUserId()])
            ->findAll();
        return $this->response->setJSON($cart);
    }

    public function add()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = $this->request->getPost('user_id');

        $model = new Models\Cart();
        $model->save([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => 1,
        ]);

        return $this->response->setJSON([
            'message' => 'Product added to cart successfully!',
        ]);
    }

    public function update($id)
    {
        $quantity = $this->request->getVar('quantity');


        $model = new Models\Cart();
        $model->update($id, [
            'quantity' => $quantity,
        ]);

        return $this->response->setJSON(['message' => 'Product quantity updated in cart successfully']);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $model = new Models\Cart();
        $model->delete($id);

        // Return a JSON response indicating that the delete was successful
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Delete successfully'
        ]);
    }
}
