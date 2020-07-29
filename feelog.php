<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>View Fee - <?php echo $instname ?> </title>
 

  <?php if(!empty($_GET['done'])) $msg='Fee Submitted.'; ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='feelog'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>

<div class="content-body">


  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Paid Students Fee Log</h4>
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
       Tx.D 
     </th>
      <th style="">
       StdID 
     </th>
      <th>
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
      Paid
    </th>
    <th>
      Date
    </th>

    </thead>
    <tbody>

      <?php


      $paid =''; 
      $pay='';
      $mof=date('m');
      $yof=date('Y');

      $rowsx =mysqli_query($con,"SELECT * FROM student_fee" ) or die(mysqli_error($con));
      $n=0;

      while($rowx=mysqli_fetch_array($rowsx)){

        $tid = $rowx['id']; 
        $std_id = $rowx['std_id']; 
        $mof = $rowx['mof']; 
        $yof = $rowx['yof']; 
        $arr = $rowx['arrears']; 
        $paid = $rowx['paid']; 
        $datec = $rowx['datec']; 

      

      $rows =mysqli_query($con,"SELECT * FROM student WHERE `id`='$std_id' ORDER BY id limit 1000" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $class = $row['class']; 
        $contact = $row['contact']; 
        $fee = $row['fee'];  
      }



     if(!empty($tid)){;


                       ?>

          <tr>
            <td>
              <?php echo $tid ?>
            </td>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>

            <td style="">
              <?php echo $mof ?> - <?php echo $yof ?>
            </td>

            

            <td >
              Rs. <?php echo number_format($fee) ?>/-
            </td>
            <td>
              Rs. <?php echo number_format($arr) ?>/-

            </td>

            <td >
          
              Rs. <?php echo number_format($paid) ?>/-
            </td>

            <td >
              <?php echo $datec ?>

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