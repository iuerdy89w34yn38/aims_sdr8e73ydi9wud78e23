  <div class="pull-up main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        
        <li class=" nav-item <?php if($link=='index') echo 'active'; ?>"><a href="index.php"><i class="la la-dashboard"></i><span class="menu-title">Dashboard</span></a>


        <li class=" navigation-header">
          <span>Students</span>
        </li>


        <li class="nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title">Student</span></a>
          <ul class="menu-content">
            <li class="<?php if($link=='newstudent') echo 'active';?>"><a class="menu-item" href="newstudent.php">Add New Student</a> </li>
            <li class="<?php if($link=='viewstudent') echo 'active';?>"><a class="menu-item" href="viewstudent.php">View Students</a></li>

          </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="la la-calendar-check-o"></i><span class="menu-title">Attendance</span></a>
          <ul class="menu-content">
            <li class="<?php if($link=='newattend') echo 'active';?>"><a class="menu-item" href="newattend.php">New Attendance</a> </li>
            <li class="<?php if($link=='viewattend') echo 'active';?>"><a class="menu-item" href="viewattend.php">View Attendance</a></li>

          </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title">Fees</span></a>
          <ul class="menu-content">

            <li class="<?php if($link=='viewfee') echo 'active';?>"><a class="menu-item" href="viewfee.php">View Fee Status</a></li>
            <li class="<?php if($link=='feelog') echo 'active';?>"><a class="menu-item" href="feelog.php">Check Fee Log</a></li>
            <li class="<?php if($link=='submitfee') echo 'active';?>"><a class="menu-item" href="submitfee.php">Submit Fee</a></li>
            <li class="<?php if($link=='addarr') echo 'active';?>"><a class="menu-item" href="addarr.php">Add Arrear / Fine</a></li>

          </ul>
        </li>
       

        <li class=" navigation-header">
          <span>Institute</span>
        </li>


        <li class="nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title">Teacher</span></a>
          <ul class="menu-content">
            <li class="<?php if($link=='newteacher') echo 'active';?>"><a class="menu-item" href="newteacher.php">Add New Teacher</a> </li>
            <li class="<?php if($link=='viewteacher') echo 'active';?>"><a class="menu-item" href="viewteacher.php">View Teachers</a></li>

            <li class="<?php if($link=='payfee') echo 'active';?>"><a class="menu-item" href="payfee.php">Pay Teachers</a></li>

          </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="la la-book"></i><span class="menu-title">Subjects</span></a>
          <ul class="menu-content">
            <li class="<?php if($link=='newsubject') echo 'active';?>"><a class="menu-item" href="newsubject.php">Add New Subject</a> </li>
            <li class="<?php if($link=='viewsubject') echo 'active';?>"><a class="menu-item" href="viewsubject.php">View Subject</a></li>

          </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="la la-tablet"></i><span class="menu-title">Classes</span></a>
          <ul class="menu-content">
            <li class="<?php if($link=='newclass') echo 'active';?>"><a class="menu-item" href="addclass.php">Add New Class</a> </li>
            <li class="<?php if($link=='viewclass') echo 'active';?>"><a class="menu-item" href="viewclass.php">View Classes</a></li>

          </ul>
        </li>

  

      </ul>
    </div>
  </div>