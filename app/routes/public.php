<?php 
/**
 * Description : Show public Information
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	Route::get( '/', array(
		'as' => 'home',
		'uses' => 'PublicHomePage@publicHome'
	) );

	Route::get( 'product', array(
		'as' => '',
		'uses' => 'PublicHomePage@publicHome'
	) );

	Route::get( 'product/{task}', array(
		'as'   => 'single-product',
		'uses' => 'PublicHomePage@singleProduct'
	) );
?>