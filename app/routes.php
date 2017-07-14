<?php
/**
 * Load all routes file from app/routes folder
 * @author     : AL-AMIN
 * @package    : eCommerce
 */

	foreach( File::allFiles( __DIR__ .'/routes' ) as $partial )
	{
		require_once( $partial->getPathname() );
	}
?>