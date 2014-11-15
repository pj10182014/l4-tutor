<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRowsToRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::table('roles')->insert(
				array(
					array('role'=>'Admin'),
					array('role'=>'Student'),
					array('role'=>'Tutor'),
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
		DB::table('roles')->where('role', '=', 'Admin')->delete();
		DB::table('roles')->where('role', '=', 'Student')->delete();
		DB::table('roles')->where('role', '=', 'Tutor')->delete();
	}

}
