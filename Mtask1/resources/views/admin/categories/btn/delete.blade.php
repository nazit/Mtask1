
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_admin{{$id}}">
  <i class="fa fa-trash"></i>
   </button>
<div id="del_admin{{$id}}"class="modal" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title"><{{trans('admin.delete')}}</h5>
           <button type="button" class=" btn btn-danger " data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         {!! Form::open(['route' => ['category.destroy',$id],'method'=>'delete']) !!}
         <div class="modal-body">
           <p> {{trans('admin.delete_this')}}</p>
         </div>
         <div class="modal-footer">
                 {!!Form::submit(trans('admin.yes'),['class'=>'btn btn-danger'])!!}
                 <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('admin.close')}}</button>
                 
                 {!! Form::close() !!}
           
          
         </div>
       </div>
     </div>
   </div>