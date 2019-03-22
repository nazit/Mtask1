<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "news";
    protected $fillable = [
        'title','cat_id','content','photo','image',
    ];
    public function cat_id(){
        return $this->hasOne('App\Model\category','id' ,'cat_id');
    }
    
}
