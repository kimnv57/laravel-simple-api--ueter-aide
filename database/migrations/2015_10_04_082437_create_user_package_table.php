<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPackageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_package', function(Blueprint $table)
		{
			$table->integer('package_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('package_id')->references('id')->on('package')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_package');
	}

}
