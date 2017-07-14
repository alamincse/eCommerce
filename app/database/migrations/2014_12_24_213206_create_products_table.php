<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'products', function($table){
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->longtext( 'desc' );
			$table->string( 'model' );
			$table->string( 'location' );
			$table->string( 'phone' ); // 01717251095
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
		Schema::drop( 'products' );
	}

}
