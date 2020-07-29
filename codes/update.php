<!DOCTYPE html>
<html>
<head>
	<?php	$con=mysqli_connect("localhost","root","","frame")or die(mysql_error());?> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<style type="text/css"> .table td { vertical-align: middle; } </style>
  <?php 
 for ($i=0; $i < 100 ; $i++) { 

  if(isset($_POST['save'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['save'.$i];
    $name=$_POST['name'.$i];
    $slug1=$_POST['slug'.$i];
    $desp1=$_POST['desp'.$i];
    $ordr=$_POST['ordr'.$i];

    if(isset($_POST['feat'.$i])){
      $feat=1;
    }else { $feat=0;  } 


    $desp = str_replace("'", "''", $desp1);   		
    $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
    if (!empty($_FILES['img'.$i]['name'])) {

        // Get image name
      $image = $_FILES['img'.$i]['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/gallery/".basename($image);

      $data=mysqli_query($con,"UPDATE mytable SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }      }
      $sql = "UPDATE mytable SET `name` = '$name',`slug` = '$slug',`desp` = '$desp',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      
    }

  }
  ?>

  <?php 

  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['del'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['del'.$i];

      $sql = "DELETE FROM mytable WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";

    }

  }
  ?>

  <?php
  if(isset($_POST['add'])){

    $msg="Unsuccessful" ;

    $name=$_POST['newname'];
    $slug1=$_POST['newslug'];
    $desp1=$_POST['newdesp'];
    $ordr=$_POST['newordr'];		
    $desp = str_replace("'", "''", $desp1);   		
    $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

    $datec=date('Y-m-d');

    if(isset($_POST['feat'])){
      $feat=1;
    }else { $feat=0;  } 
		

    if (!empty($_FILES['img']['name'])) {

	       // Get image name
     $image = $_FILES['img']['name'];
     $image = md5(uniqid())  . "1.png";

	       // image file directory
     $target = "../images/gallery/".basename($image);			
     if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }

  }		
  $data=mysqli_query($con,"INSERT INTO mytable (name,slug,img,desp,ordr,feat,datec)VALUES ('$name','$slug','$image','$desp','$ordr','$feat','$datec')")or die( mysqli_error($con) );


  $msg="Added" ;		
}

?>



<?php 

  if(isset($_POST['saves'])){
    $msg="Unsuccessful" ;

    $id=$_POST['saves'];
    $name=$_POST['name'];
    $slug1=$_POST['slug'];
    $desp1=$_POST['desp'];
    $ordr=$_POST['ordr'];

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
      $sql = "UPDATE mytable SET `name` = '$name',`slug` = '$slug',`desp` = '$desp',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      
    }
  ?>


<title>Insert into Mytable</title>
</head>
<body>
	<div class="container">
		
		<br><br>
   <table class="table table-bordered">
    <thead>
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
              <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>" required>
            </td>

            <td>
              <input type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>" required>
            </td>
            <td>
              <img style="width:200px;height: 100px; " src="../images/gallery/<?php echo $img ?>" class="form-control" ?><br>
              <input  type="file" class="form-control" name="img<?php echo $n ?>">

            </td>
            <td>
              <textarea class="form-control" name="desp<?php echo $n ?>" required><?php echo $desp ?></textarea>

            </td>

            <td >
              <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>" required>
            </td>

            <td >
              <input type="checkbox" class="form-control" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked'; ?>  >
            </td>

            <td>

              <div class="btn-group">

                <button type="submit" name="save<?php echo $n ?>" class="btn btn-success" value="<?php echo $id ?>"> <i class="fa fa-save"></i>Save</button>

                <button type="submit" name="del<?php echo $n ?>" class="btn btn-danger" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i>Del</button>
              </div>
            </td>
          </tr>

        </form>

        <?php $n++; } ?>

        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <input type="text" class="form-control" name="newname" value="" required="">
            </td>

            <td>
              <input type="text" class="form-control" name="newslug" value="" required="">
            </td>
            <td >
              <input type="file" class="form-control" name="img" >

            </td>

            <td>
              <textarea class="form-control" name="newdesp" required=""></textarea>
            </td>

            <td>
              <input type="text" class="form-control" name="newordr" value="" required="">
            </td>

            <td>
              <input type="checkbox" class="form-control" name="feat" value="" >
            </td>


            <td>

              <div class="btn-group">

                <button type="submit" name="add" class="btn btn-info"> <i class="fa fa-plus"></i>Add</button>
              </div>
            </td>
          </tr>

        </form>

      </tbody>
    </table>
<br><br>
   <table class="table table-bordered">
    <thead>
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
    <th class="hidden-xs">
      Save
    </th>              </thead>
    <tbody>

      <?php
      $n=8;

      $rows =mysqli_query($con,"SELECT * FROM mytable where id=$n ORDER BY ordr" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $name = $row['name']; 
        $slug = $row['slug']; 
        $img = $row['img']; 
        $ordr = $row['ordr']; 
        $desp = $row['desp'];                   ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>
            <td>
              <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
            </td>

            <td>
              <input type="text" class="form-control" name="slug" value="<?php echo $slug ?>">
            </td>
            <td>
              <img style="width:200px;height: 100px; " src="../images/gallery/<?php echo $img ?>" class="form-control" ?><br>
              <input  type="file" class="form-control" name="img">

            </td>
            <td>
              <textarea class="form-control" name="desp"><?php echo $desp ?></textarea>

            </td>

            <td >
              <input type="text" class="form-control" name="ordr" value="<?php echo $ordr ?>">
            </td>

            <td>

              <div class="btn-group">

                <button type="submit" name="saves" class="btn btn-success" value="<?php echo $id ?>"> <i class="fa fa-save"></i>Save</button>

              </div>
            </td>
          </tr>

        </form>
      <?php } ?>


      </tbody>
    </table>

  </div>	

  <script src="assets/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

</body>
</html>