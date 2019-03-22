function check_all(){
$('input[class="item_checkbox"]:checkbox').each(function(){
  if($('input[class="check_all"]:checkbox:checked').length == 0){
    $(this).prop('checked',false);
  }else{
    $(this).prop('checked',true);
  }
});
} 

function del_all(){
  $(document).on('click','.del_all',function(){
    $('#form_data').submit();
  });


  $(document).on('click','.delbtn',function(){
   
    var checked_count = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;
if(checked_count>0){
  $('.not_empty_record').removeClass('hidden');
  $('.record_count').text(checked_count);
  $('.empty_record').addClass('hidden');
}else{
  $('.record_count').text('');
  $('.not_empty_record').addClass('hidden');
  $('.empty_record').removeClass('hidden');
}

    $('#multidelet').modal('show');
  });
  

  
}