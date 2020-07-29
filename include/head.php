<?php include 'include/secure.php'; ?>  
<?php include 'include/connect.php'; ?>  



<?php 
  $rows =mysqli_query($con,"SELECT * FROM inst" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
    $instname = $row['name'];  
  }



 $rows =mysqli_query($con,"SELECT theme FROM users where `username`='$username'" ) or die(mysqli_error($con));
           
  while($row=mysqli_fetch_array($rows)){
    
    
    $themeid = $row['theme'];
    
     }



 $rows =mysqli_query($con,"SELECT * FROM color where id=$themeid" ) or die(mysqli_error($con));
           
  while($row=mysqli_fetch_array($rows)){
    
    $color1 = $row['color1'];
    $color2 = $row['color2'];
    $color3 = $row['color3'];
    $fcolor = $row['fcolor'];
    $factive = $row['factive'];
    $themebg = $row['bg'];
    $bgcolor = $row['bgcolor'];

    
     }

 ?>


  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="AIMS">


  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/selects/select2.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">

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
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/line-awesome/css/line-awesome.min.css">

  <!-- END Custom CSS-->


   <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <!-- END Custom CSS-->





<style type="text/css">
  





/*------------------- Theme Styles  -------------*/


html body {
    background:url('images/theme/<?php echo $themebg ?>') ;
    background-size: cover;; 
    background-color: <?php echo $bgcolor;?> !important;

}



/*---------- Header -----------------*/

.navbar-light .navbar-nav .nav-link {
    color: <?php echo $color1 ?>;
}

.navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
    color: <?php echo $color2 ?>;
}

.header-navbar .navbar-header .navbar-brand .brand-text {

    color: <?php echo $color1 ?>;
}


.header-navbar.navbar-shadow {
    box-shadow: 0px 0px 5px 0px <?php echo $factive ?>;
}



/*---------- Menu -----------------*/

.main-menu.menu-light .navigation > li.active > a {
    color: <?php echo $factive; ?>;
    background: <?php echo $color2; ?>;
}

.main-menu.menu-light .navigation {

    background: <?php echo $color1 ?>;
}

.main-menu.menu-light .navigation .navigation-header {
    color:<?php echo $fcolor ?> ;
}

.main-menu.menu-light .navigation > li > ul {
    background: <?php echo $color1 ?>;
}
.main-menu.menu-light .navigation > li ul .active > a {
    color: <?php echo $factive ?>;
    font-weight: 700;
    background: <?php echo $color2 ?>;
}

.main-menu.menu-light .navigation > li ul .hover > a, .main-menu.menu-light .navigation > li ul:hover > a {
    color: <?php echo $factive ?>;
}


.main-menu.menu-light .navigation > li.hover > a, .main-menu.menu-light .navigation > li:hover > a, .main-menu.menu-light .navigation > li.active > a {
    color: <?php echo $factive ?>;
}

.main-menu.menu-light .navigation li a {
    color: <?php echo $fcolor ?>;
}


/*---------- Card -----------------*/


.card {
    border: <?php echo $factive ?> 1px solid;
    box-shadow:5px 5px 10px -1px  <?php echo $color1 ?>;
}








/*---------- Buttons -----------------*/




.btn-primary {
    border-color: <?php echo $color2 ?> !important;
    background-color: <?php echo $color1 ?> !important;
    color: #FFFFFF;
}

.btn-primary:hover {
    border-color: <?php echo $color2 ?> !important;
    background-color: <?php echo $color2 ?> !important;
    color: #FFF !important;
}



.btn-info {
    border-color: <?php echo $color2 ?> !important;
    background-color: <?php echo $color1 ?> !important;
    color: #FFFFFF;
}

.btn-info:hover {
    border-color: <?php echo $color2 ?> !important;
    background-color: <?php echo $color2 ?> !important;
    color: #FFF !important;
}





.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: <?php echo $color1 ?>;
    border-color: <?php echo $color2 ?>;
}





.blue-grey.lighten-2 {
    color: <?php echo $color1 ?> !important;
}







</style>

