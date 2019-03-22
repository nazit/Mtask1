<?php

namespace App\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    use Notifiable;
    
    protected $table = "categories";
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
