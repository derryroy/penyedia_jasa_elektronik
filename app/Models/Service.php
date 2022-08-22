<?php

namespace App\Models;

use CodeIgniter\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    protected $allowedFields = [
        'title',
        'description',
        'estimated_price',
        'image',
        'slug',
        'category_id',
        'user_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    public function joinCategory()
    {
        return $this->join('categories', 'categories.category_id = services.category_id');
    }
    public function joinMerchant()
    {
        return $this->join('users', 'users.user_id = services.user_id');
    }

    public function whereCategory($category = null)
    {
        if ($category) return $this->where('category_slug', $category);
        return $this;
    }

    public function search($search = null)
    {
        if ($search) return $this->like('title', $search);
        return $this;
    }

    public function whereSlug($slug = null)
    {
        return $this->where('slug', $slug);
    }
}
