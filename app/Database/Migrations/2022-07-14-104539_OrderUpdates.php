<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderUpdates extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_update_id' => [
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
            'description' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'sender_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'receiver_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('order_update_id', true);
        $this->forge->addForeignKey('sender_id', 'users', 'user_id');
        $this->forge->addForeignKey('receiver_id', 'users', 'user_id');
        $this->forge->addForeignKey('order_id', 'orders', 'order_id');
        $this->forge->createTable('order_updates');
    }

    public function down()
    {
        $this->forge->dropTable('order_updates');
    }
}
