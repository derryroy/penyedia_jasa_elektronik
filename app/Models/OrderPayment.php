<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderPayment extends Model
{
    protected $table = 'order_payments';
    protected $protectFields = true;
    protected $primaryKey = 'order_payment_id';
    protected $allowedFields = [
        'order_id',
        'payment_name',
        'payment_number',
        'payment_file',
    ];

    // Dates
    protected $useTimestamps = true;
}
