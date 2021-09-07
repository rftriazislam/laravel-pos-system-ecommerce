<?php
	use App\product;
	use App\Upload;

    if (!function_exists('get_all_product_info_by_category_id')) {
        function get_all_product_info_by_category_id($category_id) {
	        $products = Product::select('products.*','uploads.file_name as image_path')
	            ->leftJoin('uploads','uploads.id','=','products.thumbnail_img')
	            ->where('products.category_id',$category_id)
	            ->get();
	        return $products;
        }
    }

    if (!function_exists('get_product_info_by_product_id')) {
    	function get_product_info_by_product_id($product_id) {
    		$product_info = Product::select('products.*','uploads.file_name as image_path')
    			->leftJoin('uploads','uploads.id','=','products.thumbnail_img')
    			->where('products.id','=',$product_id)
    			->first();
    		return $product_info;
    	}
    }

    if (!function_exists('get_product_all_images_by_image_ids')) {
    	function get_product_all_images_by_image_ids($image_ids) {
    		$ids = explode(',',$image_ids);
    		$images = Upload::select('*')
    			->whereIn('id',$ids)
    			->get();
    		return $images;
    	}
    }

    if (!function_exists('get_all_related_products')) {
    	function get_all_related_products($related_product_ids) {
    		$ids = explode(',',$related_product_ids);
    		$related_products = Product::select('products.*','categories.name as category_name','uploads.file_name as image_path')
    			->leftJoin('categories','categories.id','=','products.category_id')
    			->leftJoin('uploads','uploads.id','=','products.thumbnail_img')
    			->whereIn('products.id',$ids)
    			->get();
    		return $related_products;
    	}
    }