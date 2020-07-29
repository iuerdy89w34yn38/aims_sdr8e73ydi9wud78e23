<!DOCTYPE html>
<html>
<head>
	<?php	$con=mysqli_connect("localhost","root","","frame")or die(mysql_error());?> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<style type="text/css"> .table td { vertical-align: middle; } </style>



<title>Select From Mytable</title>
</head>
<body>
  <div class="container">


<?php if(!empty($_GET['id'])){ ?>

  <?php $id=$_GET['id']; ?>

    <br><br>
    <table class="table table-bordered">
   <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM mytable where id=$id ORDER BY ordr" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $slug = $row['slug']; 
        $img = $row['img']; 
        $ordr = $row['ordr']; 
        $desp = $row['desp'];                   
        $feat = $row['feat'];                   
        $datec = $row['datec'];                   
        ?>

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Name: </td>
            <td>
              <?php echo $name ?>
            </td>

          </tr>
          <tr>
            <td> Slug </td> 
            <td>
              <?php echo $slug ?>
            </td>
          </tr>
          <tr>
            <td> Desp </td>
            <td>
              <?php echo $desp ?>
            </td>
          </tr>
          <tr>
            <td> Image: </td>
            <td colspan="2">
              <img style="width:200px;height: 100px; " src="../images/gallery/<?php echo $img ?>" class="form-control" ?>

            </td>
          </tr>
          <tr>
            <td> Order: </td>
            <td  style="max-width: 60px;">
              <?php echo $ordr ?>
            </td>

          </tr>
          <tr>
            <td> Feat: </td>
            <td  style="max-width: 60px;">
              <input type="checkbox" class="form-control" name="feat" <?php if($feat==1) echo 'checked'; ?> onclick="return false;" >
            </td>

          </tr>
          <tr>
            <td> Date: </td>
            <td  style="max-width: 60px;">
              <?php echo $datec ?>

            </td>

          </tr>

          <tr>
            <td colspan="2">

              <div class="text-center">

                <button type="submit" name="add" class="btn btn-info"> <i class="fa fa-plus"></i>Add</button>
              </div>
            </td>
          </tr>

        </form>
      </tbody>
    </table>
<?php } if(empty($name)) echo 'Not Found'; } ?>


		
		<br><br>
   <table class="table table-bordered">
    <thead>
      <th>
       ID 
     </th>
      <th>
       Title 
     </th>

     <th>
       Slug 
     </th>

     <th style="width: 210px">
      Image
    </th>
    <th>
      Description
    </th>
    <th style="width: 60px;">
      Order
    </th>
    <th style="width: 60px;">
      Feat
    </th>
    <th style="width: 130px;">
      Date:
    </th>
    <th class="hidden-xs">
      Save
    </th>              </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM mytable ORDER BY ordr" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $slug = $row['slug']; 
        $img = $row['img']; 
        $ordr = $row['ordr']; 
        $desp = $row['desp'];                  
        $datec = $row['datec'];                  
        $feat = $row['feat'];                   ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <?php echo $id ?>
            </td>
            <td>
              <?php echo $name ?>
            </td>

            <td>
              <?php echo $slug ?>
            </td>
            <td>
              <img style="width:200px;height: 100px; " src="../images/gallery/<?php echo $img ?>" class="form-control" ?><br>

            </td>
            <td>
              <?php echo $desp ?>

            </td>

            <td >
              <?php echo $ordr ?>
            </td>

            <td >
              <input type="checkbox" class="form-control" name="feat" <?php if($feat==1) echo 'checked'; ?> onclick="return false;" >
              
            </td>

            <td >
              <?php echo $datec ?>
            </td>

            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $id ?>"> <i class="fa fa-eye"></i>View</a>

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
            Enter ID to View the Record:
            </td>

            <td>
              <input type="text" class="form-control" name="id" value="" required="">
            </td>

            <td>

              <div class="btn-group">

                <button type="submit" name="" class="btn btn-info"> <i class="fa fa-eye"></i>View</button>
              </div>
            </td>
          </tr>

        </form>
    </table>

  </div>	

  <script src="assets/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

</body>
</html>