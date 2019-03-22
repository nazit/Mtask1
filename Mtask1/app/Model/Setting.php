<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    protected $table = "settings";
    protected $fillable = [
        'site_name', 'email', 'site_desc','site_keywords','mentanence','logo','status'
    ];

   
}
