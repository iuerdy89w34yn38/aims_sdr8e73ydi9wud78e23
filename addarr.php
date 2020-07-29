<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>Add Arrear - <?php echo $instname ?> </title>


  <?php 
  if(isset($_POST['addarr'])){
    $msg="Unsuccessful" ;
    $std_id=$_POST['std_id'];
    $desp=$_POST['desp'];
    $mof=$_POST['mof'];
    $yof=$_POST['yof'];
    $addarr=$_POST['arr'];
    $dates=date('Y-m-d');
    $fdesp=$desp.' ('.$addarr.')';


    $fee=0;
      $rows =mysqli_query($con,"SELECT * FROM student WHERE id='$std_id' ") or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $fee = $row['fee']; 
      }

    $newarr=0;


      $arr=0;
      $rowsx =mysqli_query($con,"SELECT * FROM student_fee WHERE std_id='$std_id' ORDER BY id desc LIMIT 1" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
        $arr = $rowx['arrears']; 
      }

        $newarr=$arr+$addarr;

      $data=mysqli_query($con,"INSERT INTO student_fee (std_id,desp,fine,mof,yof,arrears,paid,fee,dates)VALUES ('$std_id','$fdesp','$addarr','$mof','$yof','$newarr','0','$fee','$dates')")or die( mysqli_error($con) );

      $msg='Added';


    }
  ?>




</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='addarr'; ?>

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
            <h4 class="card-title">Add Arrear to Existing Student </h4>
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
    
        <form method="post" action="" enctype="">

          <tr>
            <td class="text-center">
            Student ID:
         

            </td>
            <td class="text-center">

            <select  style="min-width: 250px" class="select2" name="std_id" required="">
<?php  $rows =mysqli_query($con,"SELECT * FROM student ORDER BY id" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $id = $row['id']; 
        $name = $row['name']; 
        $rollno = $row['rollno']; 
        $class = $row['class']; 
         ?>
        <option value="<?php echo $id ?>">

                <?php
     $rowsx =mysqli_query($con,"SELECT code FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classcode = $rowx['code']; 
      }?>-<?php echo $rollno ?>  <?php echo $name ?></option>
      <?php } ?>
            </select>
            </td>

          </tr>
          <tr>

            <td class="text-center">
            Description:

            </td>
            <td class="text-center">
             <input type="text" class="form-control" name="desp" value="" required="">

            </td>
          </tr>
          <tr>

            <td class="text-center">
            Month:

            </td>
            <td class="text-center">
             <input type="number" class="form-control" name="mof" value="<?php echo date('m'); ?>" required="">

            </td>
          </tr>
          <tr>
            
            <td class="text-center">
            Year:

            </td>

            <td class="text-center">
            <input type="number" class="form-control" name="yof" value="<?php echo date('Y'); ?>" required="">

            </td>

          </tr>
          <tr>
            
            <td class="text-center">
            Arrear:

            </td>
            <td class="text-center">
             <input type="text" class="form-control" name="arr" value="" required="">

            </td>
            
          </tr>
          <tr>
            

            <td colspan="2" class="text-center">

              <div class="btn-group text-center">

                <button type="submit" name="addarr" class="btn btn-info"> <i class="fa fa-eye"></i>Add</button>
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
        "order": [[ 1, "asc" ]],
          "pageLength": 100

    } );

</script>


</body>
</html>