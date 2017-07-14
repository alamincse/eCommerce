<?php 
/**
 * Class Name : Pages 
 * @author    : AL-AMIN
 * @package   : eCommerce
 * @access private
 */
	class Pages extends BaseController 
	{
		/**
		 * Customer Service page
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function customerService()
		{

			$service = Customerservice::orderBy( 'id', 'desc' )->get();

			return View::make( 'siteadmin.pages.service.customerservice' )
						->with( 'services', $service )
						->with( 'title', 'Customer Service Page' );
		}


		/** Add New Customer Service Point. */
		public function addCustomer()
		{
			return View::make( 'siteadmin.pages.service.addcustomer' )
						->with( 'title', 'New Customer Service Page' );
		}

		
		/** Save Customer Service Point */
		public function saveCustomer()
		{
			/** set rules */
			$rules = array(
				'title' => 'required',
				'name' => 'required'
			);

			/** check validator */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				$service = New Customerservice;

				$service->title     = Input::get( 'title' );
				$service->name     = Input::get( 'name' );

				if( $service->save() )
				{
					return Redirect::route( 'customer-service' )
							->with( 'msg', 'Well done! You have successfully add your Customer Service Point.' );
				}
			}
			else
			{
				return Redirect::route( 'add-customer' )
								->withErrors( $validator )
								->withInput();
			}
		}


		/** Edit Customer Service Point */
		public function editCustomer( $task )
		{
			$service = Customerservice::where( 'id', $task )->get();

			return View::make( 'siteadmin.pages.service.editservice' )
						->with( 'services', $service )
						->with( 'title', 'Edit Customer Service Point' );
		}


		/** Update Customer Service Point */
		public function updateCustomer( $task )
		{
			/** set rules */
			$rules = array( 
				'title' => 'required', 
				'name'  => 'required', 
			);

			/** check validation */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
			
				/** update command */
				$cupdate = Customerservice::where( 'id', $task )
						->update(array(
							'title' => Input::get( 'title' ),
							'name' => Input::get( 'name' )
						));

				/** set msg */		
				if( $cupdate )
				{
					return Redirect::route( 'customer-service' )
							->with( 'msg', 'Well done! You have successfully updated your Customer Service Point.' );
				}
			}
			else
			{
				return Redirect::route( 'edit-customer', array($task) )->with( 'msg', 'Oops! Something was wrong!' );
			}
		}


		/**
		 * About Us Segment
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function about()
		{
			$about = About::orderBy( 'id', 'desc' )->limit('1')->get();

			return View::make( 'siteadmin.pages.about.aboutus' )
						->with( 'abouts', $about )
						->with( 'title', 'About Us' );
		}


		/** Add new about our business plan */
		public function addAbout()
		{
			return View::make( 'siteadmin.pages.about.newabout' )
						->with( 'title', 'Our Business Plan' );
		}

		/** save about plan */
		public function saveAbout()
		{
			/** set rules */
			$rules = array( 
				'name' => 'required', 
				'desc' => 'required', 
			);

			/** check validation */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				/** DB Table connetion */
				$me = new About;
				$me->name     = Input::get( 'name' );
				$me->desc     = Input::get( 'desc' );

				if( $me->save() )
				{
					return Redirect::route( 'about' )
							->with( 'msg', 'Well done! You have successfully add our about plan.' );
				}
			}
			else
			{
				return Redirect::route( 'save-about' )
						->withErrors( $validator )
						->withInput();
			}
		}

		/** Edit about page */
		public function editAbout( $task )
		{
			$eabout = About::where( 'id', $task )->orderBy( 'id', 'desc' )->limit( '1' )->get();

			return View::make( 'siteadmin.pages.about.editabout' )
						->with( 'abouts', $eabout )
						->with( 'title', 'Edit About Us' );
		}

		/** update about page */
		public function updateAbout( $task )
		{
			/** set rules */
			$rules = array( 
				'name' => 'required', 
				'desc' => 'required', 
			);

			/** check validation */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
			
				/** update command */
				$fupdate = About::where( 'id', $task )
						->update(array(
							'name' => Input::get( 'name' ),
							'desc' => Input::get( 'desc' )
						));

				/** set msg */		
				if( $fupdate )
				{
					return Redirect::route( 'about' )
							->with( 'msg', 'Well done! You have successfully updated your Follow connection.' );
				}
			}
			else
			{
				return Redirect::route( 'edit-about', array($task) )->with( 'msg', 'Oops! Something was wrong!' );
			}
		}


		/**
		 * Trade service on our business
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function trade()
		{
			return View::make( 'siteadmin.pages.customerservice' )
						->with( 'title', 'Trade Services' );
		}



		/**
		 * Follow page create
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function follow()
		{
			$follow = Follow::orderBy( 'id', 'DESC' )->limit('1')->get();

			return View::make( 'siteadmin.pages.follow.follow' )
						->with( 'follows', $follow )
						->with( 'title', 'Follow Us' );
		}

		/** Add new follow connection */
		public function addFollow()
		{
			return View::make( 'siteadmin.pages.follow.addfollow' )
						->with( 'title', 'New Follow Us' );
		}

		/** Save Follow connection */
		public function saveFollow()
		{
			/** set rules */
			$rules = array( 
				'name' => 'required', 
				'desc' => 'required', 
			);

			/** check validation */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				/** DB Table connetion */
				$conn = new Follow;
				$conn->name     = Input::get( 'name' );
				$conn->desc     = Input::get( 'desc' );

				if( $conn->save() )
				{
					return Redirect::route( 'savefollow' )
							->with( 'msg', 'Well done! You have successfully add your Follow connection.' );
				}
			}
			else
			{
				return Redirect::route( 'savefollow' )
						->withErrors( $validator )
						->withInput();
			}
		}


		/** Follow edit */
		public function editFollow( $task )
		{
			$follow = Follow::where( 'id', $task )->orderBy( 'id', 'desc' )->limit( '1' )->get();

			return View::make( 'siteadmin.pages.follow.editfollow' )
						->with( 'follows', $follow )
						->with( 'title', 'Edit Follow Us' );
		}

		/** Follow Update */
		public function updateFollow( $task )
		{
			/** set rules */
			$rules = array( 
				'name' => 'required', 
				'desc' => 'required', 
			);

			/** check validation */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
			
				/** update command */
				$fupdate = Follow::where( 'id', $task )
						->update(array(
							'name' => Input::get( 'name' ),
							'desc' => Input::get( 'desc' )
						));

				/** set msg */		
				if( $fupdate )
				{
					return Redirect::route( 'follow' )
							->with( 'msg', 'Well done! You have successfully updated your Follow connection.' );
				}
			}
			else
			{
				return Redirect::route( 'follow-edit', array($task) )->with( 'msg', 'Oops! Something was wrong!' );
			}
		}
	}
?>