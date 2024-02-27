<?php

namespace App\Models;
use CodeIgniter\model;

class usermodel extends model {
    protected $table = 'users';
    protected $primarykey = 'user_id';
    protected $allowedFields = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender_id',
        'email',
        'password'

    ];
    protected $returnType = 'object';

}