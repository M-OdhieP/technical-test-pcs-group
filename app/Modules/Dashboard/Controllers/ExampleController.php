<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;

use App\Modules\Dashboard\Models;

class ExampleController extends BaseController
{

    public function index()
    {
        $model = new Models\Product();
        $data['title'] =  'Example CRUD AJAX';
        $data['items'] = $model->findAll();
        return view(dashboard_view("cms/CRUD_AJAX_View_Example_Odhie/example_index"), $data);
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity'),
            'image' => '',
        ];

        // Check if image is present
        if ($this->request->getFile('image')->getSize() > 0) {
            // Upload image and get uploaded image's name
            $data['image'] = $this->uploadImage();
        }

        $model = new Models\Product();
        $model->insert($data);

        return json_encode([
            'status' => 'success',
            'message' => 'Data has been added successfully',
        ]);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price'),
            'quantity' => $this->request->getVar('quantity'),
        ];
        $model = new Models\Product();


        // Check if image is present
        if ($this->request->getFile('image')->getSize() > 0) {
            // Upload image and get uploaded image's name
            $data['image'] = $this->uploadImage();

            $data_image = $model->find($id);
            $image = "uploaded_file/product/" . $data_image->image;
            if (is_file($image)) {
                unlink($image);
            }
        }

        $model->update($id, $data);

        return json_encode([
            'status' => 'success',
            'message' => 'Data has been updated successfully',
        ]);
    }

    public function delete(int $id)
    {
        // Delete the item with the specified ID
        $model = new Models\Product();
        $data = $model->find($id);

        $image = "uploaded_file/product/" . $data->image;

        if (is_file($image)) {
            unlink($image);
        }

        $model->delete($id);
        // Return a JSON response indicating that the delete was successful
        return $this->response->setJSON([
            'success' => true,
        ]);
    }

    public function fetch_all_data()
    {
        $model = new Models\Product();
        $data  = $model->findAll();
        return $this->response->setJSON([
            'item' => $data
        ]);
    }

    public function get_all_data()
    {
        helper('text');
        $data['data'] = array();
        $model = new Models\Product();
        $result =  $model->select('id, name, description, price, quantity, image')->findAll();

        foreach ($result as $key => $value) {

            $ops = '<div class="text-center" >';
            $ops .= ' <button type="button" class="btn btn-sm btn-warning" onclick="edit_btn(' . $value->id . ')"><span class="fe fe-edit fe-16 mr-2"></span> Edit</button>';
            $ops .= ' <button type="button" class="btn btn-sm btn-danger" onclick="delete_btn(' . $value->id . ')"><span class="fe fe-trash fe-16 mr-2"></span> Delete</button>';
            $ops .= '</div>';

            if (!$value->image) {
                $value->image = 'blank.png';
            }
            $image = '<img src=' . base_url('uploaded_file/product') . '/' . $value->image  . ' class="image-thumbnail">';

            $data['data'][$key] = array(
                $key + 1,
                $value->name,
                $value->description,
                $value->price,
                $value->quantity,
                $image,
                $ops
            );
        }

        return $this->response->setJSON($data);
    }


    public function get_one($id)
    {
        $model = new Models\Product();
        $data  = $model->find($id);
        return $this->response->setJSON([
            'item' => $data
        ]);
    }

    private function uploadImage()
    {
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploaded_file/product', $newName);

            return $newName;
        }
    }
}
