<?php
    use App\Category;

    if (!function_exists('get_categories_by_parent_id')) {
        function get_categories_by_parent_id($parent_id = 0) {
            $categories = Category::select('*')
                ->where('parent_id','=',$parent_id)
                ->get();
            return $categories;
        }
    }
