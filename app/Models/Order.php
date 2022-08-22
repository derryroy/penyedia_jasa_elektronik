<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $protectFields = true;
    protected $primaryKey = 'order_id';
    protected $allowedFields = [
        'customer_id',
        'merchant_id',
        'total_price',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;

    public function whereCustomer($userID)
    {
        return $this->where('customer_id', $userID);
    }

    public function whereMerchant($userID)
    {
        return $this->where('merchant_id', $userID);
    }

    public function joinMerchant()
    {
        return $this->join('users', 'users.user_id = orders.merchant_id');
    }

    public function joinCustomer()
    {
        return $this->join('users', 'users.user_id = orders.customer_id');
    }
}
