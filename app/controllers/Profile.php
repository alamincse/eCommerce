<?php 
/**
 * Class Name  : Profile
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Profile extends BaseController
	{
		public function index()
		{
			return View::make( 'siteadmin.profile' )->with( 'title', 'Admin Profile' );
		}

		/**
		 * Chnage admin password
		 * @author     : AL-AMIN
		 */
		public function changepw()
		{
			/** Set rules */	
			$rules = array(
				'pw' => 'required',
				'n-pw' => 'required|min:3',
				'n-pwa' => 'required|same:n-pw'
			);

			/** Check valid info */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->fails() )
			{
				// return 'wrong';
				return Redirect::route( 'profile' )->withErrors( $validator )->withInput();
			}
			else
			{
				/** Find current admin by id */
				$user = User::find( Auth::user()->id );

				$c_pw = Input::get( 'pw' );
				$n_pw = Input::get( 'n-pw' );

				/** Check Current and New pw are same or not */
				if( Hash::check($c_pw, $user->getAuthPassword()) )
				{
					/** Store new pw in DB */
					$user->password = Hash::make( $n_pw );
					if( $user->save() )
					{
						return Redirect::route( 'profile' )->with( 'msg', 'Well done! Your password has been changed.' );
					}
				}
				else
				{
					/** If don't match you current pw */
					return Redirect::route( 'profile' )->with( 'erro', 'Oops! Don\'t match your current password.' );
				}
			}
		}


		/**
		 * Change admin email
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		// public function changeEmail()
		// {
		// 	/** Set rules */
		// 	$rules = array( 
		// 		'c_email' => 'required|email',
		// 		'n_email' => 'required|email',
		// 	);

		// 	/** check valid email */
		// 	$validator = Validator::make( Input::all(), $rules );

		// 	// $validator->passes()
		// 	if( $validator->fails() )
		// 	{
		// 		return Redirect::route( 'changeemail' )->withErrors( $validator )->withInput();
		// 	}
		// 	else
		// 	{
		// 		/** check valid email from your BD table */
		// 		$user = User::where( 'email', '=', Input::get( 'c_email' ) );

		// 		if( $user->count() )
		// 		{
		// 			/** store new email into DB */
		// 			$user->email = Input::get( 'n_email' );

		// 			/** save new mail and show msg */
		// 			if( $user->save() )
		// 			{
		// 				return Redirect::route( 'changeemail' )->with( 'msg', 'Well done! You have successfully change your email.' );
		// 			}
		// 		}
		// 		else
		// 		{
		// 			return Redirect::route( 'changeemail' )->with( 'erro', 'Oops! Don\'t match your current email.' );
		// 		}
		// 	}
		// }
	}
?>