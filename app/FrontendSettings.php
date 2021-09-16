<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendSettings extends Model
{
    protected $table = "frontend_settings";

    protected $fillable = [
        'id','name','value','status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
