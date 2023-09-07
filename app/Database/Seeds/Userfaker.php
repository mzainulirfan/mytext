<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Userfaker extends Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create('id_ID');
		for ($i = 0; $i < 50; $i++) {
			$namaGenerate = $faker->unique()->userName;
			$data = [
				'user_username' => strtolower(url_title($namaGenerate)),
				'user_fullname' => $namaGenerate,
				'user_address' => $faker->address,
				'user_phone_number' => $faker->phoneNumber,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			];

			$this->db->table('users')->insert($data);
		}
	}
}
