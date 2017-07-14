<?php 
	class Settings extends BaseController
	{
		public function index()
		{
			return View::make( 'siteadmin.settings' )->with( 'title', 'Settings Page' );
		}
	}
?>