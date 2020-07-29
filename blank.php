<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <?php include "include/head.php"?>
  <title>New Student - <?php echo $instname ?> </title>


</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns"  <?php if(!empty($msg)) echo 'onload="mytoast();"'; ?>>

<?php $link='newstudent'; ?>

<?php include "include/header.php"?>

<div class="app-content content">
<div class="content-wrapper">
<?php include "include/sidebar.php"?>

<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Card Title</h4>
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