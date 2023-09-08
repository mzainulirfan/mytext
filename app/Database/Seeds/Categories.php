<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categories extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_name' => 'Gadget',
            ],
            [
                'category_name' => 'Fashion',
            ],
            [
                'category_name' => 'Electronics',
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}
