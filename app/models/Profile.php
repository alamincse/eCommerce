<?php 
/**
 * Profile Information 
 * @author : AL-AMIN
 * @access private
 */
	class Profile extends Eloquent
	{
		public static function info()
		{
			return DB::select( 'SELECT * FROM users' );
		}
	}
?>