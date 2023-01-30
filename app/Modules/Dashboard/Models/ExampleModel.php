<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class ExampleModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'example_table';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';

	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'email',
		'message',
		'image',
	];

	// soft delete 
	// protected $useSoftDeletes       = true;

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat    = 'datetime';
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
}
