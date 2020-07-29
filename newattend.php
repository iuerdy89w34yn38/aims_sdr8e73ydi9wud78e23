<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <?php include "include/head.php"?>
  <title>New Attendace - <?php echo $instname ?> </title>


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
    $attend=$_POST['attend'.$i];





    

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

<?php $link='newattend'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>


<?php if(!empty($_GET['newattend'])){  ?>
   <?php

   $id=$_GET['newattend'];

    $teacherid=$_GET['newteacher'];
    $subjectid=$_GET['newsubject'];
    $class=$_GET['newclass'];
    $dates=$_GET['newdate'];
    $checkid='';

     $rows =mysqli_query($con,"SELECT id FROM student_atd WHERE `teacher_id`='$teacherid' AND `class`='$class' AND  `subject_id`='$subjectid' AND  `dates`='$dates' " ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $checkid = $row['id']; 

      }

      if(empty($checkid)){



   ?>

<div class="content-body">
  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add New Attendace</h4>
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
        $teacher = $row['name'];  } ?>

                <?php echo $teacher ?>
           
            </td>

            <td> Class </td> 
            <td>
                          <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>
        
      </td>
          </tr>



          <tr>
            <td> Subject: </td>
            <td>
        <?php  $rows =mysqli_query($con,"SELECT name FROM subject WHERE `id`='$subjectid' ORDER BY name" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $subject = $row['name'];  } ?>

              <?php echo $subject ?>
            </td>

            <td> Date: </td>
            <td>
              <?php echo $dates ?>
            </td>

          </tr>
          <tr>
            <td colspan="4" class="text-center"> Students Attendance </td>
          </tr>
          <tr>
            <td> Roll No. </td>  <td colspan="2"> Name </td>  <td> Attendace </td>
          </tr>

    <?php

      $n=0;

      $rows =mysqli_query($con,"SELECT * FROM student WHERE `class`='$class' ORDER BY rollno" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $rollno = $row['rollno']; 


        ?>


          <tr>
            <td class="text-center" >               
             <input type="number" class="form-control" name="id<?php echo $n ?>" value="<?php echo $id ?>" required readonly style="display: none;">

             <input type="number" class="form-control" name="rollno<?php echo $n ?>" value="<?php echo $rollno ?>" required readonly >
            </td>
            <td colspan="2" class="text-center" >               
             <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>" required readonly >
            </td>
            <td class="text-center" >

            <label class="ctr">
            <input type="radio" name="attend<?php echo $n ?>" value="P" >
            <span class="checkmark pre "></span>  </label>

            <label class="ctr">
            <input type="radio" name="attend<?php echo $n ?>" value="L" >
            <span class="checkmark lea"></span>  </label>

            <label class="ctr">
            <input type="radio" name="attend<?php echo $n ?>" value="A" checked="checked">
            <span class="checkmark abs"></span>  </label>


             

            </td>
          </tr>

        <?php $n++; } ?>
          <tr>
            <td colspan="4">

              <div class="text-center">

                <button type="submit" name="updateid" value="<?php echo $id ?>" class="btn btn-info"> <i class="fa fa-plus"></i>Submit</button>
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
</section>
</div>

<?php }else {echo '<center><h2> Attendance Record Already Exists. </h2> </center>';} } ?>


<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">New Attendance </h4>
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
                            
                             <select class="select2 form-control" name="newteacher" >
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

                        </tr>
                        <tr>
                          <td> Subject </td> 
                          <td>
                    <select class="select2 form-control" name="newsubject" >
                <?php 
            $rows =mysqli_query($con,"SELECT * FROM subject" ) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($rows)){
            $id = $row['id'];
            $name = $row['name'];
              ?>
               <option value="<?php echo $id ?>"><?php echo $name ?></option>
                <?php } ?>
              </select>
                     </td>
                        </tr>
                        <tr>
                          <td> Class </td>
                          <td>
                            <select class="select2 form-control" name="newclass" >
                              <?php 
      $rows =mysqli_query($con,"SELECT * FROM class" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $id = $row['id']; 
        $name = $row['name'];  ?>
                              <option style="text-transform: capitalize;" value="<?php echo $id ?>"><?php echo $name ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td> Date: </td>
                          <td>
                            <input type="date" class="form-control" name="newdate" value="<?php echo date('Y-m-d') ?>" required="">
                          </td>

                        </tr>


                        <tr>
                          <td colspan="2">

                            <div class="text-center">

                              <button type="submit" name="newattend" value="1" class="btn btn-info"> <i class="la la-play"></i> <span class="itext"> Start </span> </button>
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