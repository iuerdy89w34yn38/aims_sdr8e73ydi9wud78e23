<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <?php include "include/head.php"?>
  <title>View Attendace - <?php echo $instname ?> </title>


   <?php 

  if(isset($_POST['updateid'])){

    for ($i=0; $i < 100 ; $i++) { 

    $msg="Unsuccessful" ;

    $teacherid=$_GET['newteacher'];
    $subjectid=$_GET['newsubject'];
    $class=$_GET['newclass'];
    $dates=$_GET['newdate'];

    if(empty($_POST['id'.$i])) {

    header("location:newattend.php?done=1");

    }

    $id=$_POST['id'.$i];
    $rollno=$_POST['rollno'.$i];


    if(isset($_POST['attend'.$i])){
      $attend=1;
    }else { $attend=0;  } 



    

  $data=mysqli_query($con,"INSERT INTO student_atd (std_id,std_rollno,teacher_id,class,subject_id,attend,dates)VALUES ('$id','$rollno','$teacherid','$class','$subjectid','$attend','$dates')")or die( mysqli_error($con) );


      if(empty($msg))  $msg="Added";
      
    }

  }
  ?>


  <?php if(!empty($_GET['done'])) $msg='Done.'; ?>


<style type="text/css">
  .form-control[readonly] {
    background-color: #ffffff;
    border: 0px;
  }
    #checker{
      height: 25px;
    }

</style>

</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='viewattend'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>


<?php if(!empty($_GET['viewattend'])){ ?>
   <?php

   $id=$_GET['viewattend'];


    $teacherid=$_GET['teacher'];
    $subjectid=$_GET['subject'];
    $classid=$_GET['class'];
    $dates=$_GET['date'];
    $checkid='';


      $rows =mysqli_query($con,"SELECT id FROM student_atd WHERE `teacher_id`='$teacherid' AND `class`='$classid' AND  `subject_id`='$subjectid' AND  `dates`='$dates' " ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $checkid = $row['id']; 

      }

      if(!empty($checkid)){



   ?>

<div class="content-body">
  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Attendace Record</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">


    <br><br>

    <table class="table table-bordered">

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Teacher: </td>
            <td>

     <?php  $rows =mysqli_query($con,"SELECT name FROM teacher WHERE `id`='$teacherid' ORDER BY name" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        echo $teacher = $row['name'];  } ?>

           
            </td>

            <td> Class </td> 
            <td class="text-capitalize">
                          <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$classid " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>
        
      </td>
          </tr>



          <tr>
            <td> Subject: </td>
            <td class="text-capitalize">
        <?php  $rows =mysqli_query($con,"SELECT name FROM subject WHERE `id`='$subjectid' ORDER BY name" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
       echo $subject = $row['name'];  

      } ?>

            </td>

            <td> Date: </td>
            <td>
              <?php echo $dates ?>
            </td>

          </tr>
          <tr>
            <td colspan="4" class="text-center"> Students Attendance Record </td>
          </tr>
          <tr>
            <td> Roll No. </td>  <td colspan="2"> Name </td>  <td> Attendace </td>
          </tr>

    <?php

      $n=0;

      $rows =mysqli_query($con,"SELECT * FROM student_atd WHERE `teacher_id`='$teacherid' AND `class`='$classid' AND  `subject_id`='$subjectid' AND  `dates`='$dates' order by std_rollno " ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){

        $checkid = $row['id']; 
        $attend = $row['attend']; 
        $std_id = $row['std_id']; 

      $rowsx =mysqli_query($con,"SELECT * FROM student WHERE `id`='$std_id'" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $std_id = $rowx['id']; 
        $std_rollno = $rowx['rollno']; 
        $name = $rowx['name']; 
        $class = $rowx['class']; 
      }


        ?>


          <tr>


            <td class="text-center" >
              <?php
     $rowsx =mysqli_query($con,"SELECT code FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classcode = $rowx['code']; 
      }?>-         
            <?php echo $std_rollno ?>


            </td>
            
            <td colspan="2" class="text-center" >               
            <?php echo $name ?>


            </td>
            
            <td class="text-center" >  
            <?php echo $attend ?>             
            


            </td>
            
          </tr>

        <?php $n++; } ?>


        </form>
      </tbody>
    </table>




        </div>
      </div>
    </div>
  </div>
</section>
</div>

<?php }else {echo '<center><h2> Attendance Record Not Found. </h2> </center> <br>';} }  ?>


