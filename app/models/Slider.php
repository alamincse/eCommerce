<?php 
/**
 * Model Name  : Slider 
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Slider extends Eloquent
	{
		protected $table = 'sliders';

		/** For delete or edit slider image */
		protected $fillable = array( 'id', 'image' );
	}
?>