<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBottomslidersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'bottom_sliders', function($table){
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->longtext( 'desc' );
			$table->string( 'model' );
			$table->string( 'location' );
			$table->string( 'phone' ); 
			$table->decimal( 'price', 6, 2 ); // 9999.99
			$table->decimal( 'n_price', 6, 2 ); // 9999.99
			$table->string( 'quantity' );
			$table->string( 'stock' );
			$table->string( 'status' );
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
		Schema::drop( 'bottom_sliders' );
	}

}
