<?php
  ob_start();
  if (Login::isLoggedIn())
  {
    $userid = Login::isLoggedIn();
    $user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
    $user_name = DB::query('SELECT name FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['name'];
    $usr_n = DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];

    if ($user_level == "Admin")
    {
      ?>
        <nav class="navbar navbar-inverse sidebar" role="navigation">
          <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><?php echo $user_name; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-sign-out fa-fw" aria-hidden="true"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Todo List <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-thumb-tack fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=suspense"><i style="font-size:16px;" class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i> Suspense Golfers</a></li>
                    <li><a href="index.php?m=corrections"><i style="font-size:16px;" class="fa fa-edit fa-fw" aria-hidden="true"></i> Pending Correction</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Entry <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-file-text fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=newgolfer"><i style="font-size:16px;" class="fa fa-user-plus fa-fw" aria-hidden="true"></i> Golfer Registration</a></li>
                    <li><a href="index.php?m=newcourse"><i style="font-size:16px;" class="fa fa-flag-o fa-fw" aria-hidden="true"></i> Golf Course Entry</a></li>
                    <li><a href="index.php?m=newclub"><i style="font-size:16px;" class="fa fa-home fa-fw" aria-hidden="true"></i> Golf Club Entry</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data View <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-list-alt fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=golfers"><i style="font-size:16px;" class="fa fa-user fa-fw" aria-hidden="true"></i> Golfers</a></li>
                    <!-- <li><a href="index.php?m=golfersbatch"><i style="font-size:16px;" class="fa fa-address-book fa-fw" aria-hidden="true"></i> Golfers Batch File</a></li> -->
                    <li><a href="index.php?m=scores"><i style="font-size:16px;" class="fa fa-table fa-fw" aria-hidden="true"></i> Scores</a></li>
                    <!-- <li><a href="index.php?m=scoresbatch"><i style="font-size:16px;" class="fa fa-database fa-fw" aria-hidden="true"></i> Scores Batch File</a></li> -->
                    <li><a href="index.php?m=golfcourses"><i style="font-size:16px;" class="fa fa-flag-o fa-fw" aria-hidden="true"></i> Golf Courses</a></li>
                    <li><a href="index.php?m=golfclubs"><i style="font-size:16px;" class="fa fa-home fa-fw" aria-hidden="true"></i> Golf Clubs</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Handicap Index <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-book fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=revision"><i style="font-size:16px;" class="fa fa-plus-square fa-fw" aria-hidden="true"></i> Revision</a></li>
                    <li><a href="index.php?m=corrections"><i style="font-size:16px;" class="fa fa-check-square fa-fw" aria-hidden="true"></i> Corrections</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-pie-chart fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=stats"><i style="font-size:16px;" class="fa fa-bar-chart fa-fw" aria-hidden="true"></i> Stats</a></li>
                    <li><a href="index.php?m=performance"><i style="font-size:16px;" class="fa fa-line-chart fa-fw" aria-hidden="true"></i> Performance</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-cog fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=changepassword"><i style="font-size:16px;" class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></li>
                    <li><a href="index.php?m=users"><i style="font-size:16px;" class="fa fa-male fa-fw" aria-hidden="true"></i> Users</a></li>
                  </ul>
                </li>
                <li><a href="../../handicap/index.php">Handicap Calculator<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-calculator fa-fw" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <?php
    }
    else
    {
      ?>
        <nav class="navbar navbar-inverse sidebar" role="navigation">
          <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><?php echo $user_name; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-sign-out fa-fw" aria-hidden="true"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Entry <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-file-text fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=newgolfer"><i style="font-size:16px;" class="fa fa-user-plus fa-fw" aria-hidden="true"></i> Golfer Registration</a></li>
                    <li><a href="index.php?m=newscore"><i style="font-size:16px;" class="fa fa-pencil fa-fw" aria-hidden="true"></i> Score Entry</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data View <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-list-alt fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=golfers"><i style="font-size:16px;" class="fa fa-user fa-fw" aria-hidden="true"></i> Golfers</a></li>
                    <!-- <li><a href="index.php?m=golfersbatch"><i style="font-size:16px;" class="fa fa-address-book fa-fw" aria-hidden="true"></i> Golfers Batch File</a></li> -->
                    <li><a href="index.php?m=scores"><i style="font-size:16px;" class="fa fa-table fa-fw" aria-hidden="true"></i> Scores</a></li>
                    <!-- <li><a href="index.php?m=scoresbatch"><i style="font-size:16px;" class="fa fa-database fa-fw" aria-hidden="true"></i> Scores Batch File</a></li> -->
                    <li><a href="index.php?m=golfcourses"><i style="font-size:16px;" class="fa fa-flag-o fa-fw" aria-hidden="true"></i> Golf Courses</a></li>
                    <li><a href="index.php?m=golfclubs"><i style="font-size:16px;" class="fa fa-home fa-fw" aria-hidden="true"></i> Golf Clubs</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Handicap Index <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-book fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=corrections"><i style="font-size:16px;" class="fa fa-check-square fa-fw" aria-hidden="true"></i> Corrections</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-pie-chart fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=stats"><i style="font-size:16px;" class="fa fa-bar-chart fa-fw" aria-hidden="true"></i> Stats</a></li>
                    <li><a href="index.php?m=performance"><i style="font-size:16px;" class="fa fa-line-chart fa-fw" aria-hidden="true"></i> Performance Report</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <span class="caret"></span><i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-cog fa-fw" aria-hidden="true"></i></a>
                  <ul class="dropdown-menu forAnimate" role="menu">
                    <li><a href="index.php?m=changepassword"><i style="font-size:16px;" class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></li>
                  </ul>
                </li>
                <li><a href="../../handicap/index.php">Handicap Calculator<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-calculator fa-fw" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <?php
    }
  }
  else
  {
    ?>
      <nav class="navbar navbar-inverse sidebar" role="navigation">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Guest</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#" data-toggle="modal" data-target="#loginModal">Login<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-sign-in fa-fw" aria-hidden="true"></i></a></li>
              <li><a href="index.php?m=golfers">Golfers<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-user fa-fw" aria-hidden="true"></i></a></li>
              <li><a href="index.php?m=golfcourses">Golf Courses<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-flag-o fa-fw" aria-hidden="true"></i></a></li>
              <li><a href="../../handicap/index.php">Handicap Calculator<i style="font-size:20px;" class="pull-right hidden-xs showopacity fa fa-calculator fa-fw" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    <?php
  }

  ?>
  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#019875;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
          <h4 class="modal-title">Login to gain specific access</h4>
        </div>
        <div class="modal-body" style="background:#C8F7C5" >
          <form action="" method="POST">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user-o fa-fw"></i></span>
              <input type="text" class="form-control" id="username" name="un" placeholder="type your username..." required>
            </div><br />
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
              <input type="password" class="form-control" id="pwd" name="pwd" placeholder="type your password..." required>
            </div><br />
            <button type="submit" name="login" class="btn btn-default">Login</button>
          </form>
        </div>
        <div class="modal-footer" style="background:#019875;color:#fff;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#019875;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
          <h4 class="modal-title">Logout Confirmation</h4>
        </div>
        <div class="modal-body" style="background:#C8F7C5" >
          <form action="" method="POST">
            <p>Are you sure you'd like to logout?</p>
            <p><label class="checkbox-inline"><input type="checkbox" name="alldevices" value="alldevices">Logout of all devices?</label></p>
            <button type="submit" name="logout" class="btn btn-default">Logout</button>
          </form>
        </div>
        <div class="modal-footer" style="background:#019875;color:#fff;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
