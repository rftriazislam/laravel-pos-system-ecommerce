<?php
    use App\Category;
    use App\Product;
    use App\Upload;

    if (!function_exists('get_categories_by_parent_id')) {
        function get_categories_by_parent_id($parent_id = 0) {
            $categories = Category::select('*')
                ->where('parent_id','=',$parent_id)
                ->where('menu_visibility','=',1)
                ->orderBy('order_level','asc')
                ->get();
            return $categories;
        }
    }

    if (!function_exists('get_all_parent_categories')) {
        function get_all_parent_categories() {
            $parent_categories = Category::select('*')
                ->where('parent_id','=',0)
                ->where('menu_visibility','=',1)
                ->orderBy('order_level','asc')
                ->skip(0)
                ->take(3)
                ->get();
            return $parent_categories;
        }
    }

    if (!function_exists('get_all_products_for_menu_by_category_id')) {
        function get_all_products_for_menu_by_category_id($category_id) {
            $products = Product::select('products.*','categories.name as category_name','uploads.file_name as image_path')
                ->leftJoin('categories','categories.id','=','products.category_id')
                ->leftJoin('uploads','uploads.id','=','products.thumbnail_img')
                ->where('products.category_id','=',$category_id)
                ->where('products.menu_visibility','=',1)
                ->skip(0)
                ->take(3)
                ->get();
            return $products;
        }
    }
