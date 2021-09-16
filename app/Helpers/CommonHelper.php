<?php
	use App\Category;
	use App\product;
	use App\Upload;

	if (!function_exists('get_category_info_by_id')) {
	    function get_category_info_by_id($category_id) {
	        $category = Category::find($category_id);
	        return $category;
	    }
	}

	if (!function_exists('upload_image')) {
	    function upload_image($file,$directory = null,$width = null,$height = null) {        
	        $data = getimagesize($file);
	        $filename = rand().'-'.$file->getClientOriginalName(); 
	        $name = pathinfo($filename, PATHINFO_FILENAME);
	        $logo_extension = $file->getClientOriginalExtension();

	        if (!file_exists($directory)) {
	            mkdir($directory);
	        }

	        $image_path = $directory.($name.'.'.$logo_extension);

	        if (@$width == null && @$height == null) {
	            move_uploaded_file($file, "$directory$name".'.'."$logo_extension");
	        }

	        if (@$width != null && @$height != null) {
	            Image::make($file)->resize($width, $height)->save($image_path);
	        }

	        return $image_path;
	    }
	}