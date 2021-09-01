<?php
    function get_categories_by_parent_id($parent_id = 0) {
        $categories = \DB::table('categories')
            ->select('*')
            ->where('parent_id','=',$parent_id)
            ->get();
        return $categories;
    }
