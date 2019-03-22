@extends('admin.index')
@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin.create_admin')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                {!! Form::open(['url' =>aurl('category')]) !!}
                <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',old('name'),['class'=>"form-control"]) !!}
                
                </div>  
               
                {!! Form::submit(trans('admin.create_category',['class'=>"btn btn-primary"])) !!}
                {!! Form::close() !!}
              
          
        </div>
        <!-- /.box-body -->
</div>
@endsection