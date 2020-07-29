<!DOCTYPE html>
<html>
<head>
	<?php	$con=mysqli_connect("localhost","root","","frame")or die(mysql_error());?> 
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<style type="text/css"> td { vertical-align: middle; } </style>
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
		}else {	$feat=0;	}	


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

	<title>Insert into Mytable</title>
</head>
<body>
	<div class="container">
		
		<br><br>
		<table class="table table-bordered">


			<tbody>
				<form method="post" action="" enctype="multipart/form-data">

					<tr>
						<td> Name: </td>
						<td>
							<input type="text" class="form-control" name="newname" value="" required="">
						</td>

					</tr>
					<tr>
						<td> Slug </td>	
						<td>
							<input type="text" class="form-control" name="newslug" value="" required="">
						</td>
					</tr>
					<tr>
						<td> Desp </td>
						<td>
							<input type="text" class="form-control" name="newdesp" value="" required="">
						</td>
					</tr>
					<tr>
						<td> Image: </td>
						<td colspan="2">
							<input type="file" class="form-control" name="img" >

						</td>
					</tr>
					<tr>
						<td> Order: </td>
						<td  style="max-width: 60px;">
							<input type="text" class="form-control" name="newordr" value="" required="">
						</td>

					</tr>
					<tr>
						<td> Featured: </td>
						<td  style="max-width: 60px;">
							<input type="checkbox" class="form-control" name="feat" value="" >

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

	</div>	

	<script src="assets/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/jquery.min.js" type="text/javascript"></script>

</body>
</html>