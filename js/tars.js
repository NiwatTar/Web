
function del_logo(id){
  if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
    $.ajax({
      type:"POST",
      url:"ckAjaxs.php",
      data:{del_logo:id},
      success:function(data){
        alert(data);
        location.reload();
      }
    });
  }
  return false;
}
function use_this_logo(id){
  if(confirm("คุณต้องการใช้รูปภาพนี้เป็นโลโก้หรือไม่")){
    $.ajax({
      type:"POST",
      url:"ckAjaxs.php",
      data:{use_logo:id},
      success:function(data){
        alert(data);
        location.reload();
      }
    });
  }
  return false;
}
//////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////
function del_fileupload(id){
  if(confirm("คุณต้องการลบข้อมูลไฟล์หรือไม่")){
    $.ajax({
      type:"POST",
      url:"ckAjaxs.php",
      data:{del_fileupload:id},
      success:function(data){
        alert(data);
        location.reload();
      }
    });
  }
  return false;
}


