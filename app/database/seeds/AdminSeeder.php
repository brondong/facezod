<?php

class AdminSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$admin = array(
			'nama' => 'Admin',
			'username' => 'admins', 'password' => Hash::make('adminlocal'),
			'created_at' => new DateTime, 'updated_at' => new DateTime
		);

		DB::table('admins')->insert($admin);
	}

}