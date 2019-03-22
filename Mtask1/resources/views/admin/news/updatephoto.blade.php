<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css"/>
<script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover= false;
$(document).ready(fnction(){
        
$("#dropzonefileupload").dropzone({
        url: "{{aurl('/upload/image/'.$news->id)}}",
        paramName : 'file',
        uploadMultiple:false,
        maxFiles:15,
        maxFilessize:3,
        acceptedFiles:'image/*',
        DICTDefaultMassege:'drag and drop files here',
        DICTRemoveFile:'{{trans('admin.delete')}}',

params:{
        _token:'{{csrf_token()}}'

},
addRemoveLinks:true,
removedfile:fnction(file){
        alert(file.fid);
        $.ajax({
                dataType:'json',
                type:'post',
                url: '{{aurl('delete/image')}}',
                data:{_token:'{{csrf_token()}}',id:$fid->id }
        });
        var fmock;
        return (fmock=file.previewElement)!= null? fmock.parentNode.removeChild(file.previewElement):void 0;

}
init:function(){
        @foreach($news->files()->get() as $file)
        var mock={name:'{{$file->name}}',fid:'{{$fid->id}}',size:'{{$file->size}}',type:'{{$file->mime_type}}'};

       this.emit('addedfile','mock');
       this.options.thumbnail.call(this,mock,'{{url('storage/'.$file->full_path)}}');
        @endforeach
        this.on('sending',function(file,xhr,formdata){
                formData.append('fid','');
                file.fid='';
        });
        this.on('success',function(){
                file.fid = respons.id;
        })
}
});
//////////

$("#main_photo").dropzone({
        url: "{{aurl('update/image/'.$news->id)}}",
        paramName : 'file',
        uploadMultiple:false,
        maxFiles:1,
        maxFilessize:3,
        acceptedFiles:'image/*',
        DICTDefaultMassege:'{{trans('admin.main_photo')}}',
        DICTRemoveFile:'{{trans('admin.delete')}}',

params:{
        _token:'{{csrf_token()}}'

},
addRemoveLinks:true,
removedfile:fnction(file){
        alert(file.fid);
        $.ajax({
                dataType:'json',
                type:'post',
                url: '{{aurl('delete/news/image/'.$news->id)}}',
                data:{_token:'{{csrf_token()}}' }
        });
        var fmock;
        return (fmock=file.previewElement)!= null? fmock.parentNode.removeChild(file.previewElement):void 0;

}
init:function(){
        @if(!empty($news->photo))
        var mock={name:'{{$news->title}}',size:'',type:''};

       this.emit('addedfile','mock');
       this.options.thumbnail.call(this,mock,'{{url('storage/'.$news->photo)}}');
        @endif
        this.on('sending',function(file,xhr,formdata){
                formData.append('fid','');
                file.fid='';
        });
        this.on('success',function(){
                file.fid = respons.id;
        })
}
});
});
</script>
@endpush

<div id="main_news" class="news">
        <h3>{{trans('admin.main_photo')}}</h3>
        <div class="dropzone",id="main_photo">
        </div>
        <h3>{{trans('admin.main_news')}}</h3>
        <div class="dropzone" id="dropzonefileupload">

        </div>
        


</div>