<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawMaterialsType;
use DB;

class RawMaterialsTypeController extends Controller
{
    public function index(Request $request) {
        $raw_material_type_list = RawMaterialsType::get();
        // dd($dropdown_item_list);

        return view('backend.inventory.raw_material_type.index', compact('raw_material_type_list'));
    }

    public function save(Request $request) {
        RawMaterialsType::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect(route('raw_materials_type.index'))->with('msg','Raw Materials Type Added Successfully');
    }

    public function get_raw_materials_type_info(Request $request) {
        if ($request->ajax()) {
            $raw_material_type_info = RawMaterialsType::find($request->id);
            return response()->json(['raw_material_type_info'=>$raw_material_type_info]);
        } 
    }

    public function update(Request $request) {
        $raw_material_type = RawMaterialsType::find($request->raw_material_type_id);

        $raw_material_type->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect(route('raw_materials_type.index'))->with('msg','Raw Materials Type Updated Successfully');
    }

    public function delete($id) {
        RawMaterialsType::where('id',$id)->delete();

        return redirect(route('raw_materials_type.index'))->with('msg','Raw Materials Type Deleted Successfully');
    }

    public function view($id) {
        $raw_materials_type_info = RawMaterialsType::find($id);
        $raw_material_type_attributes = array();
        if ($raw_materials_type_info->value) {
            $raw_material_type_attributes = json_decode($raw_materials_type_info->value)->attributes;
        }

        return view('backend.inventory.raw_material_type.view', compact('raw_materials_type_info','raw_material_type_attributes'));
    }

    public function save_attribute(Request $request) {
        $value_name = $request->name;
        $id = $request->attribute_id;

        $raw_material_type = RawMaterialsType::find($id);
        $json_raw_material_type_attribute = '';

        if ($raw_material_type->value) {
            $raw_material_type_attributes = json_decode($raw_material_type->value);
            array_push($raw_material_type_attributes->attributes, $value_name);
            $json_raw_material_type_attribute = json_encode($raw_material_type_attributes);
        } else {
            $json_raw_material_type_attribute = '{"attributes":["'.$value_name.'"]}';
        }

        // dd($json_raw_material_type_attribute);

        $raw_material_type->update([
            'value' => $json_raw_material_type_attribute,
        ]);

        return redirect(route('raw_materials_type.view',$id))->with('msg','Raw Material Attribute Added Successfully');
    }

    public function update_attribute(Request $request) {
        $value_name = $request->name;
        $id = $request->attribute_id;
        $index = $request->attribute_index;

        $raw_material_type = RawMaterialsType::find($id);
        $raw_material_type_attributes = json_decode($raw_material_type->value);
        $raw_material_type_attributes->attributes[$index] = $value_name;
        $json_raw_material_type_attribute = json_encode($raw_material_type_attributes);
        // dd($json_raw_material_type_attribute);

        $raw_material_type->update([
            'value' => $json_raw_material_type_attribute,
        ]);

        return redirect(route('raw_materials_type.view',$id))->with('msg','Raw Material Attribute Added Successfully');
    }

    public function delete_attribute($id,$index) {
        $raw_material_type = RawMaterialsType::find($id);
        $raw_material_type_attributes = json_decode($raw_material_type->value);
        unset($raw_material_type_attributes->attributes[$index]);
        $json_raw_material_type_attribute = json_encode($raw_material_type_attributes);
        // dd($json_raw_material_type_attribute);

        $raw_material_type->update([
            'value' => $json_raw_material_type_attribute,
        ]);

        return redirect(route('raw_materials_type.view',$id))->with('msg','Raw Material Attribute Added Successfully');
    }
}
