<?php

namespace App\Modules\Dashboard\Models;

use CodeIgniter\Model;

class Settings extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'settings';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['app_name',  'created_by'];

	// Dates
	protected $useTimestamps        = true;
}
