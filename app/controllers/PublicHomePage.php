<?php 
	class PublicHomePage extends BaseController
	{
		public function publicHome()
		{
			/** show model name */
			$name = ShowPublicProduct::orderBy( 'id', 'DESC' )->get();

			/** show product */
			$products = ShowPublicProduct::where( 'status', 'Enable' )
											->orderBy( 'id', 'DESC' )
											->get();

			/** main slider */
			$slider = ShowPublicSlider::orderBy( 'id', 'DESC' )
										->where( 'status', 'Active' )
										->get();

			/** bottom slider */
			$bsliders = ShowPublicBottomSlider::where( 'status', 'Enable' )
												->orderBy( 'id', 'DESC' )
												->get();

			/** customer service */
			$service = Customerservice::orderBy( 'id', 'desc' )->get();

			/** follow us segment */
			$follow = Follow::orderBy( 'id', 'DESC' )->limit('1')->get();

			/** About us segment */
			$me = About::orderBy( 'id', 'DESC' )->limit('1')->get();


			return View::make( 'public.home.index' )
					->with( 'names', $name )
					->with( 'products', $products )
					->with( 'slider', $slider )
					->with( 'bsliders', $bsliders )
					->with( 'services', $service )
					->with( 'follows', $follow )
					->with( 'mes', $me )
					->with( 'title', 'A Virtual Shopping Center.' );
		}


		/**
		 * Show single product
		 * @author     : AL-AMIN
		 * @package    : eCommerce
		 */
		public function singleProduct( $task )
		{
			/** show model name */
			$name = ShowPublicProduct::orderBy( 'id', 'DESC' )->get();

			/** show product */
			$products = ShowPublicProduct::where( 'id', $task )->get();

			/** customer service */
			$service = Customerservice::orderBy( 'id', 'desc' )->get();

			/** follow us segment */
			$follow = Follow::orderBy( 'id', 'DESC' )->limit('1')->get();

			/** about us segment */
			$me = About::orderBy( 'id', 'DESC' )->limit('1')->get();

			return View::make( 'public.home.singleproduct' )
					->with( 'names', $name )
					->with( 'products', $products )
					->with( 'services', $service )
					->with( 'follows', $follow )
					->with( 'mes', $me )
					->with( 'title', $task );

		}
	}
?>