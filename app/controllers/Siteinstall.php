<?php 
/**
 * Description : Site Installation process
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Siteinstall extends BaseController 
	{
		/**
		 * Check admin information
		 */
		public function index()
		{
			/** check admin in your site before site install */
			$admin = Siteadmin::Admin();

			if( $admin )
				return View::make( 'siteadmin.login' )->with( 'title', 'Admin Login' );
			else
				return View::make( 'siteadmin.register' )->with( 'title', 'Registration for Admin Access' );
		}


		/**
		 * Register confirmation
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function register()
		{
			/** set validation rules */
			$rules = array(
				'name' => 'required|min:3|max:15',
				'un'   => 'required|min:3|max:20',
				'email' => 'required|email',
				'pw'   => 'required',
				'c-pw'   => 'required|same:pw'
			);

			/** check valid information */
			$validator = Validator::make( Input::all(), $rules );
			
			if( $validator->fails() )
			{
				/** show error msg */
				return Redirect::to( 'siteadmin' )->withErrors( $validator )->withInput();
			}
			else
			{
				/** Call user class from database segment */
				$user = new User;
				$user->name  	= Input::get( 'name' );
				$user->username = Input::get( 'un' );
				$user->email 	= Input::get( 'email' );
				$user->password = Hash::make( Input::get( 'pw' ) );
				$user->save();

				$login = "<a href='" .URL::to( 'siteadmin' ) ."'>Login</a>";
				
				return View::make( 'siteadmin.register_complete' )->with( 'msg', 'Well done! You have been successfully registration on your site admin. Now you can ' .$login .' and go to the siteadmin section.' )->with( 'title', 'Registration success' );
			}
		}



		/**
		 * Site Administrator login
		 * @package    : eCommerce
		 */
		public function dologin()
		{
			/** Set rules */
			$rules = array(
				'username' => 'required|min:3|max:20',
				'password' => 'required|min:3'
			);

			/** Check valid information */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->fails() )
			{
				/** show error msg */
				return Redirect::to( 'siteadmin' )->withErrors( $validator )->withInput();
			}
			else
			{
				/** Store admin information */
				$userdata = array(
					'email' => Input::get( 'username' ),
					'password' => Input::get( 'password' )
				);

				/** Set remember me button */
				$remember = ( Input::has('remember') ) ? true : false;


				/** Check original admin and access dashboard panel */
				if( Auth::attempt( $userdata, $remember ) )
				{
					/** Go to dashboard URL */
					return Redirect::intended( '/siteadmins' );
				}
				else
				{
					return Redirect::to( '/siteadmin' )->with( 'msg', 'Oops! Your Email or Password don\'t match!' );
				}
			}
		}


		/**
		 * Password forgot
		 * @author   : AL-AMIN
		 */
		public function forgot()
		{
			return View::make( 'siteadmin.forgot' )->with( 'title', 'Forgot Password.' );
		}


		/**
		 * Forgot password with email validation
		 * @author     : AL-AMIN
		 */
		public function passwordForgot()
		{
			/** Set rules */
			$rules = array( 'email' => 'required|email' );

			/** Check valid email */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->fails() )
			{
				return Redirect::route( 'password' )->withErrors( $validator )->withInput();
			}
			else
			{
				/** check email from DB users table */
				$user = User::where( 'email', '=', Input::get('email') );
				
				if( $user->count() )
				{
					$user = $user->first();
					$code = str_random( 60 );
					$password = str_random(10);

					$user->code = $code;
					$user->password = Hash::make( $password );
					
					/** Save pw and sent email with new pw */
					if( $user->save() )
					{
						/** sent mail with recover template */
						Mail::send( 'siteadmin.password_recover.recover', array( 'link' => URL::route( 'accout-recover', $code ), 'username' => $user->username, 'password' => $user->password ), function($message) use ($user)
						{
							$message->to( $user->email, $user->username )->subject( 'Your new password.' );
						});

						return Redirect::route( 'password' )->with( 'msg', 'We have sent you a new password by email.' );
					}
				}
				else
				{
					return Redirect::route( 'password' )->with( 'msg', 'Oops! Don\'t match your email.' );
				}
			}
		}


		/**
		 * Check password recover successfull or not.
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function AccoutRecover( $code )
		{
			/** Check <code> column in your DB */
			$user = User::where( 'code', '=', $code );

			if( $user->count() )
			{
				/** Store <code> column is empty for next store code by email with password request. */
				$user->code = '';

				if( $user->save() )
				{
					return Redirect::route( 'siteadmin' )->with( 'global', 'Your account has been recovered and you can sign in with your new password.' );
				}
			}

			return Redirect::route( 'siteadmin' )->with( 'global', 'Could not recover your account.' );
		}
	}
?>