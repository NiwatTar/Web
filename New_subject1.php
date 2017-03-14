<?php
session_start();

if ($_SESSION['ses_id']=='') {
     echo "<script>alert('PLEASE LOGIN')</script>";
     echo "<script>window.location='index'</script>";
 
  } else if ($_SESSION['status']== 3 ) {
    echo "<script>alert('NO PERMISSION')</script>";
    echo "<script>window.location='index'</script>";

  
} else{
}
?>
<!DOCTYPE html>

    <head>
     <?php 
        include("head/head.php");
       
        ?>
        
    
    </head>
    <script >


    
 $(function () {
  $("#text").change(function(){
   
    $.ajax({
      url: "ckAjax.php",
      data: "text=" + $("#text").val(),
      type: "POST",
      
      
      
      success: function(data) 
      { 
        if(data ==true)
        { 
         $("#ok").attr("disabled",false);
              
            $("#mdd").html("<span style='color:green'>หัวข้อการอบรมนี้สามารถสร้างได้</span>");
            }else if (data ==false) {
              
                $("#ok").attr("disabled",true);
               
               
            $("#mdd").html("<span style='color:red'>หัวข้อการอบรมมีอยุ่ในระบบแล้ว</span>");

            }
        }
    
      });
    });
  });    


$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-2').on('click', function(e) {
        $('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-4').on('click', function(e) {
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
    })
    
    $('#activate-step-3').on('click', function(e) {
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
    })
});


</script>

        <body>
        
            
            <div id="wrapper">


<!-- *************************MENU BAR************************** -->
                <?php include("menu/menubar.php"); ?>
<!-- *********************************************************** -->
        <div id="page-wrapper">
            <div class="container-fluid">            
                <div class="row">
                    <div class="col-md-12">                    
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i>แบบทดสอบ
                            </li>
                        </ol>
                    </div>
                </div> 
<!-- ****************start table****** -->


<form class="form-horizontal" method="POST" id="add_exam_form" onsubmit="return add_exam_form();">

<div class="row">
    <div class="col-md-12">
                        <center><h2>เพิ่มหัวข้อทดสอบ</h2></center>
   
        <div class="row form-group ">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active"><a href="#step-1">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">สร้างหัวข้อทดสอบ</p>
                    </a></li>
                    <li class="disabled"><a href="#step-2">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">เลือกผู้ทดสอบ</p>
                    </a></li>
                    <li class="disabled"><a href="#step-3">
                        <h4 class="list-group-item-heading">Step 3</h4>
                        <p class="list-group-item-text">เลือกคำถาม</p>
                    </a></li>
                     
                </ul>
            </div>
        </div>

        <div class="row setup-content" id="step-1">
        <div class="col-md-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>

<!-- <form> -->               
                
    <div class="container col-md-12">
        <div class="row clearfix">
            <div class="col-md-12 column">

            




<!-- *****************************first from********************** -->
          <div class="form-group">
                    <label class="col-md-4 control-label" for="fn">หัวข้อการทดสอบ</label>  
                <div class="col-md-4">
                    <input name="subject" type="text" class="form-control input-md" id="text" required="" >
                    <span id="mdd"></span>
    
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="fn">เกณฑ์การผ่านแบบทดสอบ</label>  
                <div class="col-md-4">
                    <input name="Past" type="text" class="form-control input-md" id="text" required="" >
                    <span id="mdd"></span>
    
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="fn">วันเวลาที่จะทดสอบ</label>  
                <div class="col-md-4">
                   
                    <label >วันที่จะทดสอบ</label>  
                    <input type="text" id="datepicker"  class="form-control input-md" name="date" ><br> <label >เวลาเริ่ม</label>
                    <input type="text" id ="timepicker" class="form-control input-md" name="time_start" ><br> <label >เวลาสิ้นสุด</label>
                    <input type="text"  id ="timepicker1" class="form-control input-md" name="time_end" >

    
                </div>
            </div>




    
            </div>
        </div>
        
    </div>
                
<!-- </form> -->
                
                <button id="activate-step-2" class="btn btn-info btn-md"><i class="fa fa-share fa-2x" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
    });
    </script>


    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 2</h1>
                <div class="text-right"> 
                
                
                <input type="checkbox" id="select_all" > Select all

 





                </div>
                <br>
                <ul class="main">
    




  <div class="row clearfix">
            <div class="col-md-12 column">
                <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr >
                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            ชื่อ-นามสกุล
                        </th>
                        <th class="text-center">
                            แผนก
                        </th>
                        <th class="text-center">
                            ตัวเลือก
                        </th>
                       
                                            
                        
                    </tr>
                </thead>
 <?php 
     include("connect.php");
     $sql ="SELECT
    stwPrefix.stwPrefix_name,stwDepartment.stwDept_name,
    stwUser.stwUser_id,stwUser.stwLastname,stwUser.stwFirstname
    FROM
    stwUser
    INNER JOIN stwPrefix ON stwUser.stwPrefix_id = stwPrefix.stwPrefix_id
    INNER JOIN stwDepartment ON stwUser.stwDept_id = stwDepartment.stwDept_id
    ";
    $res =mysqli_query($conn,$sql);
    $i =1;

  while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){

              
                  
    




    ?>
   




    
                <tbody>


                    <tr id='addr0'>
                    <td>
                        <?php echo $i; ?>
                    </td>
                       <td><?php echo 
                    $row['stwPrefix_name']." ".
                    $row['stwFirstname']." ".
                    $row['stwLastname']; ?>
                           
                       </td>
                    <td>
                        <?php echo $row['stwDept_name']; ?>
                    </td>
                    <td>
                        <input type="checkbox" name="select[]" class="checkbox" value="<?php echo $stwUser_id; ?> ">

                    </td>   
                      
                    </tr>
                    <tr id='addr1'></tr>
                     <?php $i++;}  mysqli_close($conn); ?>
                </tbody>
                </table>
            </div>
        </div>
                
                <button id="activate-step-3" class="btn btn-info btn-md"><i class="fa fa-share fa-2x" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>




    <div class="container">

    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 3</h1>
                
<button type="submit" class="btn btn-primary btn-md">Activate Step 4</button>

                
             
            </div>
        </div>
    </div>


    </div>



    
                        

    </div>            
</div>



















  




</form>





                    
   
            </div>
        </div> 
     </div>                  
                        
                           
   
   
  


 
 
  






    </body>

</html>
