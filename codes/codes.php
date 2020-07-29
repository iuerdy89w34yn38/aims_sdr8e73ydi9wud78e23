  <?php 

  if(isset($_POST['send'])){

----------------------------------------------------------------------------------------------------------------
  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);

      if (!empty($_FILES['img'.$i]['name'])) {
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        // image file directory
        $target = "../images/gallery/".basename($image);
        $data=mysqli_query($con,"UPDATE gallerycat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }
      }

      $sql = "UPDATE gallerycat SET `name` = '$name',`slug` = '$slug',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      header("location:gallery-$slug");
    }
  }

---------------------------------------------------------------------------------------------------------------

'To Get Data';

$rows =mysqli_query($con,"SELECT * FROM customers where id=$act ORDER BY name" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $actname = $row['name'];
      $actbalance = $row['balance'];
      $acttype = $row['type'];
      $acttypeid = $row['typeid'];

    }

----------------------------------------------------------------------------------------------------------------

'To Insert Data';

	$data=mysqli_query($con,"INSERT INTO journal (jid,actid,desp,type,typeid)VALUES ('$jid','$srcid','$desp','$srctype','$srctypeid')")or die( mysqli_error($con) );


----------------------------------------------------------------------------------------------------------------

'To Update Data';

  $sqls = "UPDATE acts SET `balance` = '$srcbalance' WHERE `id` = $srcid"  ;
  mysqli_query($con, $sqls)or die(mysqli_error($con));

----------------------------------------------------------------------------------------------------------------

'To Delete Data';


  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['delccat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delccat'.$i];
  


      $sql = "DELETE FROM gallery WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Client Deleted";

    }

  }


----------------------------------------------------------------------------------------------------------------




}














