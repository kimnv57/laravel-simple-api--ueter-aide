<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user')->delete();

		\App\User::create([
			'stu_code' => 12020502,
			'username' => 'admin_user',
			'fullname' => 'nguyen van kim',
			'course' => '2012',
			'major' => 'cntt',
			'class' => 'k57cb',
			'admin' => 1,
			'email' => 'admin@gmail.com',
			'password' => bcrypt('12345'),
		]);

	}

}
