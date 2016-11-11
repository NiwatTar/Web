<!DOCTYPE html>


    <head>
        <?php include("head/head.php");?>
        <title>SB Admin - Bootstrap Admin Template</title>
    </head>
    

        <body>
            
            
            <div id="wrapper">

<!-- *************************MENU BAR************************** -->
                <?php include("template/menubar.php"); ?>
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
                                <i class="fa fa-table"></i> ตารางแสดงข้อมูลสมาชิก
                            </li>
                        </ol>
                    </div>
                </div> 
<!-- *********************************start table************************************* -->                                               
                <div class="row">
                    <div class="col-md-12">
                        <center><h2>ตารางแสดงข้อมูลสมาชิก</h2></center>
                        <button type="button" class="btn btn-info btn-xl" data-toggle="modal" data-target="#myModal">เพิ่มข้อมูลสมาชิก</button>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                          
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>เพศ</th>
                                        <th>เบอร์โทร</th>
                                        <th>อีเมลล์</th>
                                        <th>แผนก</th> 
                                        <th>สถานะ</th>
                                        <th>สถานะการอบรม</th>
                                        <th>วันที่สมัคร</th>
                                        <th>เมนู</th>                                            
                                    </tr>
                                 </thead>
                                <tbody>   

                                <tr>
    <?php 
               
         include("connect.php");

        $sql = "SELECT stwUser.stwUser_id,stwUser.stwFirstname,stwUser.stwLastname,stwUser.stwActivate,stwUser.stwGender,stwUser.stwTel,stwUser.stwEmail,stwStatus.stwStatus_name,stwPrefix.stwPrefix_name,
            stwDepartment.stwDept_name,stwUser.stwCreated_date
                FROM stwUser
                INNER JOIN stwStatus
                ON stwUser.stwStatus_id = stwStatus.stwStatus_id 
                INNER JOIN stwDepartment
                ON stwUser.stwDept_id = stwDepartment.stwDept_id
                INNER JOIN stwPrefix
                ON stwUser.stwPrefix_id = stwPrefix.stwPrefix_id";
        $result = mysqli_query($conn, $sql);
            
                 $i=1 ;
                                 
                 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    if ($row['stwActivate']==1) {
                         $A = "อนุมัติ";
                        }else {
                        $A = "ไม่อนุมัติ";
                                        
                            }
                    if ($row['stwGender']==1) {
                        $B = "ชาย";
                        }else {
                        $B = "หญิง";
                                        
                            }
                                    
     ?>

                                   
                                    <td><?php echo 
                                    $row['stwPrefix_name'],
                                    $row['stwFirstname'],
                                    $row['stwLastname'] ?></td>
                                    <td><?php echo $B; ?></td>
                                    <td><?php echo $row['stwTel']; ?></td>
                                    <td><?php echo $row['stwEmail']; ?></td>
                                    <td><?php echo $row['stwDept_name']; ?></td>
                                    <td><?php echo $row['stwStatus_name']; ?></td>
                                    <td><?php echo $A; ?> </td>
                                    <td><?php echo $row['stwCreated_date']; ?></td>
                                    
                                    
                                <td>
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    เมนู <span class="caret"></span>
        </button>
         <ul class="dropdown-menu">
    <li>
    <a class="editdata" 
        data-id="<?php echo $row["stwUser_id"]; ?>"
        data-firstname = "<?php echo $row["stwFirstname"]; ?>">
        asdasdasdasd
    </a>
    </li>

    <li><a href="editdata.php? id=<?php echo $row["stwUser_id"]; ?>">แก้ไขข้อมูล</a></li>
    <li><a href="deldata.php? id=<?php echo $row["stwUser_id"]; ?>">ลบข้อมูลสมาชิก</a></li>
    </div>
</td>


                               
                                 </tr>                       
                                <?php $i++;} 
                                mysqli_close($conn);
                                ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- Grid -->
                    </div>
                    <!-- Row -->
                 </div>
    </div>
 <!-- *********************************end table***************************************** -->
                                    <?php include("modal/modalAdmin.php");?>
  


 
 
  






    </body>

</html>
