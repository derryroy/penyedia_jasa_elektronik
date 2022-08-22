<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrderStatus extends Migration
{
    public function up()
    {
        $fields = [
            'status' => [
                'type' => 'TINYINT',
                'default' => 1,
                'after' => 'total_price',
            ],
        ];
        $this->forge->addColumn('orders', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('orders', 'status');
    }
}
