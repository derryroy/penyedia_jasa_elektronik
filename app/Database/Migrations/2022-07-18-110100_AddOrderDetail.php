<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrderDetail extends Migration
{
    public function up()
    {
        $fields = [
            'order_detail' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'image',
            ],
            'order_comment' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'image',
            ],
            'order_image' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'image',
            ],
        ];
        $this->forge->addColumn('order_services', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('order_services', ['order_detail', 'order_comment', 'order_image']);
    }
}