<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">View Existing Attendance </h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">


    <br><br>
     <table class="table table-bordered">


                    <tbody>
                      <form method="get" action="" enctype="">

                        <tr>
                          <td> Teacher: </td>
                          <td>
                            
                             <select class="select2 form-control" name="teacher" >
                <?php 
            $rows =mysqli_query($con,"SELECT * FROM teacher" ) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($rows)){
            $id = $row['id'];
            $name = $row['name'];
              ?>
               <option value="<?php echo $id ?>"><?php echo $name ?></option>
                <?php } ?>
              </select>

                          </td>

                    
                          <td> Subject </td> 
                          <td>
                    <select class="select2 form-control" name="subject" >
                <?php 
            $rows =mysqli_query($con,"SELECT * FROM subject" ) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($rows)){
            $id = $row['id'];
            $name = $row['name'];
              ?>
               <option value="<?php echo $id ?>"><?php echo $name ?> </option>
                <?php } ?>
              </select>
                     </td>
                        </tr>
                        <tr>
                          <td> Class </td>
                          <td>
                            <select class="select2 form-control" name="class" >
                              <?php 
      $rows =mysqli_query($con,"SELECT * FROM class" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $id = $row['id'];  
        $name = $row['name'];  ?>
                              <option style="text-transform: capitalize;" value="<?php echo $id ?>"><?php echo $name ?></option>
                              <?php } ?>
                            </select>
                          </td>
                       

                          <td> Date: </td>
                          <td>
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d') ?>" required="">
                          </td>

                        </tr>


                        <tr>
                          <td colspan="4">

                            <div class="text-center">

                              <button type="submit" name="viewattend" value="1" class="btn btn-info"> <i class="la la-play"></i> <span class="itext"> View </span> </button>
                            </div>
                          </td>
                        </tr>

                      </form>
                    </tbody>
                  </table>

              

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>


<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">View Recent Attendance </h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="card-content collapse show">
            <div class="card-body">


    <br><br>
     <table class="table table-hover table-bordered">
                  <thead>

                    <tr>
                      <th>Teacher</th>
                      <th>Subject</th>
                      <th>Class</th>
                      <th>Date</th>
                      <th>View</th>
                    </tr>

                    <tbody>

                      <?php 

      $rows =mysqli_query($con,"SELECT DISTINCT teacher_id,class,subject_id,dates FROM student_atd ORDER BY id desc LIMIT 10" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $tid = $row['teacher_id']; 
        $cid = $row['class']; 
        $sid = $row['subject_id']; 
        $dates = $row['dates']; 

      
       ?>

                      <form method="get" action="" enctype="">
                        <tr>

                          <td>
                            <input style="display: none" value="<?php echo $tid ?>" name="teacher">

     <?php  $rowsx =mysqli_query($con,"SELECT name FROM teacher WHERE `id`='$tid' ORDER BY name" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $teacher = $rowx['name'];  } ?>

                <?php echo $teacher ?>

                          </td>

                    
                          <td>
                           <input style="display: none" name="subject" value="<?php echo $sid ?>">

     <?php  $rowsx =mysqli_query($con,"SELECT name FROM subject WHERE `id`='$sid' ORDER BY name" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $teacher = $rowx['name'];  } ?>

                <?php echo $teacher ?>
                         </td>

                          <td>
                            <input style="display: none" name="class" value="<?php echo $cid ?>">

     <?php  $rowsx =mysqli_query($con,"SELECT name FROM class WHERE `id`='$cid' ORDER BY name" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $teacher = $rowx['name'];  } ?>

                <?php echo $teacher ?>
                          </td>
                       

                          <td>
                            <input style="display: none" type="date" class="form-control" name="date" value="<?php echo $dates ?>" required="">
                            <?php echo $dates ?>
                          </td>


                          <td colspan="4">

                            <div class="text-center">

                              <button type="submit" name="viewattend" value="1" class="btn btn-info"> <i class="la la-eye"></i> <span class="itext"> </span> </button>
                            </div>
                          </td>
                        </tr>

                      </form>

                    <?php } ?>
                    </tbody>
                  </table>

              

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

</div>
</div>


<?php include "include/footer.php"?>

<script type="text/javascript">

    $('#stdtable').DataTable( {
        "order": [[ 1, "asc" ]],
          "pageLength": 100

    } );

</script>


</body>
</html>