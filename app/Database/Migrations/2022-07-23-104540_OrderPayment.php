<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderPayment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_payment_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'payment_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'payment_number' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'payment_file' => [
                'type' => 'TEXT',
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('order_payment_id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'order_id');
        $this->forge->createTable('order_payments');
    }

    public function down()
    {
        $this->forge->dropTable('order_payments');
    }
}
