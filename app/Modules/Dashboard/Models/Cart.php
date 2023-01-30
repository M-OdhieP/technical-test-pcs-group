<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class Cart extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'carts';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';

	protected $protectFields        = true;
	protected $allowedFields = ['user_id', 'product_id', 'quantity'];

	// soft delete 
	protected $useSoftDeletes       = true;

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
}
