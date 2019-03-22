@extends('admin.index')
@section('content')
<div class="box">
        <div class="box-header">
                        <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                
                        
                {!! Form::open(['url' =>aurl('category/'.$category->id),'method'=>'put']) !!}
                <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',$category->name,['class'=>"form-control"]) !!}
                
                </div>  
                
                {!! Form::submit(trans('admin.save_change',['class'=>"btn btn-primary"])) !!}
                {!! Form::close() !!}
              
          
        </div>
        <!-- /.box-body -->
</div>
@endsection