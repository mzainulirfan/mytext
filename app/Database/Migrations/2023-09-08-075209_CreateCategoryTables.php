<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryTables extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'category_id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => true,
                    'auto_increment' => true
                ],
                'category_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => true
                ]
            ]
        );
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('categories', true);
    }

    public function down()
    {
        $this->forge->dropTable('categories', true);
    }
}
