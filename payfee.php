<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>Pay Teacher Fee - <?php echo $instname ?> </title>
  <?php 
  if(isset($_POST['submitfee'])){
    $msg="Unsuccessful" ;
    $std_id=$_POST['submitfee'];
    $paying=$_POST['paying'];
    $desp='Fee Submitted';
    $mof=date('m');
    $yof=date('Y');
    $dates=date('Y-m-d');
    $newarr=0;

    $fee=0;
      $rows =mysqli_query($con,"SELECT * FROM teacher WHERE id='$std_id' ") or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $fee = $row['fee']; 
      }

      $arr=0;
      $rowsx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id='$std_id' ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $arr = $rowx['arrears']; 
      }

        echo $total = $fee+$arr;

        $newarr=$total-$paying;

      $data=mysqli_query($con,"INSERT INTO teacher_fee (std_id,desp,mof,yof,fee,arrears,paid,due,dates)VALUES ('$std_id','$desp','$mof','$yof','$fee','$newarr','$paying','1','$dates')")or die( mysqli_error($con) );

      if(empty($_GET['refer'])){
      header("location:submitfee.php?done=1");

    }else{
      header("location:viewteacher.php?viewid=$std_id");

    }


    }
  ?>


  <?php 
  if(isset($_POST['addallarr'])){
    $msg="Unsuccessful" ;



      $rows =mysqli_query($con,"SELECT * FROM teacher ORDER BY id limit 1000" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

      $id = $row['id']; 
      $fee = $row['fee'];  
      $paid =''; 
      $pay='';
      $desp='Previous Fee.';
      $due='1';
      $mof=date('m');
      $yof=date('Y');
      $dates=date('Y-m-d');

      $rowsx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id=$id AND mof=$mof  AND yof=$yof" ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $pay = $rowx['id']; 
        $paid = $rowx['paid']; 
        $due = $rowx['due']; 
      }

     if(empty($due) OR empty($pay)){


      $newarr=0;
      $arr=0;

      $rowsx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id='$id' ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $arr = $rowx['arrears']; 
      }

        $newarr=$arr+$fee;

      $data=mysqli_query($con,"INSERT INTO teacher_fee (std_id,mof,yof,arrears,desp,fine,paid,fee,due,dates)VALUES ('$id','$mof','$yof','$newarr','$desp','$newarr','0','$fee','1','$dates')")or die( mysqli_error($con) );

    }

    }
      header("location:submitfee.php?done=1");
    }
  ?>

  <?php if(!empty($_GET['done'])) $msg='Done.'; ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='payfee'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>

<div class="content-body">

<?php if(!empty($_GET['id'])){ ?>
   <?php

   $id=$_GET['id'];
   
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM teacher where id=$id ORDER BY name" ) or die(mysqli_error($con));

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
            <h4 class="card-title">Pay Partial Fee</h4>
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

<?php
      $arr=0;
      $rowsx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id=$id ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
 
        echo $arr = $rowx['arrears']; 
      }

        $total = $fee+$arr;


    ?>

  
    <br><br>
   <table class="table table-bordered">

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Name: </td>
            <td>
              <?php echo $name ?>
            </td>
            <td> Fee: </td>
            <td class="text-capitalize">
              Rs. <?php echo number_format($fee) ?>/-
            </td>
            <td> Arrear: </td>
            <td class="text-capitalize">
              Rs. <?php echo number_format($arr) ?>/-
            </td>

          </tr>
 
          <tr>
            <td colspan="6" class="text-center">

              Pay Fee:

            </td>
          </tr>
           

          <tr>
            <td colspan="2"></td>
            <td>

              Total:
            </td>
            <td>
              Rs. <?php echo number_format($total) ?>/-

            </td>
            <td colspan="2"></td>

          </tr>
          <tr>
            <td colspan="2"></td>

            <td>

              Paying: 
              </td>
              <td>
                <input type="number" class="form-control" name="paying" value="" required="">

              </td>
            <td colspan="2"></td>

          </tr>
          <tr>
            <td colspan="6" class="text-center">
            <button type="submit" name="submitfee" value="<?php echo $id ?>" class="btn btn-info"> <i class="la la-sign-in"></i><span class="itext">Pay</span></button>
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

<?php } if(empty($name)) $msg='Not Found'; } ?>


  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Unpaid teachers Fee</h4>
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
       Name 
     </th>

     <th>
       Month 
     </th>

     <th>
      Payment

    </th>
    <th>
      Arrear
    </th>

    <th>
      Status
    </th>
    <th>
      Total
    </th>

    <th class="hidden-xs">
      Pay
    </th>              </thead>
    <tbody>

      <?php



      $rows =mysqli_query($con,"SELECT * FROM teacher ORDER BY id limit 1000" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $contact = $row['contact']; 
        $pay = $row['pay']; 
        $lecture = $row['lecture']; 


        $fee=$pay*$lecture;


        $mof=date('M-Y');


      $paid =''; 
      $pay='';
      $mof=date('m');
      $yof=date('Y');

      $rowsx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id=$id AND mof=$mof  AND yof=$yof AND paid!=0 " ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $pay = $rowx['id']; 
        $paid = $rowx['paid']; 

      }

      $rowsx =mysqli_query($con,"SELECT due FROM teacher_fee WHERE std_id=$id AND mof=$mof  AND yof=$yof " ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){
 
        $due = $rowx['due']; 

      }

     if(empty($pay)){


                       ?>

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>

            <td style="">
              <?php echo $mof ?>
            </td>

            

            <td >
              Rs. <?php echo number_format($fee) ?>/-
            </td>
            <td>
               <?php
      $arr='0';
      $paid='0';

      $rowsxx =mysqli_query($con,"SELECT * FROM teacher_fee WHERE std_id=$id ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      $n=0;

      while($rowxx=mysqli_fetch_array($rowsxx)){

        $arr = $rowxx['arrears']; 

      }?>
              <?php echo $arr ?>

            </td>

            <td >
          
              <?php echo "Not Paid"; ?>
            </td>

            <td >
            <?php 
            $total=0;
            if(empty($pay)) $total=$fee+$arr;
            ?>

             Rs. <?php echo number_format($total) ?>/- 
            

            </td>


            <td>

              <div class="btn-group">
                <?php if(!empty($due)) echo 'To Next Month'; else { ?>
                <a class="btn btn-primary" href="?id=<?php echo $id ?>"> <i class="la la-money"></i></a>
                <?php } ?> 
              </div>
            </td>
          </tr>


        <?php $n++; } } ?>


      </tbody>
    </table>
<br><br>
   <table class="table table-bordered">
    
        <form method="get" action="" enctype="a">

          <tr>
            <td class="text-right">
            Enter ID to Check the teacher Fee Record:
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

<br><br>
<h4>Add All Unpaid teachers Fee to Arrear </h4>
<br><br>
   <table class="table table-bordered">
    
        <form method="post" action="" enctype="">

          <tr>
         
            <td>

              <div class="btn-group">

                <button type="submit" name="addallarr" class="btn btn-info"> <i class="fa fa-eye"></i>Add</button>
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