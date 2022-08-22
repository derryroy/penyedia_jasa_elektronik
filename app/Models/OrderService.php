<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderService extends Model
{
    protected $table = 'order_services';
    protected $protectFields = true;
    protected $primaryKey = 'order_service_id';
    protected $allowedFields = [
        'service_id',
        'order_id',
        'title',
        'description',
        'price',
        'image',
        'order_comment',
        'order_detail',
        'order_image',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;

    public function getCategory($order_service_id)
    {
        return $this->select('categories.category_id, category_name')
            ->where('order_service_id', $order_service_id)
            ->join('services', 'services.service_id = order_services.service_id')
            ->join('categories', 'categories.category_id = services.category_id')->first();
    }
}
