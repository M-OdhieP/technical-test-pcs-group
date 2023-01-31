<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class Orders extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'orders';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';

	protected $protectFields        = true;
	protected $allowedFields = ['user_id', 'description', 'total_kupon', 'total_price'];

	// soft delete 
	protected $useSoftDeletes       = true;

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
}
