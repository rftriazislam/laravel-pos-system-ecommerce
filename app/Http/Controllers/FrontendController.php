<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function all_product($category_id) {
        $products = get_all_product_info_by_category_id($category_id);
        $category = Category::find($category_id);
        $colors_info = get_all_product_colors($products);

        return view('frontend.flatize.products.grid_view',compact('category_id','category','products','colors_info'));
    }

    public function list_all_product($category_id) {
        $products = get_all_product_info_by_category_id($category_id);
        $category = Category::find($category_id);
        $colors_info = get_all_product_colors($products);

        return view('frontend.flatize.products.list_view',compact('category_id','category','products','colors_info'));
    }

    public function product_quick_view(Request $request) {
        $product_info = json_decode($request->product_info,true);
        $category_info = json_decode($request->category_info,true);
        $product_info['images'] = get_product_all_images_by_image_ids($product_info['photos']);
        // dd($product_info);

        $output = view('frontend.flatize.products.product_quickview',compact('category_info','product_info'))->render();

        return response()->json(['output'=>$output]);
    }

    public function product_details($product_id) {
        $product = get_product_info_by_product_id($product_id);
        $category = Category::find($product->category_id);
        $product->images = get_product_all_images_by_image_ids($product->photos);
        $related_products = get_all_related_products($product->related_product_ids);

        $next_product_id = Product::where('category_id',$product->category_id)
            ->where('id','>',$product_id)
            ->min('id');

        $previous_product_id = Product::where('category_id',$product->category_id)
            ->where('id','<',$product_id)
            ->max('id');

        return view('frontend.flatize.products.product_details',compact('category','product','related_products','previous_product_id','next_product_id'));
    }

    public function contact() {
        return view('frontend.flatize.contact.index');
    }

    public function add_item_to_cart(Request $request) {
        $product_id = $request->product_id;
        $qty = $request->cart_qty;
        $product = get_product_info_by_product_id($product_id);
        $category = Category::find($product->category_id);
        $user_id = 9;

        if (empty($qty)) {
            $qty = 1;
        }

        \Cart::session($user_id)->add(array(
            'id' => rand(), // inique row ID
            'name' => $product->name,
            'price' => $product->unit_price,
            'quantity' => $qty,
            'attributes' => array(
                'product_id' => $product->id,
                'category_id' => $category->id,
                'category_name' => $category->name,
                'image_path' => $product->image_path,
            ),
        ));

        $cart_contents = \Cart::session($user_id)->getContent();
        $total_items = $cart_contents->count();
        $subtotal = \Cart::session($user_id)->getSubTotal();
        $is_cart_empty = \Cart::session($user_id)->isEmpty();
        $recently_added_items = view('frontend.flatize.cart.recently_added_items',compact('cart_contents','subtotal','is_cart_empty'))->render();

        return response()->json(['recently_added_items'=>$recently_added_items,'total_items'=>$total_items,'is_cart_empty'=>$is_cart_empty]);
    }

    public function update_cart_item(Request $request) {
        $item_id = $request->item_id;
        $qty = $request->qty;
        $user_id = 9;

        \Cart::session($user_id)->update($item_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $qty,
            ),
        ));

        $cart_contents = \Cart::session($user_id)->getContent();
        $total_items = $cart_contents->count();
        $subtotal = \Cart::session($user_id)->getSubTotal();
        $is_cart_empty = \Cart::session($user_id)->isEmpty();
        $total = \Cart::session($user_id)->getTotal();

        $cart_table = view('frontend.flatize.cart.cart_table',compact('cart_contents','subtotal','total'))->render();
        $shopping_bag_summary = view('frontend.flatize.cart.shopping_bag_summary',compact('subtotal','total'))->render();
        $recently_added_items = view('frontend.flatize.cart.recently_added_items',compact('cart_contents','subtotal','is_cart_empty'))->render();

        return response()->json(['cart_table'=>$cart_table,'shopping_bag_summary'=>$shopping_bag_summary,'recently_added_items'=>$recently_added_items,'total_items'=>$total_items,'is_cart_empty'=>$is_cart_empty]);
    }

    public function remove_item_from_cart(Request $request) {
        $item_id = $request->item_id;
        $user_id = 9;
        \Cart::session($user_id)->remove($item_id);

        $cart_contents = \Cart::session($user_id)->getContent();
        $total_items = $cart_contents->count();
        $subtotal = \Cart::session($user_id)->getSubTotal();
        $is_cart_empty = \Cart::session($user_id)->isEmpty();
        $total = \Cart::session($user_id)->getTotal();

        $cart_table = view('frontend.flatize.cart.cart_table',compact('cart_contents','subtotal','total'))->render();
        $shopping_bag_summary = view('frontend.flatize.cart.shopping_bag_summary',compact('subtotal','total'))->render();
        $recently_added_items = view('frontend.flatize.cart.recently_added_items',compact('cart_contents','subtotal','is_cart_empty'))->render();

        return response()->json(['cart_table'=>$cart_table,'shopping_bag_summary'=>$shopping_bag_summary,'recently_added_items'=>$recently_added_items,'total_items'=>$total_items,'is_cart_empty'=>$is_cart_empty]);
    }

    public function view_cart() {
        $user_id = 9;
        $cart_contents = \Cart::session($user_id)->getContent();
        $subtotal = \Cart::session($user_id)->getSubTotal();
        $total = \Cart::session($user_id)->getTotal();
        return view('frontend.flatize.cart.view_cart',compact('cart_contents','subtotal','total'));
    }

    public function checkout() {
        return view('frontend.flatize.cart.checkout');
    }
}
