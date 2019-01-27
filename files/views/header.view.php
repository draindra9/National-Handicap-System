<?php
  $modul = isset($_GET["m"]) ? $_GET["m"] : "";
  
  switch ($modul) 
  {
    case '':
      echo "TOP 5 GOLFERS";
      break;
    case 'changepassword':
      echo "CHANGE PASSWORD";
      break;
    case 'correctiondetail':
      echo "CORRECTION'S DETAIL";
      break;
    case 'corrections':
      echo "CORRECTIONS";
      break;
    case 'editclub':
      echo "EDIT CLUB";
      break;
    case 'editcorrection':
      echo "EDIT CORRECTION";
      break;
    case 'editcourse':
      echo "GOLF COURSE EDIT";
      break;
    case 'editgolfer':
      echo "GOLFER EDIT";
      break;
    case 'editgolfer2':
      echo "GOLFER EDIT";
      break;
    case 'editscore':
      echo "SCORE EDIT";
      break;
    case 'edituser':
      echo "USER EDIT";
      break;
    case 'golfclubs':
      echo "GOLF CLUBS";
      break;
    case 'golfcourses':
      echo "GOLF COURSES";
      break;
    case 'golfers':
      echo "GOLFERS";
      break;
    case 'log':
      echo "USER ACTIVITY LOGS";
      break;
    case 'newclub':
      echo "GOLF CLUB ENTRY";
      break;
    case 'newcorrection':
      echo "ADD NEW CORRECTION";
      break;
    case 'newcourse':
      echo "GOLF COURSE ENTRY";
      break;
    case 'newgolfer':
      echo "GOLFER REGISTRATION";
      break;
    case 'newscore':
      echo "SCORE ENTRY";
      break;
    case 'newuser':
      echo "ADD NEW USER";
      break;
    case 'performance':
      echo "GOLFER'S PERFORMANCE";
      break;
    case 'revision':
      echo "HANDICAP INDEX REVISION";
      break;
    case 'scoringhistory':
      echo "SCORING HISTORY";
      break;
    case 'scores':
      echo "SCORES";
      break;
    case 'stats':
      echo "STATISTICS";
      break;
    case 'suspense':
      echo "SUSPENSE GOLFERS";
      break;
    case 'suspensereport':
      echo "SUSPENSE GOLFERS ACTION";
      break;
    case 'users':
      echo "USERS";
      break;
    case 'viewcorrection':
      echo "CORRECTION APPROVAL";
      break;
    case 'viewclub':
      echo "GOLF CLUB'S DETAIL";
      break;
    case 'viewcourse':
      echo "GOLF COURSE'S DETAIL";
      break;
    case 'viewgolfer':
      echo "GOLFER'S DETAIL";
      break;
    case 'viewgolfersclub':
      echo "GOLFER'S CLUB";
      break;
    case 'viewscore':
      echo "SCORE'S DETAIL";
      break;
    case 'viewuser':
      echo "USER'S DETAIL";
      break;
    default:
      break;
  }
?>