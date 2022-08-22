<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $protectFields = true;
    protected $primaryKey = 'category_id';
    protected $allowedFields = [
        'category_name', 'category_slug'
    ];

    // Dates
    protected $useTimestamps = false;
}
