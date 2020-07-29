<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <title>Dashboard </title>
  <?php include "include/head.php"?>
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
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">
                            <?php

      $rows =mysqli_query($con,"SELECT * FROM student ORDER BY id limit 1000" ) or die(mysqli_error($con));
      echo $row= mysqli_num_rows($rows); ?>

                      </h3>
                      <h6>Total Students</h6>
                    </div>
                    <div>
                      <i class="icon-users info font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="warning">
                        <?php
      $rows =mysqli_query($con,"SELECT * FROM teacher ORDER BY id limit 1000" ) or die(mysqli_error($con));
      echo $row= mysqli_num_rows($rows); ?>
        
      </h3>
                      <h6>Teachers</h6>
                    </div>
                    <div>
                      <i class="icon-user warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="success">
                        <?php
      $rows =mysqli_query($con,"SELECT * FROM subject ORDER BY id limit 1000" ) or die(mysqli_error($con));
      echo $row= mysqli_num_rows($rows); ?>
        
      </h3>
                      <h6>Subjects</h6>
                    </div>
                    <div>
                      <i class="icon-book-open success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger"> <?php
      $rows =mysqli_query($con,"SELECT * FROM class ORDER BY id limit 1000" ) or die(mysqli_error($con));
      echo $row= mysqli_num_rows($rows); ?></h3>
                      <h6>Classes</h6>
                    </div>
                    <div>
                      <i class="icon-grid danger font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row match-height">
          <div class="col-xl-8 col-12" id="">
            <div class="card card-shadow pull-up"  style="min-height: 400px">
              <div class="card-header card-header-transparent py-20">
                <div class="btn-group dropdown">
                  <h4>Recent Student Admissions</h4>
                
              </div>
             
    <br><br>
  <table id="stdtable" class="table table-bordered table-hover" style="min-height: 100%;">
    <thead>
    
      <th>
       Roll No. 
     </th>

      <th>
       Name 
     </th>

     <th>
       Class 
     </th>

    <th>
      Fee
    </th>
            
  </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM student ORDER BY id limit 5" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 
        $rollno = $row['rollno']; 
        $name = $row['name']; 
        $class = $row['class']; 
        $contact = $row['contact']; 
        $fee = $row['fee'];    
                       ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>

            <td>
              <?php
     $rowsx =mysqli_query($con,"SELECT code FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classcode = $rowx['code']; 
      }?>-<?php echo $rollno ?>
            </td>

            <td>
              <?php echo $name ?>
            </td>

            <td style="text-transform: capitalize;">
                      <?php
     $rowsx =mysqli_query($con,"SELECT name FROM class WHERE id=$class " ) or die(mysqli_error($con));
      $n=0;
      while($rowx=mysqli_fetch_array($rowsx)){
         echo $classname = $rowx['name']; 
      }?>
            </td>



            <td >
              Rs. <?php echo number_format($fee) ?>/-
            </td>




          </tr>

        </form>

        <?php $n++; } ?>


      </tbody>
    </table>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="card  pull-up card-shadow">
              <div class="card-header card-header-transparent py-20">
                <div class="btn-group dropdown">
                  <h4>Recent Teachers Hired</h4>
                
              </div>
             
    <br><br>
  <table id="stdtable" class="table table-bordered table-hover" style="height: 120%;">
    <thead>
  
      <th>
       ID 
     </th>
      <th>
       Name 
     </th>


    <th>
      Salary
    </th>
            
  </thead>
    <tbody>

      <?php

      $rows =mysqli_query($con,"SELECT * FROM teacher ORDER BY id limit 5" ) or die(mysqli_error($con));
      $n=0;

      while($row=mysqli_fetch_array($rows)){

        $id = $row['id']; 

        $name = $row['name']; 
        $total = $row['total'];    
                       ?>
        <form method="post" action="" enctype="multipart/form-data">

          <tr>



            <td>
              <?php echo $id ?>
            </td>


            <td>
              <?php echo $name ?>
            </td>




            <td >
              Rs. <?php echo number_format($total) ?>/-
            </td>




          </tr>

        </form>

        <?php $n++; } ?>


      </tbody>
    </table>
              </div>
            </div>


           </div>
        </div>




    </div>
  </div>

  <?php include "include/footer.php"?>


</body>
</html>