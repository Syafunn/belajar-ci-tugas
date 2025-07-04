<?php 
namespace App\Models;

use CodeIgniter\Model;

class productcategoryModel extends Model
{
	protected $table = 'productkategory'; 
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'nama','description','created_at','updated_at'
	];  
}