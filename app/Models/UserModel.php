<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['username', 'useremail', 'userpassword'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'username'     => 'required|min_length[3]|max_length[100]',
        'useremail'    => 'required|valid_email|is_unique[user.useremail]',
        'userpassword' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'useremail' => [
            'is_unique' => 'Email sudah terdaftar.'
        ]
    ];

    protected $skipValidation = false;
}