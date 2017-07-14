<?php 
/**
 * Model Name : Product
 * @author    : AL-AMIN
 * @package   : eCommerce
 */
	class Product extends Eloquent
	{
		protected $table = 'products';

		/** query id for delete or edit any item from products table */
		protected $fillable = array( 'id', 'image' );
	}
?>