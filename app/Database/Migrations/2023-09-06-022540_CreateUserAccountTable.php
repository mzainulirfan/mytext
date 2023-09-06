<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserAccountTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'account_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'account_user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true
            ],
            'account_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'account_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'account_status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'nonactive'],
                'default' => 'active',
                'null' => true
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
        $this->forge->addKey('account_id', true);
        $this->forge->addForeignKey('account_user_id', 'users', 'user_id');
        $this->forge->createTable('user_accounts', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_accounts');
    }
}
