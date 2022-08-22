<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderService extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,0',
            ],
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('order_service_id', true);
        $this->forge->addForeignKey('service_id', 'services', 'service_id');
        $this->forge->addForeignKey('order_id', 'orders', 'order_id');
        $this->forge->createTable('order_services');
    }

    public function down()
    {
        $this->forge->dropTable('order_services');
    }
}
