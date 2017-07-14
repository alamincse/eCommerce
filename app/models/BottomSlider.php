<?php 
/**
 * Model Name  : BottomSlider 
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class BottomSlider extends Eloquent
	{
		/** show slider image for admin section */
		public static function ShowBottomSlider()
		{
			return DB::table( 'bottom_sliders' )
					->where( 'status', 'Enable' )
					->orderBy( 'id', 'DESC' )
					->get();
		}
	}
?>