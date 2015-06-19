<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('notification',function($table){
			$table->increments('id');
			$table->string('name',50);
			$table->string('email',50);
			$table->string('title',100);
			$table->string('template',255);
			$table->string('value',65535);
			$table->string('status',10);
			$table->integer('resend');
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
		//
		Schema::drop('notification');
	}

}
