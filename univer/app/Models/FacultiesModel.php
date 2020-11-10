<?php namespace App\Models;

use CodeIgniter\Model;

class FacultiesModel extends Model {
    protected $table = 'faculties';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'alias', 'logo', 'image', 'about', 'status'];
}