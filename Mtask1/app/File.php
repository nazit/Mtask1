<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = "files";
    protected $fillable = ['id'  ,'name'   ,'size',   'file',  
      'path'   ,'mime_type'  ,'full_path',   'file_type'   ,'relation_id',]
}
