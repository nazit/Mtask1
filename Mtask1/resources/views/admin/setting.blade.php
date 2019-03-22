@extends('admin.index')
@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin.settings')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        {!! Form::open(['url' =>aurl('setting'),'files'=>true]) !!}

        <div class="form-group">
        {!! Form::label('site_name',trans('admin.site_name')) !!}
        {!! Form::text('site_name',setting()->site_name,['class'=>"form-control"]) !!}

        </div>  
        <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',setting()->email,['class'=>"form-control"]) !!}
                
        </div>  
        <div class="form-group">
        {!! Form::label('site_desc',trans('admin.site_desc')) !!}
        {!! Form::textarea('site_desc',setting()->site_desc,['class'=>"form-control"]) !!}
        
        </div>  
        <div class="form-group">
        {!! Form::label('site_keywords',trans('admin.site_keywords')) !!}
        {!! Form::textarea('site_keywords',setting()->site_keywords,['class'=>"form-control"]) !!}
        
        </div>  
        <div class="form-group">
        {!! Form::label('status',trans('admin.status')) !!}
        {!! Form::select('status',['disable'=>trans('admin.disable'),'enable'=>trans('admin.enable')],setting()->status,['class'=>"form-control"]) !!}
        
        </div> 
       
        <div class="form-group">
        {!! Form::label('logo',trans('admin.logo')) !!}
        {!! Form::file('logo',['class'=>"form-control"]) !!}
        @if (!empty(setting()->logo))
        <img src="{{Storage::url(setting()->logo)}}" style="width:32px;hieght:32px"/>
        @endif
        </div>  
        <div class="form-group">
        {!! Form::label('mentanence',trans('admin.mentanence')) !!}
        {!! Form::textarea('mentanence',setting()->mentanence,['class'=>"form-control"]) !!}
        
        </div>   
                {!! Form::submit(trans('admin.save_settings',['class'=>"btn btn-primary"])) !!}
                {!! Form::close() !!}
              
          
        </div>
        <!-- /.box-body -->
</div>
@endsection