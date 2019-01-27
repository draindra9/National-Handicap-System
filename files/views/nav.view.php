<?php
  $modul = isset($_GET["m"]) ? $_GET["m"] : "";
  
  switch ($modul) 
  {
    case '':
      ?>
        <li class="active">Home</li>
      <?php
      break;
    case 'changepassword':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li class="active">Change Password</li>
      <?php
      break;
    case 'correctiondetail':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li><a href="index.php?m=corrections">Corrections</a></li>
        <li class="active">Correction's Detail</li>
      <?php
      break;
    case 'corrections':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li class="active">Corrections</li>
      <?php
      break;
    case 'editclub':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data Entry</li>
        <li><a href="index.php?m=golfclubs">Golf Clubs</a></li>
        <li class="active">Edit Golf Club</li>
      <?php
      break;
    case 'editcorrection':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li><a href="index.php?m=corrections">Corrections</a></li>
        <li class="active">Edit Correction</li>
      <?php
      break;
    case 'editcourse':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfcourses">Golf Courses</a></li>
        <li class="active">Edit Course</li>
      <?php
      break;
    case 'editgolfer':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfers">Golfers</a></li>
        <li class="active">Edit Golfer</li>
      <?php
      break;
    case 'editgolfer2':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfers">Golfers</a></li>
        <li class="active">Edit Golfer</li>
      <?php
      break;
    case 'editscore':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=scores">Scores</a></li>
        <li class="active">Edit Score</li>
      <?php
      break;
    case 'edituser':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li><a href="index.php?m=users">Users</a></li>
        <li class="active">Edit User</li>
      <?php
      break;
    case 'golfclubs':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li class="active">Golf Clubs</li>
      <?php
      break;
    case 'golfcourses':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li class="active">Golf Courses</li>
      <?php
      break;
    case 'golfers':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li class="active">Golfers</li>
      <?php
      break;
    case 'log':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li class="active">User Activity Logs</li>
      <?php
      break;
    case 'newclub':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data Entry</li>
        <li class="active">Golf Club Entry</li>
      <?php
      break;
    case 'newcorrection':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li><a href="index.php?m=corrections">Corrections</a></li>
        <li class="active">New Correction</li>
      <?php
      break;
    case 'newcourse':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data Entry</li>
        <li class="active">Golf Course Entry</li>
      <?php
      break;
    case 'newgolfer':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data Entry</li>
        <li class="active">Golfer Registration</li>
        <li class="active">Interactive</li>
      <?php
      break;
    case 'newscore':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data Entry</li>
        <li class="active">Score Entry</li>
        <li class="active">Interactive</li>
      <?php
      break;
    case 'newuser':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li><a href="index.php?m=users">Users</a></li>
        <li class="active">User Registration</li>
      <?php
      break;
    case 'performance':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Report</li>
        <li class="active">Golfer's Performance</li>
      <?php
      break;
    case 'revision':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li class="active">Revision</li>
      <?php
      break;
    case 'scoringhistory':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Report</li>
        <li><a href="index.php?m=performance">Golfer's Performance</a></li>
        <li class="active">Scoring History</li>
      <?php
      break;
    case 'scores':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li class="active">Scores</li>
      <?php
      break;
    case 'stats':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Report</li>
        <li class="active">Stats</li>
      <?php
      break;
    case 'suspense':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Todo List</li>
        <li class="active">Suspense Golfers</li>
      <?php
      break;
    case 'suspensereport':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Todo List</li>
        <li><a href="index.php?m=suspense">Suspense Golfers</a></li>
        <li class="active">Suspense Golfers Action</li>
      <?php
      break;
    case 'users':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li class="active">Users</li>
      <?php
      break;
    case 'viewcorrection':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Handicap Index</li>
        <li><a href="index.php?m=corrections">Pending Correction</a></li>
        <li class="active">Correction Approval</li>
      <?php
      break;
    case 'viewclub':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfclubs">Golf Clubs</a></li>
        <li class="active">Golf Club Detail</li>
      <?php
      break;
    case 'viewcourse':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfcourses">Golf Courses</a></li>
        <li class="active">Golf Course Detail</li>
      <?php
      break;
    case 'viewgolfer':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=golfers">Golfers</a></li>
        <li class="active">Golfer's Information</li>
      <?php
      break;
    case 'viewgolfersclub':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Report</li>
        <li><a href="index.php?m=performance">Golfer's Performance</a></li>
        <li class="active">Golfer's Club</li>
      <?php
      break;
    case 'viewscore':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Data View</li>
        <li><a href="index.php?m=scores">Scores</a></li>
        <li class="active">View Score</li>
      <?php
      break;
    case 'viewuser':
      ?>
        <li><a href="index.php">Home</a></li>
        <li class="active">Administration</li>
        <li><a href="index.php?m=users">Users</a></li>
        <li class="active">User's Detail</li>
      <?php
      break;
    default:
      break;
  }
?>
