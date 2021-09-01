<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterialsType extends Model
{
    protected $table = "raw_materials_types";

    protected $fillable = [
        'id','name','value','status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
