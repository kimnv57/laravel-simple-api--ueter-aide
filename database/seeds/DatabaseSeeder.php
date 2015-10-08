<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UsersTableSeeder');

		DB::table('package')->delete();

		\App\Package::create([
			'name' => 'hoc',
			'content' => 'hoc hanh'
		]);

		DB::table('notification')->delete();

		\App\Notification::create([
			'title' => 'hoc bong abc',
			'content' => 'hoc hanh',
			'package_id' => 1
		]);

        // Add calls to Seeders here
       
	}
}
