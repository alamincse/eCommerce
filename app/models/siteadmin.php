<?php 
/**
 * Description : Site Installation model
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Siteadmin extends Eloquent
	{
		/**
		 * Checking site admin before your site install.
		 * @author     : AL-AMIN
		 * @param      : string< array()>
		 * @access 	    private
		 */
		public static function Admin()
		{
			return DB::select( 'SELECT * FROM users' );
		}
	}
?>