


<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-trash"></i>
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{trans('admin.delete_record')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!!Form::open(['route'=>['news.destroy',$id],'method'=>'delete'])!!}
            <div class="modal-body">
                    <h4>{{trans('admin.delete_this',['admin'=>$name])}}</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">{{trans('admin.close')}}</button>
              {!!Form::submit(trans('admin.yes'),['class'=>"btn btn-info"])!!}
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>