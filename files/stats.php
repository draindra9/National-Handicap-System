<?php
  if (Login::isLoggedIn())
  {
    "";
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<?php
  if ($user_level == "Admin")
  {
    $total_golfers = DB::query('SELECT COUNT(*) AS tgolfers FROM golfers')[0]['tgolfers'];
    $total_scores = DB::query('SELECT COUNT(*) AS tscores FROM golfer_score')[0]['tscores'];
    $total_clubs = DB::query('SELECT COUNT(*) AS tclubs FROM golf_club')[0]['tclubs'];
    $total_courses = DB::query('SELECT COUNT(*) AS tcourses FROM golf_courses')[0]['tcourses'];
    $total_corr = DB::query('SELECT COUNT(*) AS tcorr FROM correction')[0]['tcorr'];
    $total_susp = DB::query('SELECT COUNT(*) AS tsusp FROM suspense_golfers')[0]['tsusp'];
    ?>
      <div class="col-sm-12">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Golfers<p class="pull-right"><i class="fa fa-user fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_golfers; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Scores<p class="pull-right"><i class="fa fa-table fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_scores; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Clubs<p class="pull-right"><i class="fa fa-home fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_clubs; ?></div>
          </div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Courses<p class="pull-right"><i class="fa fa-flag-o fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_courses; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Corrections<p class="pull-right"><i class="fa fa-check-square fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_corr; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Suspensions<p class="pull-right"><i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_susp; ?></div>
          </div>
        </div>
      </div>
    <?php
  }
  else
  {
    $total_golfers = DB::query("SELECT COUNT(*) AS tgolfers FROM golfers g INNER JOIN golfer_club gc ON g.iga_id=gc.iga_id INNER JOIN golf_club gclub ON gc.club_id=gclub.id AND gclub.club_code=:usr_n", array(':usr_n'=>$usr_n))[0]['tgolfers'];
    $total_scores = DB::query("SELECT COUNT(*) AS tscores FROM golfer_score INNER JOIN golfers ON golfer_score.iga_u_id=golfers.id INNER JOIN golf_courses ON golfer_score.course_id=golf_courses.id INNER JOIN golfer_club ON golfers.iga_id=golfer_club.iga_id INNER JOIN golf_club ON golfer_club.club_id=golf_club.id AND golf_club.club_code=:usr_n", array(':usr_n'=>$usr_n))[0]['tscores'];
    $total_corr = DB::query("SELECT COUNT(*) AS tcorr FROM correction, golfers WHERE correction.iga_id=golfers.iga_id AND correction.requester=:usr_n", array(':usr_n'=>$usr_n))[0]['tcorr'];
    ?>
      <div class="col-sm-12">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Golfers<p class="pull-right"><i class="fa fa-user fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_golfers; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Scores<p class="pull-right"><i class="fa fa-table fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_scores; ?></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="background:#2C3E50;color:#fff;">Corrections<p class="pull-right"><i class="fa fa-check-square fa-fw" aria-hidden="true"></i></p></div>
            <div class="panel-body" style="background:#DADFE1;text-align:center;"><?php echo $total_corr; ?></div>
          </div>
        </div>
      </div>
    <?php
  }
?>
