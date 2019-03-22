<?php

namespace App\Http\Controllers\Admin;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDatatable;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDatatable $datatable)
    {
        return $datatable->render('admin.categories.index') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
           
        ],[],[
            'name'=>trans('admin.cat_name'),
            
        ]);
       
        Category::create($data);
        session()->flash('added',trans('admin.record_added'));
        return redirect(aurl('category'));
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
        $category = Category::find($id);
       //$id = $admin->id;
        return view('admin.categories.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $title = trans('admin.edit_admin');
        return view('admin.categories.edit')->with(['category'=>$category ,'title'=>$title]);
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
            
        ],[],[
            'name'=>trans('admin.name'),
            
        ]);
       
        Category::where('id',$id)->update($data);
        session()->flash('added',trans('admin.record_updated'));
        return redirect(aurl('category'));
    }

    
    public function destroy($id)
    {
        //
        Category::find($id)->delete();
        //session()->flash('deleted',trans('admin.records_delete'));
       // return redirect(aurl('admin'));
       return back();
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            Category::destroy(request('item'));
    }else{
        Category::find(request('item'))->delete();
    }
    //session()->flash('deleted',trans('admin.records_delete'));
      //  return redirect(aurl('admin'));
      return back();
}
}
