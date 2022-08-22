<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategorySlug extends Migration
{
    public function up()
    {
        $fields = [
            'category_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ];
        $this->forge->addColumn('categories', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('categories', 'category_slug');
    }
}
