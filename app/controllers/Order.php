<?php 
	class Order extends BaseController
	{
		public function index()
		{
			return View::make( 'siteadmin.order' )->with( 'title', 'Product Page' );
		}
	}
?>