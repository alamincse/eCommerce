<?php 
/**
 * Profile Information 
 * @author : AL-AMIN
 * @access private
 */
	class AdminProfile extends Eloquent
	{
		public static function Info()
		{
			return DB::select( 'SELECT * FROM users' );
		}
	}
?>