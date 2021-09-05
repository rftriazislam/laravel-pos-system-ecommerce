<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function all_product($category_id) {
        $products = Product::where('category_id',$category_id)->get();
        $category = Category::find($category_id);
        $colors_info = get_all_product_colors($products);

        return view('frontend.products.grid_view',compact('category_id','category','products','colors_info'));
    }

    public function list_all_product($category_id) {
        $products = Product::where('category_id',$category_id)->get();
        $category = Category::find($category_id);

        return view('frontend.products.list_view',compact('category_id','category','products'));
    }

    public function product_quick_view(Request $request) {
        $product_info = json_decode($request->product_info,true);
        $category_info = json_decode($request->category_info,true);
        // dd($category_info);

        $output = view('frontend.products.product_quickview',compact('category_info','product_info'))->render();

        return response()->json(['output'=>$output]);
    }

    public function product_details($product_id) {
        $product = Product::find($product_id);
        $category = Category::find($product->category_id);
        $next_product_id = Product::where('category_id',$product->category_id)
            ->where('id','>',$product_id)
            ->min('id');

        $previous_product_id = Product::where('category_id',$product->category_id)
            ->where('id','<',$product_id)
            ->max('id');

        return view('frontend.products.product_details',compact('category','product','previous_product_id','next_product_id'));
    }

    public function contact() {
        return view('frontend.contact.index');
    }
}
