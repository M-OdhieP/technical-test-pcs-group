<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class Product extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'products';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';

	protected $protectFields        = true;
	protected $allowedFields = ['name', 'description', 'price', 'quantity', 'image'];

	// soft delete 
	protected $useSoftDeletes       = true;

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
}
