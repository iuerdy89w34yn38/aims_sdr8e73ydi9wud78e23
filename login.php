<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <title>Login </title>
   <?php include"include/connect.php";
      
  session_start();

  if(isset($_SESSION['name'])){
  header("location:index.php");
  }
  ?>


 <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/timeline.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->

</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">




  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">

     


             <?php
                            
                if (isset($_POST['login'])) {
                            if (empty($_POST['username']) || empty($_POST['password'])) {
                            echo "Username or Password is empty";
                            }
                            else
                            {
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            $username3 = stripslashes($username);
                            $username2 = str_replace("<", "", $username3);
                            $username1 = str_replace(">", "", $username2);
                            $username = str_replace("'", "", $username1);
                            $password3 = stripslashes($password);
                            $password2 = str_replace("<", "", $password3);
                            $password1 = str_replace(">", "", $password2);
                            $password = str_replace("'", "", $password1);

                            $query = mysqli_query($con,"SELECT * from users where password='$password' AND username='$username'")or die(mysqli_error($con));
                            $rows = mysqli_num_rows($query);
                            if ($rows == 1) {

                              $rowxs =mysqli_query($con,"SELECT * from users where password='$password' AND username='$username'" ) or die(mysqli_error($con));
                                        
                                while($rowx=mysqli_fetch_array($rowxs)){
                                  
                                  $userrole = $rowx['role'];
                                  }

                            $_SESSION['name']=$username; // Initializing Session
                            $_SESSION['role']=$userrole; // Initializing Session


                            header("location:index.php"); // Redirecting To Other Page
                            } else {

                           

                            $errormsg = 'Invalid Credentials';



                            }
                            }
                            }
                
            ?>
                





 <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <h2>AIMS</h2>
                    </div>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Please Login before Contuning</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="" method="post" novalidate>
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="text" class="form-control form-control-lg input-lg" name="username" placeholder="Your Username"required>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                      <br>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control form-control-lg input-lg" name="password"
                        placeholder="Enter Password" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <h2 class="text-center " style="color: red"><?php if(!empty($errormsg)) echo $errormsg; ?>
                      <br>
                      <br>

                      <button type="submit" name="login" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
                <br><br>
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