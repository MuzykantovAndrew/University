<?php namespace App\Models;

use CodeIgniter\Model;

class GroupsModel extends Model {
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'students', 'headman', 'status', 'department_id'];
}