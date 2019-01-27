<?php
  $modul = isset($_GET["m"]) ? $_GET["m"] : "";
  // $id = isset($_GET["id"]) ? $_GET["id"] : "";
  
  switch ($modul) 
  {
    case '':
      ?>
      <div class="col-sm-6">
        <h3>Man</h3>
        <div class="table-responsive">          
          <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>HI</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $golfer_male_stmt = DB::query("SELECT * FROM golfers WHERE sex='Male' ORDER BY h_index LIMIT 5");

                foreach ($golfer_male_stmt as $golfers)
                {
                  ?>
                    <tr>
                      <td><?php echo $golfers['iga_id']; ?></td>
                      <td><?php echo $golfers['name']; ?></td>
                      <td><?php echo $golfers['h_index']; ?></td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-6">
        <h3>Ladies</h3>
        <div class="table-responsive">          
          <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>HI</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $golfer_female_stmt = DB::query("SELECT * FROM golfers WHERE sex='Female' ORDER BY h_index LIMIT 5");

                foreach ($golfer_female_stmt as $golfers_f)
                {
                  ?>
                    <tr>
                      <td><?php echo $golfers_f['iga_id']; ?></td>
                      <td><?php echo $golfers_f['name']; ?></td>
                      <td><?php echo $golfers_f['h_index']; ?></td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php
      break;
    case 'changepassword':
      include("files/changepassword.php");
      break;
    case 'correctiondetail':
      include("files/correctiondetail.php");
      break;
    case 'corrections':
      include("files/corrections.php");
      break;
    case 'editclub':
      include("files/editclub.php");
      break;
    case 'editcorrection':
      include("files/editcorrection.php");
      break;
    case 'editcourse':
      include("files/editcourse.php");
      break;
    case 'editgolfer':
      include("files/editgolfer.php");
      break;
    case 'editgolfer2':
      include("files/editgolfer2.php");
      break;
    case 'editscore':
      include("files/editscore.php");
      break;
    case 'edituser':
      include("files/edituser.php");
      break;
    case 'golfclubs':
      include("files/golfclubs.php");
      break;
    case 'golfcourses':
      include("files/golfcourses.php");
      break;
    case 'golfers':
      include("files/golfers.php");
      break;
    case 'log':
      include("files/log.php");
      break;
    case 'newclub':
      include("files/newclub.php");
      break;
    case 'newcorrection':
      include("files/newcorrection.php");
      break;
    case 'newcourse':
      include("files/newcourse.php");
      break;
    case 'newgolfer':
      include("files/newgolfer.php");
      break;
    case 'newscore':
      include("files/newscore.php");
      break;
    case 'newuser':
      include("files/newuser.php");
      break;
    case 'performance':
      include("files/performance.php");
      break;
    case 'revision':
      include("files/revision.php");
      break;
    case 'scoringhistory':
      include("files/scoringhistory.php");
      break;
    case 'scores':
      include("files/scores.php");
      break;
    case 'stats':
      include("files/stats.php");
      break;
    case 'suspense':
      include("files/suspense.php");
      break;
    case 'suspensereport':
      include("files/suspensereport.php");
      break;
    case 'users':
      include("files/users.php");
      break;
    case 'viewcorrection':
      include("files/viewcorrection.php");
      break;
    case 'viewclub':
      include("files/viewclub.php");
      break;
    case 'viewcourse':
      include("files/viewcourse.php");
      break;
    case 'viewgolfer':
      include("files/viewgolfer.php");
      break;
    case 'viewgolfersclub':
      include("files/viewgolfersclub.php");
      break;
    case 'viewscore':
      include("files/viewscore.php");
      break;
    case 'viewuser':
      include("files/viewuser.php");
      break;
    default:
      break;
  }
?>
