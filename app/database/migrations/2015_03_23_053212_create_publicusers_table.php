<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'publicusers', function($table){
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->longtext( 'username' );
			$table->string( 'email' );
			$table->string( 'password' );
			$table->string( 'online' );
			$table->string( 'offline' );
			$table->string( 'image' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'publicusers' );
	}

}
