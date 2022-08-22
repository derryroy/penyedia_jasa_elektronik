<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $protectFields = true;
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Dates
    protected $useTimestamps = true;

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
