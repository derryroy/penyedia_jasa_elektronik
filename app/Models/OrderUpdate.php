<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderUpdate extends Model
{
    protected $table = 'order_updates';
    protected $protectFields = true;
    protected $primaryKey = 'order_update_id';
    protected $allowedFields = [
        'order_id',
        'description',
        'image',
        'sender_id',
        'receiver_id',
        'type',
    ];

    // Dates
    protected $useTimestamps = true;
}
