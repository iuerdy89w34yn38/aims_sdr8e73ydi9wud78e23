<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>New Teacher - <?php echo $instname ?> </title>

  <?php
  if(isset($_POST['add'])){

    $msg="Unsuccessful" ;


    $name=$_POST['newname'];
    $contact=$_POST['newcontact'];
    $newlec=$_POST['newlec'];
    $newtotal=$_POST['newtotal'];
    $pay=$_POST['newpay'];
    $datec=date('Y-m-d');


   
    $data=mysqli_query($con,"INSERT INTO teacher (name,contact,pay,lecture,total,datec)VALUES ('$name','$contact','$pay','$newlec','$newtotal','$datec')")or die( mysqli_error($con) );

    $msg="Added" ;    
  }

  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns" <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?> >

<?php $link='newteacher'; ?>





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
            <h4 class="card-title">Add New Teacher to <?php echo $instname ?></h4>
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
                          <td> Pay: </td>
                          <td>
                            <input onkeyup="wrt()" type="number" class="form-control" id="newpay" name="newpay" value="" required="" placeholder="Pay Per Lecture">
                            <br>
                            <div class="row">
                            <div class="col-md-6"> 
                              <input onkeyup="wrt()" type="number" class="form-control" id="newlec"  name="newlec" value="" required="" placeholder="No of Lectures">
                            </div>
                            <div class="col-md-6"> 
                              <input id="total" type="number" class="form-control" name="newtotal" value="" required="">
                            </div>
                          </div>
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

<script type="text/javascript">

    function wrt() {
       var y = document.getElementById("newpay").value;
        var z = document.getElementById("newlec").value;
        var x = +y * +z;

      document.getElementById('total').value = x ;
    }


  </script>


</body>
</html>