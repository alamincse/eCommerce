<?php 
/**
 * Description : Only Site Administrator Access This Area(Admin Panel).
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	Route::get( '/siteadmin', array(
		'as'   => 'siteadmin',
		'uses' => 'Siteinstall@index'
	) )->before( 'guest' ); // If user can search http://localhost:8000/siteadmin after login, then autometically redirect the siteadmins page.

	/** 
	 * CSRF protection group 
	 * @param string 
	 */
	Route::group( array('before' => 'csrf'), function()
	{
		
		/** when No admin in your website then active this controller */
		Route::post( 'siteadmin', 'Siteinstall@register' );

		/** when admin can login then active this controller */
		Route::post( 'siteadmin/login', 'Siteinstall@doLogin' );

		/** when admin can change your password */
		Route::post( 'siteadmins/profile', 'Profiles@changepw' );

		/** 
		 * Forgot password post request(Form post) 
		 * when call Reditect::to( 'siteadmin/forgot-password' ) method
		*/
		Route::post( 'siteadmin/forgot-password', array(
			'as' => 'password',  // when call Redirect::route('password') method.
			'uses' => 'Siteinstall@passwordForgot'
		) );

		/** Email change by admin */
		// Route::post( 'siteadmin/dashboard/profile', array(
		// 	'as' => 'changeemail',  // when call Redirect::route('password') method.
		// 	'uses' => 'Profile@changeEmail'
		// ) );

		/** Add new product on a product page */
		Route::post( 'siteadmins/product/add_product', array(
			'as' 	=> 'saveproduct',
			'uses' => 'Products@saveProduct'
		) );


		/** Add new image for image sliding */
		Route::post( 'siteadmins/slider/add_image', array(
			'as' 	=> 'add-image',
			'uses' => 'Sliders@saveImage'
		) );

		/** Add new image for image bottom sliding */
		Route::post( 'siteadmins/bottom-slider/add-slider-image', array(
			'as' 	=> 'add-bottom-image',
			'uses' => 'Sliders@saveBottomSliderImage'
		) );
	} );


	/**
	 * Check siteadmin by Before(auth) filter.
	 * @param string<array()>
	 */
	Route::group( array('before' => 'auth'), function()
	{
		
		/** Goto Dashboard controller */
		Route::get( '/siteadmins', array(
			'as' => 'dashboard',
			'uses' => 'Dashboard@index'
		) );

		/**
		 * Start Product page
		 * @access private
		 */
		Route::get( 'siteadmins/product', array(
			'as'   => 'products',
			'uses' => 'Products@index'
		) );

		/** product edit */
		Route::get( 'siteadmins/product/edit/{task}', array(
			'as'   => 'product-edit',
			'uses' => 'Products@productEdit'
		) );

		/** product update */
		Route::post( 'siteadmins/product/update/{task}', array(
			'as'   => 'product-update',
			'uses' => 'Products@productUpdate'
		) );

		/** Show product only for online */
		Route::get( 'siteadmins/product/online', array(
			'as'   => 'online',
			'uses' => 'Products@onlineProduct'
		) );

		/** Show pending product */
		Route::get( 'siteadmins/product/pending', array(
			'as'   => 'pending',
			'uses' => 'Products@pendingProduct'
		) );

		/** Add new product */
		Route::get( 'siteadmins/product/add_product', array(
			'as' 	=> 'addproduct',
			'uses' => 'Products@addProduct'
		) );


		/** Delete product for all segment */
		Route::post( 'siteadmins/products/delete/{task}', array(
			'as' 	=> 'delete',
			'uses' => 'Products@destroyProduct'
		) );


		/** Delete product for online segment */
		Route::post( 'siteadmins/products/online/delete/{task}', array(
			'as'   => 'onlineDelete',
			'uses' => 'Products@destroyProduct'
		) );

		/** Delete product for pending segment */
		Route::post( 'siteadmins/products/pending/delete/{task}', array(
			'as'   => 'pendingDelete',
			'uses' => 'Products@destroyProduct'
		) );
		/** End product page */

		/** Product Order segment */
		Route::get( 'siteadmins/orders', array(
			'as'   => 'orders',
			'uses' => 'Order@index'
		) );

		/** Withdraw segment */
		Route::get( 'siteadmins/withdraw', array(
			'as'   => 'withdraws',
			'uses' => 'Withdraw@index'
		) );

		/** Admin Settings page */
		Route::get( 'siteadmins/settings', array(
			'as'   => 'settings',
			'uses' => 'Settings@index'
		) );

		/** Admin Profile page */
		// Route::get( 'siteadmins/profile', array(
		// 	'as'   => 'profile',
		// 	'uses' => 'Profile@index'
		// ) );

		Route::get('siteadmins/profile', array(
			'as' => 'profile',
			'uses' => 'Profiles@index'
		));


		/** Sliding section */
		Route::get('siteadmins/slider', array(
			'as' => 'slider',
			'uses' => 'Sliders@mainSlider'
		));

		Route::get('siteadmins/slider/add_image', array(
			'as' => 'add-image',
			'uses' => 'Sliders@addImage'
		));

		/** Slider Image deleting  */
		Route::post('siteadmins/slider/delete/{task}', array(
			'as' => 'deleteImage',
			'uses' => 'Sliders@destroySlider'
		));

		/** Edit slider show */
		Route::get( 'siteadmins/slider/edit/{task}', array(
			'as' => 'sliderEdit',
			'uses' => 'Sliders@SliderEdit'
		));

		Route::post( 'siteadmins/slider/update/{task}', array(
			'as' => 'updatSlider',
			'uses' => 'Sliders@sliderUpdate'
		) );

		/** Bottom slider */
		Route::get('siteadmins/bottom-slider', array(
			'as' => 'bottom-slider',
			'uses' => 'Sliders@addBottomImage'
		));

		Route::get('siteadmins/bottom-slider/add-slider-image', array(
			'as' => 'add-bottom-image',
			'uses' => 'Sliders@addBottomSliderImage'
		));


		/** Page settings */
		Route::get('siteadmins/customerservice', array(
			'as' => 'customer-service',
			'uses' => 'Pages@customerService'
		));

		/** add customer service */
		Route::get( 'siteadmins/customerservice/NewCustomer', array(
			'as'   => 'add-customer',
			'uses' => 'Pages@addCustomer'
		) );

		/** Save customer service point */
		Route::post( 'siteadmins/customerservice/NewCustomer', array(
			'as'   => 'save-customer',
			'uses' => 'Pages@saveCustomer'
		) );


		/** Edit customer service */
		Route::get( 'siteadmins/customerservice/EditCustomer/{task}', array(
			'as'   => 'edit-customer',
			'uses' => 'Pages@editCustomer'
		) );

		/** Update customer service */
		Route::post( 'siteadmins/customerservice/UpdateCustomer/{task}', array(
			'as'   => 'update-customer',
			'uses' => 'Pages@updateCustomer'
		) );


		/** About our business */
		Route::get('siteadmins/about', array(
			'as' => 'about',
			'uses' => 'Pages@about'
		));

		/** add new about plan */
		Route::get( 'siteadmins/about/NewAbout', array(
			'as'   => 'add-about',
			'uses' => 'Pages@addAbout'
		) );

		/** save about our plan */
		Route::post( 'siteadmins/about/NewAbout', array(
			'as'   => 'save-about',
			'uses' => 'Pages@saveAbout'
		) );

		/** edit about page */
		Route::get( 'siteadmins/about/EditAbout/{task}', array(
			'as'   => 'edit-about',
			'uses' => 'Pages@editAbout'
		) );


		/** update about page */
		Route::post( 'siteadmins/about/UpdateAbout/{task}', array(
			'as'   => 'update-about',
			'uses' => 'Pages@updateAbout'
		) );


		/** Trade service page */
		Route::get('siteadmins/trade', array(
			'as' => 'trade',
			'uses' => 'Pages@trade'
		));


		/** show follow */
		Route::get('siteadmins/follow', array(
			'as' => 'follow',
			'uses' => 'Pages@follow'
		));

		/** add follow */
		Route::get( 'siteadmins/follow/add_new', array(
			'as'   => 'savefollow',
			'uses' => 'Pages@addFollow'
		) );

		/** save follow */
		Route::post( 'siteadmins/follow/add_new', array(
			'as'   => 'savefollow',
			'uses' => 'Pages@saveFollow'
		) );

		/** follow edit */
		Route::get( 'siteadmins/follow/edit/{task}', array(
			'as'   => 'follow-edit',
			'uses' => 'Pages@editFollow'
		) );

		/** update follow */
		Route::post( 'siteadmins/follow/update/{task}', array(
			'as'   => 'updatefollow',
			'uses' => 'Pages@updateFollow'
		) );


		/** navigation selection  */
		HTML::macro( 'clever_link', function( $Route, $Name )
		{
			if( Request::path() == $Route )
				$active = 'class="active animated rollIn" style="background: #F15A23;"';
			else
				$active = '';

			return '<li ' .$active .'>' .link_to( $Route, $Name ) .'</li>';
		} );
	} );

	/** 
	 * Logout segment after login 
	 * Remember <siteadmins> not <siteadmin>
	 */
	Route::get( 'siteadmins/logout', array(
		'as' => 'logout',
		'uses' => 'Dashboard@logout'
	) );

	/** Forgot password get request */
	Route::get( 'siteadmin/forgot-password', array(
		'as' => 'forgot-password',
		'uses' => 'Siteinstall@forgot'
	) );

	/** Send mail with active code and request new password */
	Route::get( 'siteadmin/forgot-password/{code}', array(
		'as' => 'accout-recover',  
		'uses' => 'Siteinstall@AccoutRecover'
	) );
?>