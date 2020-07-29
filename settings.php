<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <title>Settings </title>

  <?php include "include/head.php"?>



    <?php
  if(isset($_POST['update'])){
    $msg="Successful! Reloading. Please Wait..." ;


    $themeid=$_POST['color'];



    $sql = "UPDATE users SET `theme` = '$themeid' WHERE `username` = '$username'";

    mysqli_query($con, $sql);

    ?>

     <meta http-equiv="refresh" content="0;URL='index.php'">

<?php

  }

  ?>

</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">

<?php $link='index'; ?>

  <?php include "include/header.php"?>


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">

     
  <?php include "include/sidebar.php"?>


      <div class="content-body">

        <div class="row">



     <div class="col-sm-12">
      <div class="card">
        <div class="card-header" style="padding-bottom: 0px;">
          <h4 class="card-title">Select Theme</h4>
        </div>
        <div class="card-block">
          <div class="card-body">
           <form action="" method="post">
             <div class="row">


              <div class="col-sm-3">
              </div>
              <div class="col-sm-4">
                <span>Select Theme</span>
                <select class="form-control select2" name="color"  style="text-transform: capitalize;" >

                  <?php

                  $rows =mysqli_query($con,"SELECT * FROM color  ORDER BY name" ) or die(mysqli_error($con));

                  while($row=mysqli_fetch_array($rows)){

                    $colid = $row['id']; 
                    $colname = $row['name']; 
                    ?>

                    <option value="<?php echo $colid ?>" <?php if($colid==$themeid) echo 'selected'?> ><?php echo $colname ?></option>

                  <?php } ?>

                </select>

              </div>
              

             <div class="col-sm-1">
               <span>&nbsp;</span>
               <button name="update" class="btn btn-primary" value="">Update</button>

             </div>

           </div>
         </form>

         <br><hr>

         
         <center><h2><?php if(!empty($msg))  echo $msg ;?></h2></center>


           </div>
         </div>
       </div>
     </div>




        </div>




    </div>
  </div>

  <?php include "include/footer.php"?>


</body>
</html>