<?php 
/**
 * Description : Dashboard Controller
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Dashboard extends BaseController
	{

		public function index()
		{
			return View::make( 'siteadmin.index' )->with( 'title', 'Dashboard Panel.' );
		}


		/**
		 * Logout by site administrator
		 * @author     : AL-AMIN
		 */
		public function logout()
		{
			Auth::logout();
			return Redirect::to( 'siteadmin' )->with( 'msg', 'You have successfully logged out!' );
		}
	}
?>