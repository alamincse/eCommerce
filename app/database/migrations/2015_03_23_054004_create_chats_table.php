<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'chats', function($table){
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->string( 'username' );
			$table->longtext( 'chat' );
			$table->string( 'time' );
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
		Schema::drop( 'chats' );
	}

}
