<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>View Student - <?php echo $instname ?> </title>
  <?php 
  if(isset($_POST['updateid'])){
    $msg="Unsuccessful" ;

    $id=$_POST['updateid'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $contact=$_POST['contact'];
    $fee=$_POST['fee'];

      $sql = "UPDATE student SET `name` = '$name',`class` = '$class',`contact` = '$contact',`fee` = '$fee' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      
    }
  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='viewstudent'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>


<?php if(!empty($_GET['viewid'])){ ?>
   <?php

   $id=$_GET['viewid'];
   
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM student where id=$id ORDER BY name" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $contact = $row['contact']; 
        $class = $row['class']; 
        $fee = $row['fee']; 
        $datec = $row['datec']; 

        ?>

<div class="content-body">
  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Check Student Profile </h4>
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



  
    <br><br>
   <table class="table table-bordered ">

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Name: </td>
            <td>
              <?php echo $name ?>
            </td>
            <td> Class: </td>
            <td class="text-capitalize">
              <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>
            </td>

          </tr>
 
          <tr>
            <td> Contact: </td>
            <td>
              <?php echo $contact ?>
            </td>

            <td> Fee: </td>
            <td>
              <?php echo $fee ?>
            </td>

          </tr>


          <tr>
            <td colspan="4" class="text-center">

              Admission: <?php echo $datec ?>

            </td>
          </tr>


        </form>
      </tbody>
    </table>
       <br>
    <h4> Recent Fee Transactions: </h4>
    <br>
  <table id="stdtable" class="table table-striped table-bordered zero-configuration">

          <thead>
            
          <th>
              TxD:
            </th>

          <th>
              Fee Month:
            </th>
            <th>
              Fee: 

            </th>
            <th>
              Arrears: 

            </th>

            <th>
              Description:

            </th>
            <th>
              Paid: 

            </th>
            <th>
              Balance: 

            </th>


            <th>

              Time of Transaction: 
              </th>



          </thead>
          
      <tbody>


           <?php
      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id ORDER BY id " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $tid = $rowx['id']; 

        $mof = $rowx['mof']; 
        $yof = $rowx['yof']; 
        $arr = $rowx['arrears']; 
        $desp = $rowx['desp']; 
        $fine = $rowx['fine']; 
        $paid = $rowx['paid']; 
        $dates = $rowx['dates']; 
        $datec = $rowx['datec']; 
        $due = $rowx['due']; 
        $oldfee = $rowx['fee']; 
      ?>

          <tr>
            <td>

              <?php echo $tid ?>
            </td>
            <td>

              <?php echo $mof ?> - <?php echo $yof ?>
            </td>
            <td>
              <?php echo number_format($fee) ?> 

            </td>
            <td>
              <?php echo number_format($arr)  ?> 

            </td>
            <td>
              <?php echo $desp ?> 


            </td>
            <td>
              <?php echo number_format($paid)  ?> 

            </td>
            <td>


<?php
      $checkpay='';
      $mof=date('m');

      $rowsxx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id AND mof=$mof " ) or die(mysqli_error($con));
      $n=0;

      while($rowxx=mysqli_fetch_array($rowsxx)){

        $checkpay = $rowxx['id']; 
      }

      ?>
              <?php if(!empty($checkpay)) $oldfee=0; ?>
              <?php 

                $bal = $oldfee+$arr-$paid;
                if      ($paid==0) echo $bal; 
                else if ($paid>0 AND $mof!=date('m'))  echo $oldfee+$arr;
                else if ($paid>0)  echo $arr;
                

               ?>


            </td>

            <td>
                <?php echo $datec ?>

            </td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
  


<?php
      $pay='';
      $mof=date('m');

      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id AND mof=$mof " ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $pay = $rowx['id']; 
      }?>
              <?php if(empty($pay)){ ?>

              <center>
    <a class="btn btn-primary" href="submitfee.php?id=<?php echo $id ?>&refer=view"> <i class="la la-money"></i> Pay Fee/Balance</a>
  </center>
<?php } ?>





       <br>
    <h4> Recent Attendance: </h4>
    <br>
  <table id="stdtable" class="table table-striped table-bordered zero-configuration">

          <thead>
            
          <th>
              ID:
            </th>

          <th>
              Teacher:
            </th>
            <th>
              Class: 

            </th>
            <th>
              Subject: 

            </th>

            <th>
              Attendance:

            </th>
            <th>
              Date: 

            </th>


          </thead>
          
      <tbody>


           <?php
      $rowsx =mysqli_query($con,"SELECT * FROM student_atd WHERE std_id=$id ORDER BY id " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $tid = $rowx['id']; 

        $teacherid = $rowx['teacher_id']; 
        $subjectid = $rowx['subject_id']; 
        $classid = $rowx['class'];  
        $attend = $rowx['attend'];  
        $dates = $rowx['dates'];  
      ?>

          <tr>
            <td>

              <?php echo $tid ?>
            </td>
            <td>


     <?php  $rows =mysqli_query($con,"SELECT name FROM teacher WHERE `id`='$teacherid' ORDER BY name" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        echo $teacher = $row['name'];  } ?>


            </td>
            <td>
                <?php  $rows =mysqli_query($con,"SELECT name FROM subject WHERE `id`='$subjectid' ORDER BY name" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
       echo $subject = $row['name'];  

      } ?>

            </td>
            <td>
                                <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>


            </td>
            <td>
              <?php echo $attend ?> 


            </td>
            <td>
              <?php echo $dates  ?> 

            </td>

          </tr>
        <?php } ?>

      </tbody>
    </table>




        </div>
      </div>
    </div>
  </div>
</section>
</div>


<?php } if(empty($name)) $msg='Not Found'; } ?>



