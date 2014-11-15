<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAdminUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		$password = Hash::make('password');
		//$time = date("Y-M-d H:i:s");	
		//$time = time();
		DB::table('users')->insert(
				array(
					'user_name'=>'admin',
					'password'=>$password,
					'email'=>'ddgithub@gmail.com',
					'phone'=>'7783180819',
					'firstname'=>'Admin',
					'lastname'=>'Mr',
					'activeted'=>1,
					'rid'=>1,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=> date('Y-m-d H:i:s'),
					)
			);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::table('users')->where('user_name', '=', 'admin')->delete();
	}

}
