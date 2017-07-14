<?php 
/**
 * Class Name : Products 
 * @author    : AL-AMIN
 * @package   : eCommerce
 * @access private
 */
	class Products extends BaseController
	{
		/**
		 * Show product main page
		 */
		public function index()
		{
			/** show all products */
			// $products = Product::orderBy( 'id', 'DESC' )->get();
			$products = Product::orderBy( 'id', 'DESC' )->paginate(5);

			/** count all products */
			$totalProduct = Product::count();

			/** show only online products */
			$showOnline = Product::where( 'status', '=', 'Enable' )->count();

			/** Disable products */
			$hide = Product::where( 'status', '=', 'Disable' )->count();

			return View::make( 'siteadmin.product.product' )
					->with( 'products', $products )
					->with( 'total', $totalProduct )
					->with( 'online', $showOnline )
					->with( 'hide', $hide )
					->with( 'title', 'Product Page' );
		}


		/**
		 * Description : Show product for online
		 * @param string<array()>
		 */
		public function onlineProduct()
		{
			/** For online product */
			$onlineProducts = Product::where( 'status', '=', 'Enable' )->orderBy( 'id', 'DESC' )->get();

			/** count all products */
			$totalProduct = Product::count();

			/** show only online products */
			$showOnline = Product::where( 'status', '=', 'Enable' )->count();

			/** Disable products */
			$hide = Product::where( 'status', '=', 'Disable' )->count();

			return View::make( 'siteadmin.product.online' )
					->with( 'onlineProducts', $onlineProducts )
					->with( 'total', $totalProduct )
					->with( 'online', $showOnline )
					->with( 'hide', $hide )
					->with( 'title', 'Online Product' );
		}

		/**
		 * Description : Show pending product
		 * @param string<array()>
		 */
		public function pendingProduct()
		{
			/** For online product */
			$pending = Product::where( 'status', '=', 'Disable' )->get();

			/** count all products */
			$total = Product::count();

			/** show only online products */
			$Online = Product::where( 'status', '=', 'Enable' )->count();

			/** Disable products */
			$hide = Product::where( 'status', '=', 'Disable' )->count();

			return View::make( 'siteadmin.product.pending' )
					->with( 'pending', $pending )
					->with( 'total', $total )
					->with( 'online', $Online )
					->with( 'hide', $hide )
					->with( 'title', 'Pending Product' );
		}

		/**
		 * Show Add product form
		 */
		public function addProduct()
		{
			return View::make( 'siteadmin.product.add_product' )
					->with( 'title', 'Product Add' );
		}

		/**
		 * Save info by a new product form
		 * @param : string<array()>
		 */
		public function saveProduct()
		{
			/** Set rules */
			$rules = array(
				'image'    => 'required|image', //|mimes:jpeg,jpg,bmp,png,gif
				'name' 	   => 'required|min:3',
				'desc' 	   => 'required|min:30',
				'model'    => 'required|min:3',
				'location' => 'required|min:3',
				'phone'    => 'required',
				'price'    => 'required',
				'n_price'  => '',
				'quantity' => '',
				'stock'    => 'required',
				'status'   => 'required'
			);

			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				$product = new Product;
				$product->name     = Input::get( 'name' );
				$product->desc     = Input::get( 'desc' );
				$product->model    = Input::get( 'model' );
				$product->location = Input::get( 'location' );
				$product->phone    = Input::get( 'phone' );
				$product->price    = Input::get( 'price' );
				$product->n_price  = Input::get( 'n_price' );
				$product->quantity = Input::get( 'quantity' );
				$product->stock    = Input::get( 'stock' );
				$product->status   = Input::get( 'status' );

				/** get file name from form field */
				$image = Input::file( 'image' );

				/** store real image name */
				$filename = time() .'-' .$image->getClientOriginalName();
				
				/** Image save on the products folder with image resize */
				Image::make( $image->getRealPath() )
						->resize( 450, 350 )
						->save( 'public/assets/dist/products/' .$filename );
				
				/** Image save on the DB column */
				$product->image = 'assets/dist/products/' .$filename;

				if( $product->save() )
				{
					return Redirect::route( 'addproduct' )
							->with( 'msg', 'Well done! You have successfully add your product.' );
				}
			}
			else
			{
				return Redirect::route( 'addproduct' )->withErrors( $validator )->withInput();
			}
		}


		/**
		 * Delete Item when admin want from all product segment.
		 */
		public function destroyProduct( $task )
		{
			/** Find id with the $task variable */
			$product = Product::find( $task );

			/** Delete item by delete method */
			$destroySignal = $product->delete();

			/** show confirmatin msg after deleting. */
			if( $destroySignal )
			{
				return Redirect::route( 'products' )
						->with( 'msg', 'You have successfully delete one item from your area.' );
			}
		}

		/**
		 * Edite Product by siteadmin
		 */
		public function productEdit( $task )
		{
			$product = Product::where( 'id', $task )->get();

			return View::make( 'siteadmin.product.editProduct' )
						->with( 'products', $product )
						->with( 'title', 'Product Edit' );
		}


		/**
		 *  Update Product by siteadmin
		 */
		public function productUpdate( $task )
		{
			
			/** Set rules */
			$rules = array(
				'image'    => 'required|image', //|mimes:jpeg,jpg,bmp,png,gif
				'name' 	   => 'required|min:3',
				'desc' 	   => 'required|min:30',
				'model'    => 'required|min:3',
				'location' => 'required|min:3',
				'phone'    => 'required',
				'price'    => 'required',
				'n_price'  => '',
				'quantity' => '',
				'stock'    => 'required',
				'status'   => 'required'
			);
			
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				/** get file name from form field */
				$image = Input::file( 'image' );

				/** store old image from database for deleting using Eloquent */
				$oldImage = Product::find( $task ); // 'select * from products where id = $task'

				/** Old image delete from 'slider' folder */
				File::delete( 'public/' .$oldImage->image );

				/** store real image name */
				$filename = time() .'-' .$image->getClientOriginalName();
				
				/** Image save on the products folder with image resize */
				Image::make( $image->getRealPath() )
						->resize( 450, 350 )
						->save( 'public/assets/dist/products/' .$filename );

				$updateSlider = Product::where( 'id', $task )
						->update(array(
							'name' => Input::get( 'name' ),
							'desc' => Input::get( 'desc' ),
							'model' => Input::get( 'model' ),
							'location' => Input::get( 'location' ),
							'price' => Input::get( 'price' ),
							'n_price' => Input::get( 'n_price' ),
							'quantity' => Input::get( 'quantity' ),
							'stock' => Input::get( 'stock' ),
							'status' => Input::get( 'status' ),
							'image' => 'assets/dist/products/' .$filename	
						));

				if( $updateSlider )
				{
					return Redirect::route( 'products' )
							->with( 'msg', 'Well done! You have successfully update your product.' );
				}
			}
			else
			{
				return Redirect::route( 'products' )->withErrors( $validator )->withInput();
			}
		}
	}
?>