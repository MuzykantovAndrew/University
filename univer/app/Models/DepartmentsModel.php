<?php namespace App\Models;

use CodeIgniter\Model;

class DepartmentsModel extends Model {
    protected $table = 'departments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'employees', 'specialties', 'status', 'faculty_id'];
}