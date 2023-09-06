<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'user_username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'user_phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'user_address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'is_user_account' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s') // Nilai default adalah timestamp saat ini
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => date('Y-m-d H:i:s') // Nilai default adalah timestamp saat ini
            ]
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
