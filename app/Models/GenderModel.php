<?php

namespace App\Models;
use CodeIgniter\model;

class gendermodel extends model {
    protected $table = 'gender';
    protected $primarykey = 'gender_id';
    protected $allowedFields = [
    'gender'
    ];
    protected $returnType = 'object';
}