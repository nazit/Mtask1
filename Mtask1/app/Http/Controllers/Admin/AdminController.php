<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $datatable)
    {
        return $datatable->render('admin.admins.index') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'min:6|required'
        ],[],[
            'name'=>trans('admin.name'),
            'emai'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        $data['password']= bcrypt(request('password'));
        Admin::create($data);
        session()->flash('added',trans('admin.record_added'));
        return redirect(aurl('admin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = Admin::find($id);
       //$id = $admin->id;
        return view('admin.admins.show')->with('admin',$admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $title = trans('admin.edit_admin');
        return view('admin.admins.edit')->with(['admin'=>$admin ,'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'min:6|required'
        ],[],[
            'name'=>trans('admin.name'),
            'emai'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        if(request()->has('password')){
$data['password']=bcrypt((request('password')));
        } 
        Admin::where('id',$id)->update($data);
        session()->flash('added',trans('admin.record_updated'));
        return redirect(aurl('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admin::find($id)->delete();
        //session()->flash('deleted',trans('admin.records_delete'));
       // return redirect(aurl('admin'));
       return back();
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            Admin::destroy(request('item'));
    }else{
        Admin::find(request('item'))->delete();
    }
    //session()->flash('deleted',trans('admin.records_delete'));
      //  return redirect(aurl('admin'));
      return back();
}
}
