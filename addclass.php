  <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>New Class - <?php echo $instname ?> </title>

  <?php
  if(isset($_POST['add'])){

    $msg="Unsuccessful" ;


    $name=$_POST['newname'];
    $code=$_POST['newcode'];

   
    $data=mysqli_query($con,"INSERT INTO class (name,code)VALUES ('$name','$code')")or die( mysqli_error($con) );

    $msg="Added" ;    
  }

  ?>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns" <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?> >

<?php $link='newclass'; ?>





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
            <h4 class="card-title">Add New Class</h4>
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
                          <td> Class Name: </td>
                          <td>
                            <input type="text" class="form-control" name="newname" value="" required="">
                          </td>

                        </tr>
                        <tr>
                          <td> Class ShortCode: </td>
                          <td>
                            <input type="text" class="form-control" name="newcode" value="" required="">
                          </td>

                        </tr>
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