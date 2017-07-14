<?php 
	class Withdraw extends BaseController
	{
		public function index()
		{
			return View::make( 'siteadmin.withdraw' )->with( 'title', 'Withdraw Page' );
		}
	}
?>