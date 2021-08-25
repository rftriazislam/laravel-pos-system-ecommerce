<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DropdownItem;
use DB;

class DropdownItemController extends Controller
{
    public function index(Request $request) {
        $dropdown_item_list = DropdownItem::get();

        return view('backend.inventory.dropdown_item.index', compact('dropdown_item_list'));
    }

    public function save(Request $request) {
        // dd($request->all());
        DropdownItem::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect(route('dropdown_item.index'))->with('msg','Dropdown Item Added Successfully');
    }

    public function get_dropdown_item_info(Request $request) {
        if ($request->ajax()) {
            $dropdown_item_info = DropdownItem::where('id',$request->id)->first();
            return response()->json(['dropdown_item_info'=>$dropdown_item_info]);
        } 
    }

    public function update(Request $request) {
        $dropdown_item = DropdownItem::find($request->dropdown_item_id);

        $dropdown_item->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect(route('dropdown_item.index'))->with('msg','Dropdown Item Updated Successfully');
    }

    public function delete($id) {
        DropdownItem::where('id',$id)->delete();

        return redirect(route('dropdown_item.index'))->with('msg','Dropdown Item Deleted Successfully');
    }

    public function view($id) {
        $dropdown_item_info = DropdownItem::find($id);
        $dropdown_item_values = array();
        if ($dropdown_item_info->value) {
            $dropdown_item_values = json_decode($dropdown_item_info->value)->values;
        }

        return view('backend.inventory.dropdown_item.view', compact('dropdown_item_info','dropdown_item_values'));
    }

    public function save_item_value(Request $request) {
        $value_name = $request->name;
        $id = $request->dropdown_item_id;

        $dropdown_item_info = DropdownItem::find($id);
        $json_dropdown_item_value = '';

        if ($dropdown_item_info->value) {
            $dropdown_item_values = json_decode($dropdown_item_info->value);
            array_push($dropdown_item_values->values, $value_name);
            $json_dropdown_item_value = json_encode($dropdown_item_values);
        } else {
            $json_dropdown_item_value = '{"values":["'.$value_name.'"]}';
        }


        $dropdown_item_info->update([
            'value' => $json_dropdown_item_value,
        ]);

        return redirect(route('dropdown_item.view',$id))->with('msg','Dropdown Item Value Added Successfully');
    }

    public function update_item_value(Request $request) {
        $value_name = $request->name;
        $id = $request->dropdown_item_id;
        $index = $request->value_index;

        $dropdown_item_info = DropdownItem::find($id);
        $dropdown_item_values = json_decode($dropdown_item_info->value);
        $dropdown_item_values->values[$index] = $value_name;
        $json_dropdown_item_value = json_encode($dropdown_item_values);
        // echo "<pre>"; print_r($json_dropdown_item_value); exit();

        $dropdown_item_info->update([
            'value' => $json_dropdown_item_value,
        ]);

        return redirect(route('dropdown_item.view',$id))->with('msg','Dropdown Item Value Updated Successfully');
    }

    public function delete_item_value($id,$index) {
        $dropdown_item_info = DropdownItem::find($id);
        $dropdown_item_values = json_decode($dropdown_item_info->value);
        unset($dropdown_item_values->values[$index]);
        $json_dropdown_item_value = json_encode($dropdown_item_values);
        // echo "<pre>"; print_r($json_dropdown_item_value); exit();

        $dropdown_item_info->update([
            'value' => $json_dropdown_item_value,
        ]);

        return redirect(route('dropdown_item.view',$id))->with('msg','Dropdown Item Value Updated Successfully');
    }
}
