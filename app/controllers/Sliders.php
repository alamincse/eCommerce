<?php 
/**
 * Class Name : Sliders
 * @author     : AL-AMIN
 * @package    : eCommerce
 */
	class Sliders extends BaseController
	{
		/**
		 * Main Slider on this project
		 */
		public function mainSlider()
		{
			/** show all rows from sliders table using Eloquent */
			$sliders = Slider::orderBy( 'id', 'DESC' )->get();

			return View::make( 'siteadmin.slider.index' )
					->with( 'sliders', $sliders )
					->with( 'title', 'Main Slider' );
		}

		/**
		 * Image adding for sliding
		 */
		public function addImage()
		{
			return View::make( 'siteadmin.slider.addimage' )
					->with( 'title', 'Add Image For Sliding.' );
		}

		/**
		 * Image Save for sliding
		 */
		public function saveImage()
		{
			/** set rules */
			$rules = array(
				'image'  => 'required|image',
				'name'   => 'required|min:2',
				'desc'   => 'required|min:3',
				'width'  => 'required',
				'height' => 'required',
				'status' => 'required',
			);

			/** check valid info  */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				$product = new Slider;
				
				/** Get the last record in a table using Eloquent */
				$lastRow = Slider::orderBy( 'id', 'DESC' )->first();
				
				/** store last id from sliders table */	
				$lastId = $lastRow->id;
				$newId = $lastId + 1;

				$product->name     = Input::get( 'name' );
				$product->desc     = Input::get( 'desc' );
				$product->width    = Input::get( 'width' );
				$product->height   = Input::get( 'height' );
				$product->status   = Input::get( 'status' );

				/** get file name from form field */
				$image = Input::file( 'image' );

				/** store real image name */
				$filename =$image->getClientOriginalName();
				
				/** Image save on the products folder with image resize */
				Image::make( $image->getRealPath() )
						->resize( $product->width, $product->height )
						->save( 'public/assets/dist/products/slider/' .$newId .'-'.$filename );

				/** Image save on the DB column */
				$product->image = 'assets/dist/products/slider/' .$newId.'-' .$filename;

				if( $product->save() )
				{
					return Redirect::route( 'add-image' )
							->with( 'msg', 'Well done! You have successfully add new image for sliding.' );
				}
			}
			else
			{
				return Redirect::route( 'add-image' )
						->withErrors( $validator )
						->withInput();
			}
		}


		/**
		 * Settings bottom slider
		 */
		public function addBottomImage()
		{
			/** store image  */
			$sliders = BottomSlider::ShowBottomSlider();

			return View::make( 'siteadmin.bottom-slider.index' )
					->with( 'sliders', $sliders )
					->with( 'title', 'Bottom Slider' );
		}


		/**
		 * Image adding for bottom sliding
		 * @author     : AL-AMIN
		 */
		public function addBottomSliderImage()
		{
			return View::make( 'siteadmin.bottom-slider.addimage' )
					->with( 'title', 'Bottom Slider Image Adding.' );
		}


		/**
		 * Save Bottom sliding image
		 */
		public function saveBottomSliderImage()
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
				$product = new BottomSlider;
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
						->save( 'public/assets/dist/products/bottom-slider/' .$filename );
				
				/** Image save on the DB column */
				$product->image = 'assets/dist/products/bottom-slider/' .$filename;

				if( $product->save() )
				{
					return Redirect::route( 'add-bottom-image' )
							->with( 'msg', 'Well done! You have successfully add your product.' );
				}
			}
			else
			{
				return Redirect::route( 'add-bottom-image' )
						->withErrors( $validator )
						->withInput();
			}
		}


		/**
		 * Destroy main slider image
		 */
		public function destroySlider( $task )
		{
			return $task;
			/** Find id with the $task variable */
			$slider = Slider::find( $task );

			return $slider;
			
			/** store image name */
			$fileImage = $slider->image;
			return $fileImage;
			File::delete( $fileImage );

			/** Delete item by delete method */
			$destroySignal = $slider->delete();

			/** show confirmatin msg after deleting. */
			if( $destroySignal )
			{
				return Redirect::route( 'slider' )
						->with( 'msg', 'You have successfully delete one item from your area.' );
			}
		}


		/**
		 * Slider Edit segment
		 * @return array()
		 */
		public function SliderEdit( $task )
		{
			/** show all rows from sliders table using Eloquent */
			$sliders = Slider::where( 'id', $task )->get();

			return View::make( 'siteadmin.slider.edit' )
					->with( 'sliders', $sliders )
					->with( 'title', 'Slider Edit' );
		}


		/**
		 * Update Slider by siteadmin
		 * @return string<array()>
		 */
		public function sliderUpdate( $task )
		{
			/** set rules */
			$rules = array(
				'image'  => 'required|image',
				'name'   => 'required|min:2',
				'desc'   => 'required|min:3',
				'width'  => 'required',
				'height' => 'required',
				'status' => 'required',
			);

			/** check valid info  */
			$validator = Validator::make( Input::all(), $rules );

			if( $validator->passes() )
			{
				/** get file name from form field */
				$image = Input::file( 'image' );
				
				/** store old image from database for deleting using Eloquent */
				$oldImage = Slider::find( $task ); // 'select * from sliders where id = $task'

				/** store real image name */
				$filename = time() .'-' .$image->getClientOriginalName();

				/** Old image delete from 'slider' folder */
				File::delete( 'public/' .$oldImage->image );

				/** Image save on the products folder with image resize */
				Image::make( $image->getRealPath() )
						->resize( Input::get( 'width' ), Input::get( 'height' ) )
						->save( 'public/assets/dist/products/slider/' .$task .'-'.$filename );

				$updateSlider = Slider::where( 'id', $task )
						->update(array(
							'name' => Input::get( 'name' ),
							'desc' => Input::get( 'desc' ),
							'width' => Input::get( 'width' ),
							'height' => Input::get( 'height' ),
							'status' => Input::get( 'status' ),
							'image' => 'assets/dist/products/slider/' .$task.'-' .$filename	
						));

				if( $updateSlider )
				{
					return Redirect::route( 'slider' )
							->with( 'msg', 'Well done! You have successfully update your image for sliding.' );
				}
			}
			else
			{
				return Redirect::route( 'slider') 
						->withErrors( $validator )
						->withInput();
			}
		}
	}
?>