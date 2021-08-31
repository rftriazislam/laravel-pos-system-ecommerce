<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterials extends Model
{
    protected $table = "raw_materials";

    protected $fillable = [
        'id','raw_material_type_id','shipment_date','name','cost','value','status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
