<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DropdownItem extends Model
{
    protected $table = "dropdown_items";

    protected $fillable = [
        'id','name','value','status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
