<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stu_code')->unique();
            $table->string('username')->unique(); // used for slug.
            $table->string('fullname');
            $table->string('course');
            $table->integer('major');
            $table->string('class');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('admin');
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
