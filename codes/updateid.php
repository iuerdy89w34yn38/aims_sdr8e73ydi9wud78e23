<!DOCTYPE html>
<html>
<head>
	<?php	$con=mysqli_connect("localhost","root","","frame")or die(mysql_error());?> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<style type="text/css"> .table td { vertical-align: middle; } </style>

<?php 

  if(isset($_POST['updateid'])){
    $msg="Unsuccessful" ;

    $id=$_POST['updateid'];
    $name=$_POST['name'];
    $slug1=$_POST['slug'];
    $desp1=$_POST['desp'];
    $ordr=$_POST['ordr'];

    if(isset($_POST['feat'])){
      $feat=1;
    }else { $feat=0;  } 


    $desp = str_replace("'", "''", $desp1);       
    $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

    if (!empty($_FILES['img']['name'])) {

        // Get image name
      $image = $_FILES['img']['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/gallery/".basename($image);

      $data=mysqli_query($con,"UPDATE mytable SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }      }
      $sql = "UPDATE mytable SET `name` = '$name',`slug` = '$slug',`desp` = '$desp',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      
    }
  ?>



<title>Update Record From Mytable</title>
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
        ?>

      <tbody>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td> Name: </td>
            <td>
              <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
            </td>

          </tr>
          <tr>
            <td> Slug </td> 
            <td>
              <input type="text" class="form-control" name="slug" value="<?php echo $slug ?>">
            </td>
          </tr>
          <tr>
            <td> Desp </td>
            <td>
              <textarea class="form-control" name="desp"><?php echo $desp ?></textarea>
            </td>
          </tr>
          <tr>
            <td> Image: </td>
            <td colspan="2">
              <img style="width:200px;height: 100px; " src="../images/gallery/<?php echo $img ?>" class="form-control" ?><br>
              <input  type="file" class="form-control" name="img">

            </td>
          </tr>
          <tr>
            <td> Order: </td>
            <td  style="max-width: 60px;">
              <input type="text" class="form-control" name="ordr" value="<?php echo $ordr ?>">
            </td>

          </tr>
          <tr>
            <td> Feat: </td>
            <td  style="max-width: 60px;">
              <input type="checkbox" class="form-control" name="feat" <?php if($feat==1) echo 'checked'; ?>  >
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
<?php } if(empty($name)) echo 'Not Found'; } ?>


		
		<br><br>
   <table class="table table-bordered">
    <thead>
      <th style="width: 60px;">
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
    <th>
      Order
    </th>
    <th>
      Feat
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
        $feat = $row['feat'];    
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

            <td>

              <div class="btn-group">

                <a class="btn btn-success" href="?id=<?php echo $id ?>"> <i class="fa fa-eye"></i>Update</a>

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

  <script src="assets/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

</body>
</html>