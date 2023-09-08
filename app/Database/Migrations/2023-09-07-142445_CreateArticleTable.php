<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'article_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'article_title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'article_slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'is_unique' => true,
                'null' => true
            ],
            'article_intro' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'article_content' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'article_author_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true
            ],
            'article_status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'pending', 'publish'],
                'default' => 'draft',
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
        $this->forge->addKey('article_id', true);
        $this->forge->addForeignKey('article_author_id', 'users', 'user_id');
        $this->forge->createTable('articles', true);
    }

    public function down()
    {
        $this->forge->dropTable('articles', true);
    }
}
