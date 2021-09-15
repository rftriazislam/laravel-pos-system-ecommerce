<?php
	use App\FrontendSettings;
	use App\Category;
	use App\Product;
	use App\Upload;

	if (!function_exists('get_frontend_settings_info')) {
		function get_frontend_settings_info($name) {
			$frontend_settings_info = FrontendSettings::where('name','=',$name)->first();
			return $frontend_settings_info;
		}
	}

	if (!function_exists('get_frontend_settings_value')) {
		function get_frontend_settings_value($name) {
			$frontend_settings_value = array();
			$frontend_settings_info = get_frontend_settings_info($name);

			if ($frontend_settings_info && $frontend_settings_info->value) {
				$frontend_settings_value = json_decode($frontend_settings_info->value,true);
			}

			return $frontend_settings_value;
		}
	}

	if (!function_exists('get_all_new_product_category')) {
		function get_all_new_product_category() {
			$category_ids = get_frontend_settings_value('New Product Category');

			$categories = Category::select('*')
				->whereIn('categories.id',$category_ids)
				->get();
			// dd($categories);
			return $categories;
		}
	}

	if (!function_exists('get_all_new_products_by_category_id')) {
		function get_all_new_products_by_category_id($category_id) {
			$new_products = Product::select('products.*','categories.name as category_name','uploads.file_name as image_path')
				->leftJoin('categories','categories.id','=','products.category_id')
				->leftJoin('uploads','uploads.id','=','products.thumbnail_img')
				->where('products.category_id','=',$category_id)
				->where('products.new_collection','=',1)
				->skip(0)
				->take(8)
				->get();
			return $new_products;
		}
	}

	if (!function_exists('get_company_logo')) {
		function get_company_logo() {
			$logo_image_path = '';
			$all_logos = get_frontend_settings_value('Logo');

			foreach ($all_logos as $logo) {
				if ($logo['status'] == 1) {
					$logo_image_path = $logo['image_path'];
					break;
				}
			}

			// dd($logo_image_path);
			return $logo_image_path;
		}
	}