<?php if(!empty($_GET['id'])){ ?>
   <?php

   $id=$_GET['id'];
   
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM student where id=$id ORDER BY name" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $rollno = $row['rollno']; 
        $name = $row['name']; 
        $contact = $row['contact']; 
        $class = $row['class']; 
        $fee = $row['fee']; 

        ?>

<div class="content-body">
  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Student Details</h4>
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



  
    <br><br>
   <table class="table table-bordered">

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Name: </td>
            <td>
              <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
            </td>

          </tr>
          <tr>
            <td> Class </td> 
            <td>
            <select class="select2 form-control" name="class" >
                <?php 
            $rows =mysqli_query($con,"SELECT * FROM class " ) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($rows)){
            $cid = $row['id']; 
            $name = $row['name'];  ?>
               <option style="text-transform: capitalize;" value="<?php echo $cid ?>" <?php if($cid==$class) echo 'selected' ?>><?php echo $name ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>



          <tr>
            <td> Contact: </td>
            <td>
              <input type="number" class="form-control" name="contact" value="<?php echo $contact ?>">
            </td>

          </tr>

          <tr>
            <td> Fee: </td>
            <td>
              <input type="number" class="form-control" name="fee" value="<?php echo $fee ?>">
            </td>

          </tr>


          <tr>
            <td colspan="2">

              <div class="text-center">

                <button type="submit" name="updateid" value="<?php echo $id ?>" class="btn btn-info"> <i class="fa fa-plus"></i>Update</button>
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

<?php } if(empty($name)) $msg='Not Found'; } ?>


<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">View All Students of <?php echo $instname ?></h4>
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
  <table id="stdtable" class="table table-striped table-bordered zero-configuration">
    <thead>
      <th style="">
       ID 
     </th>
      <th>
       Roll No. 
     </th>

      <th>
       Name 
     </th>

     <th>
       Class 
     </th>

     <th style="">
      Contact
    </th>
    <th>
      Fee
    </th>

    <th>
      Fee Paid
    </th>

    <th class="hidden-xs">
      Save
    </th>              </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM student ORDER BY id limit 1000" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $rollno = $row['rollno']; 
        $name = $row['name']; 
        $class = $row['class']; 
        $contact = $row['contact']; 
        $fee = $row['fee'];    
                       ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php
     $rowsx =mysqli_query($con,"SELECT code FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classcode = $rowx['code']; 
      }?>-<?php echo $rollno ?>
            </td>

            <td>
              <?php echo $name ?>
            </td>

            <td style="text-transform: capitalize;">
                      <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>
            </td>

            <td>
              <?php echo $contact ?>

            </td>

            <td >
              Rs. <?php echo number_format($fee) ?>/-
            </td>


            <td >
              <?php
      $pay='';
      $mof=date('m');

      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id AND mof=$mof " ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $pay = $rowx['id']; 
      }?>
              <?php if(!empty($pay)) echo 'Paid'; else echo "Not Paid"; ?>
            </td>


            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $id ?>"> <i class="la la-pencil"></i></a>

                <a class="btn btn-primary" href="?viewid=<?php echo $id ?>"> <i class="la la-eye"></i></a>

              </div>
            </td>
          </tr>

        </form>

        <?php $n++; } ?>


      </tbody>
    </table>
<br><br>
   <table class="table table-bordered">
    
        <form method="get" action="" enctype="a">

          <tr>
            <td class="text-right">
            Enter ID to Update the Record:
            </td>
            <td>
              <input type="text" class="form-control" name="id" value="" required="">
            </td>

            <td>

              <div class="btn-group">

                <button type="submit" name="" class="btn btn-info"> <i class="fa fa-eye"></i>Update</button>

              </div>
            </td>
          </tr>

        </form>
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
        "order": [[ 0, "desc" ]],
          "pageLength": 100

    } );

</script>


</body>
</html>