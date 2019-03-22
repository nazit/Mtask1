@extends('admin.index')
@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">{{trans('admin.admin_control')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                {!! Form::open(['id'=>'form_data','url' =>aurl('category/destroy/all')]) !!}
                {!! Form::hidden('_method','delete') !!}
                {!!$dataTable->table([
                                'class'=>"table table-bordered table-hover table-stripped"
                            ],true)!!}
                     
                        
                {!! Form::close() !!}
              
          
        </div>
        <!-- /.box-body -->
</div>
<div class="modal" id="multidelet" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">{{trans('admin.delete')}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="alert alert-danger ">
                              <div class="empty_record hidden">
                 <h3>{{trans('admin.pleas_check_some_record')}}</h3>
                              </div>
                              <div class="not_empty_record hidden">
                 <h3>{{trans('admin.ask_for_records')}}?<span class="record_count"></span></h3>
                      </div>
                </div>
                    </div>
                    
                    <div class="modal-footer">
                                <div class="empty_record hidden">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
                        </div> 
                </div>
                        <div class="not_empty_record hidden">         
                      <button type="button" class="btn btn-primary">{{trans('admin.no')}}</button>
                               
                      <input type="submit" class="btn btn-danger del_all"  value={{trans('admin.yes')}}>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
@push('js')
<script>
      del_all();
</script>
{!!$dataTable->scripts()!!}
@endpush

@endsection

