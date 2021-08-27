<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawMaterials;
use App\RawMaterialsType;
use DB;

class RawMaterialsController extends Controller
{
    public function index() {
        $raw_materials_list = RawMaterials::select('raw_materials.*','raw_materials_types.name as type_name')
            ->leftJoin('raw_materials_types','raw_materials_types.id','=','raw_materials.raw_material_type_id')
            ->get();
        return view('backend.inventory.raw_material.index', compact('raw_materials_list'));
    }

    public function add() {
        $raw_material_type_list = RawMaterialsType::where('status',1)->get();
        return view('backend.inventory.raw_material.add', compact('raw_material_type_list'));
    }

    public function get_raw_material_attribute_form(Request $request) {
        $type_id = $request->type_id;
        $raw_material_type_info = RawMaterialsType::find($type_id);
        $raw_material_type_attributes = json_decode($raw_material_type_info->value)->attributes;
        $output = view('backend.inventory.raw_material.attributes_form')->with(compact('raw_material_type_attributes'))->render();

        return response()->json(['output'=>$output]);
    }

    public function save(Request $request) {
        $shipment_date = $request->shipment_date;
        $name = $request->name;
        $cost = $request->cost;
        $status = $request->status;
        $material_type_id = $request->material_type;
        $material_type = array();
        $data = array();

        $raw_material_type_info = RawMaterialsType::find($material_type_id);
        if ($raw_material_type_info && $raw_material_type_info->value) {
            $material_type = json_decode($raw_material_type_info->value)->attributes;
        }

        foreach ($material_type as $type) {
            $data[$type] = $request->$type;
        }

        $json_data = json_encode($data);

        RawMaterials::create([
            'raw_material_type_id' => $material_type_id,
            'shipment_date' => $shipment_date,
            'name' => $name,
            'cost' => $cost,
            'value' => $json_data,
            'status' => $status,
        ]);

        return redirect(route('raw_materials.index'))->with('msg','Raw Materials Saved Successfully');
    }

    public function edit($id) {
        $raw_material_type_list = RawMaterialsType::where('status',1)->get();
        $raw_material_info = RawMaterials::find($id);

        $raw_material_attributes = array();
        if ($raw_material_info && $raw_material_info->value) {
            $raw_material_attributes = json_decode($raw_material_info->value);
        }
        // dd($raw_material_info);

        return view('backend.inventory.raw_material.edit', compact('raw_material_type_list','raw_material_info','raw_material_attributes'));
    }

    public function update(Request $request) {
        $id = $request->raw_material_id;
        $shipment_date = $request->shipment_date;
        $name = $request->name;
        $cost = $request->cost;
        $status = $request->status;
        $material_type_id = $request->material_type;
        $material_type = array();
        $data = array();

        $raw_material_type_info = RawMaterialsType::find($material_type_id);
        if ($raw_material_type_info && $raw_material_type_info->value) {
            $material_type = json_decode($raw_material_type_info->value)->attributes;
        }

        foreach ($material_type as $type) {
            $data[$type] = $request->$type;
        }

        $json_data = json_encode($data);

        $raw_material = RawMaterials::find($id);

        $raw_material->update([
            'raw_material_type_id' => $material_type_id,
            'shipment_date' => $shipment_date,
            'name' => $name,
            'cost' => $cost,
            'value' => $json_data,
            'status' => $status,
        ]);

        return redirect(route('raw_materials.index'))->with('msg','Raw Materials Updated Successfully');
    }

    public function delete($id) {
        RawMaterials::where('id',$id)->delete();

        return redirect(route('raw_materials.index'))->with('msg','Raw Materials Deleted Successfully');
    }
}
