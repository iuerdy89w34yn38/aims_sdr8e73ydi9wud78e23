<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>View Classes - <?php echo $instname ?> </title>
  <?php 
  if(isset($_POST['updateid'])){

   $id=$_GET['id'];


    $name=$_POST['name'];
    $code=$_POST['code'];

      $sql = "UPDATE class SET `name` = '$name',`code` = '$code' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg='Updated';
      
    }
  ?>

  <?php 
  if(isset($_GET['delid'])){

   $id=$_GET['delid'];

      $sql = "UPDATE class SET `del` = '1' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg='Deleted.';
      
    }
  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='viewclass'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>


<?php if(!empty($_GET['id'])){ ?>
   <?php

   $id=$_GET['id'];
   
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM class where id=$id ORDER BY name" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $code = $row['code']; 


        ?>

<div class="content-body">
  <section id="configurations">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Edit Class Details</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                <li><a  href="viewclass.php"><i class="ft-x"></i></a></li>
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
            <td> Shortcode: </td>
            <td>
              <input type="text" class="form-control" name="code" value="<?php echo $code ?>">
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
            <h4 class="card-title">View All Classes in <?php echo $instname ?></h4>
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
       Code 
     </th>

    

    <th class="hidden-xs">
      Update
    </th>              </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM class  WHERE del=0 ORDER BY id " ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $code = $row['code']; 

                       ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>

            <td>
              <?php echo $code ?>
            </td>

             <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $id ?>"> <i class="la la-pencil"></i></a>
                <a class="btn btn-danger" href="?delid=<?php echo $id ?>"> <i class="la la-trash"></i></a>

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
        "order": [[ 1, "asc" ]],
          "pageLength": 100

    } );

</script>


</body>
</html>