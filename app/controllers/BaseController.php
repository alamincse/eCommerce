<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		/** When admin is logged in then return true with user table from DB. Otherwise it's false */
		View::share( 'username', Auth::user() )	;
	}

}
