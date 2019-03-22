<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Model\Setting;


class Settings extends Controller
{
    public function settings(){
        return view('admin.setting')->with('title',trans('admin.settings'));
    }
    
    public function save_settings(){
        $this->validate(request(),['logo'=>v_image()],
        [],['logo'=>trans('admin.logo')]);
 //$data = request()->except(['token','_method']);
 if (request()->hasFile('logo')){

 $data['logo']= up()->Upload([
    // 'new_name' =>'',
     'file'=>'logo',
     'path'=>'setting',
     'upload_type' =>'single',
     'delete_file'=>setting()->logo,

 ]);
 
 
 }
 Setting::orderBy('id','desc')->update($data);

return redirect (aurl('setting'));



    }

}
