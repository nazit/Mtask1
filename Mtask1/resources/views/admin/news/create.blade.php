@extends('admin.index')
@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Create News</h3>
    </div>
   
    <!-- /.box-header -->
    <div class="box-body">
       
        {!! Form::open(['url' => aurl('news')]) !!}
        <div class="form-group">
         {!! Form::label('title', trans('admin.title'))!!}
         {!! Form::text('title', old('title'),['class'=>'form-control'])!!} 
        </div>
        <div class="form-group">
          {!! Form::label('content', trans('admin.content'))!!}
          {!! Form::textarea('content', old('content'),['class'=>'form-control  ckeditor','id'=>'summary-ckeditor'])!!} 
         </div>

        <div class="form-group">
        {!! Form::label('cat_id', trans('admin.cat_id'))!!}
        {!! Form::select('cat_id',App\Model\Category::pluck('name',
        'id'), old('cat_id'),['class'=>'form-control'])!!}
        </div>

       

        {!!Form::submit(trans('admin.create_News'),['class'=>'btn btn-primary'])!!}
       {!! Form::close() !!}
        
    </div>
    <!-- /.box-body -->
  </div>
  <!-- Trigger the modal with a button -->

  @push('js')
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
      CKEDITOR.replace( 'summary-ckeditor' );
  </script>

  @endpush
 
@endsection