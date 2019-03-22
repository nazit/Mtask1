@extends('admin.index')
@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin.show_admin')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                {!! Form::open([]) !!}
                <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',old('name'),['class'=>"form-control"]) !!}
                
                </div>  
                <div class="form-group">
                        {!! Form::label('email',trans('admin.email')) !!}
                        {!! Form::email('email',old('email'),['class'=>"form-control"]) !!}
                        
                </div>  
                <div class="form-group">
                                {!! Form::label('password',trans('admin.password')) !!}
                                {!! Form::password('password',['class'=>"form-control"]) !!}
                                
                </div>  
               
                {!! Form::close() !!}
              
          
        </div>
        <!-- /.box-body -->
</div>
@endsection