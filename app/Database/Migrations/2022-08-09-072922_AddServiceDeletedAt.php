<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddServiceDeletedAt extends Migration
{
    public function up()
    {
        $fields = [
            'deleted_at timestamp null',
        ];
        $this->forge->addColumn('services', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('services', 'deleted_at');
    }
}
