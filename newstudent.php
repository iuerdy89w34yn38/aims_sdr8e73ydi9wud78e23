<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>New Student - <?php echo $instname ?> </title>

  <?php
  if(isset($_POST['add'])){

    $msg="Unsuccessful" ;


    $name=$_POST['newname'];
    $contact=$_POST['newcontact'];
    $classid=$_POST['newclass'];
    $fee=$_POST['newfee'];
    $datec=date('Y-m-d');

      $rollno=0;

      $rows =mysqli_query($con,"SELECT rollno FROM student WHERE `class`='$classid' order by rollno desc LIMIT 1" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $rollno = $row['rollno'];
        } 
        $newrollno=$rollno+1;


   
    $data=mysqli_query($con,"INSERT INTO student (name,contact,class,fee,datec,rollno)VALUES ('$name','$contact','$classid','$fee','$datec','$newrollno')")or die( mysqli_error($con) );

    $msg='Student Added' ;    
  }

  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns" <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?> >

<?php $link='newstudent'; ?>





  <?php include "include/header.php"?>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">




     
  <?php include "include/sidebar.php"?>
<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Add New Student to <?php echo $instname ?></h4>
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


                    <tbody>
                      <form method="post" action="" enctype="multipart/form-data">

                        <tr>
                          <td> Name: </td>
                          <td>
                            <input type="text" class="form-control" name="newname" value="" required="">
                          </td>

                        </tr>
                        <tr>
                          <td> Contact </td> 
                          <td>
                            <input type="text" class="form-control" name="newcontact" value="" required="">
                          </td>
                        </tr>
                        <tr>
                          <td> Class </td>
                          <td>
                            <select class="select2 form-control" name="newclass" >
                              <?php 
      $rows =mysqli_query($con,"SELECT * FROM class" ) or die(mysqli_error($con));
      while($row=mysqli_fetch_array($rows)){
        $cid = $row['id']; 
        $name = $row['name'];  ?>
                              <option style="text-transform: capitalize;" value="<?php echo $cid ?>"><?php echo $name ?></option>
                              <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr>
                          <td> Fee: </td>
                          <td>
                            <input type="number" class="form-control" name="newfee" value="" required="">
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
        </div>
      </div>
    </div>
  </div>
</section>
</div>


    </div>
  </div>

  <?php include "include/footer.php"?>


</body>
</html>