<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>View Fee - <?php echo $instname ?> </title>
  <?php 
  if(isset($_POST['payment'])){
    $msg="Unsuccessful" ;
    $std_id=$_POST['payment'];
    $mof=date('m');
    $yof=date('Y');
    $dates=date('Y-m-d');

    $fee=0;
      $rows =mysqli_query($con,"SELECT * FROM student WHERE id=$std_id " ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $fee = $row['fee']; }

      $arr=0;
      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$std_id ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $arr = $rowx['arrear']; }

        $total = $fee+$arr;

      $data=mysqli_query($con,"INSERT INTO student_fee (std_id,mof,yof,arrears,paid,dates)VALUES ('$std_id','$mof','$yof','0','$total','$dates')")or die( mysqli_error($con) );



      $msg="Fee Paid";
      
    }
  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='viewfee'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">

<?php include "include/sidebar.php"?>

<div class="content-body">

<?php if(!empty($_GET['id'])){ ?>
   <?php

   $id=$_GET['id'];
   
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

  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Check Recent Fee Transactions</h4>
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
              <?php echo $class ?>
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




        </div>
      </div>
    </div>
  </div>
</section>

<?php } if(empty($name)) $msg='Not Found'; } ?>


  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">View and Pay Students Fee</h4>
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
       Roll 
     </th>
      <th style="min-width: 100px;">
       Name 
     </th>

     <th>
       Month 
     </th>

     <th>
      Fee

    </th>
    <th>
      Arrear
    </th>

    <th>
      Status
    </th>
    <th>
      Balance
    </th>

    <th class="hidden-xs">
      Pay
    </th>              </thead>
    <tbody>

      <?php


      $rows =mysqli_query($con,"SELECT * FROM student ORDER BY id limit 1000" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $rollno = $row['rollno']; 

        $class = $row['class']; 
        $contact = $row['contact']; 
        $fee = $row['fee'];  
      
      $pay='';
      $mof=date('m');
      $yof=date('Y');

      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id AND mof=$mof  AND yof=$yof AND paid!=0 " ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $pay = $rowx['id']; 
        $paid = $rowx['paid']; 
      }


                       ?>

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

            <td style="">
              <?php echo date('M-Y') ?>
            </td>

            

            <td >
              Rs. <?php echo number_format($fee) ?>/-
            </td>
            <td>
               <?php
      $arr='0';
      $paid='0';

      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id=$id ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $arr = $rowx['arrears']; 
      }?>
              <?php echo $arr ?>

            </td>

            <td >
              
              <?php if(!empty($pay)) echo 'Paid'; else echo "Not Paid"; ?>
            </td>

            <td >
            <?php 
            $total=0;
            $total=$fee+$arr;
            ?>

               <?php if(empty($pay))  echo 'Rs. '.number_format($total).'/-'; else echo '-'; ?>

            </td>


            <td>

              <div class="btn-group">
                <?php if(empty($pay)){ ?>
                <form action="" method="post">
                  <button style="display: none" title="Pay Fee" class="btn btn-success" type="submit" name="payment" value="<?php echo $id ?>"> <i class="la la-money"></i></button>
                </form>
              <?php } ?>

                <a title="View Recent Fee Transactions" class="btn btn-primary" href="?id=<?php echo $id ?>"> <i class="la la-eye"></i></a>

              </div>
            </td>
          </tr>


        <?php $n++; } ?>


      </tbody>
    </table>
<br><br>
   <table class="table table-bordered">
    
        <form method="get" action="" enctype="a">

          <tr>
            <td class="text-right">
            Enter ID to Check the Student Fee Record:
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