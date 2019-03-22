<?php

namespace App\Http\Controllers\Admin;
use App\Model\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\NewsDatatable;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsDatatable $datatable)
    {
        return $datatable->render('admin.news.index') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.news.create');
    }

    public function update_news_image($id){

       $news= News::where('id',$id)->update([
           'photo'=>up()->Upload([
                // 'new_name' =>'',
                 'file'=>'file',
                 'path'=>'news/'.$id,
                 'upload_type' =>'single',
                
                 'delete_file'=>'',
                
             ]),

            
        ]);
        return response(['status'=>true],200);
    }
    public function delete_main_image($id){
        $news= News::find($id);
        Storage::delete($news->photo);
        $news->photo = null;
        $news->save();
         
         return response(['status'=>true],200);
    }
    public function store()
    {
        $data = $this->validate(request(),[
            'title'=>'required',
            'content'=>'required',
            'photo'=>v_image(),
            'cat_id'=>'required|numeric',
            'image'=>v_image(),
           
        ],[],[
            'title'=>trans('admin.news_title'),
            'content'=>trans('admin.news_content'),
            'photo'=>trans('admin.main_news_photo'),
            'cat_id'=>trans('admin.categories_name'),
            'image'=>trans('admin.news_images')
        ]);
      
        News::create($data);
        session()->flash('added',trans('admin.record_added'));
        return redirect(aurl('admin'));
    }
    public function upload_files($id){
        if(request()->hasFile('file')){
             up()->Upload([
                // 'new_name' =>'',
                 'file'=>'file',
                 'path'=>'news/'.$id,
                 'upload_type' =>'files',
                 'file_type'=>'news',
                 'delete_file'=>setting()->logo,
                 'relation_id'=>$id,
            
             ]);
             return response(['status'=>true,'id'=>$fid],200);
        }
       
         
        
    }
    public function delete_file(){
        if(request()->has('id')){
         up()->delete(request('id'));
        }

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
        $news = News::find($id);
       //$id = $admin->id;
        return view('admin.news.show')->with('news',$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $title = trans('admin.edit_admin');
        return view('admin.news.edit')->with(['news'=>$news ,'title'=>$title]);
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
            'title'=>'required',
            'content'=>'required',
            'photo'=>v_image(),
            'cat_id'=>'required|numeric',
            'image'=>v_image(),
           
        ],[],[
            'title'=>trans('admin.news_title'),
            'content'=>trans('admin.news_content'),
            'photo'=>trans('admin.main_news_photo'),
            'cat_id'=>trans('admin.categories_name'),
            'image'=>trans('admin.news_images')
        ]);
      
        News::where('id',$id)->update($data);
        session()->flash('added',trans('admin.record_updated'));
        return redirect(aurl('news'));
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
        News::find($id)->delete();
        //session()->flash('deleted',trans('admin.records_delete'));
       // return redirect(aurl('admin'));
       return back();
    }

    public function multi_delete(){
        if(is_array(request('item'))){
            News::destroy(request('item'));
    }else{
        News::find(request('item'))->delete();
    }
    //session()->flash('deleted',trans('admin.records_delete'));
      //  return redirect(aurl('admin'));
      return back();
}
}
