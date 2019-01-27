<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level == "Admin")
  {
    $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

    foreach ($user_stmt as $user) 
    {
      $username = $user['username'];
    }

    $date_stmt = DB::query("SELECT * FROM revision");

    foreach ($date_stmt as $date) 
    {
      $last_rev_date = $date['rev_date'];
    }

    if (isset($_POST['submit']))
    {
      $un = $_POST['username'];
      $pwd = $_POST['pass'];
      $rev_date = $_POST['rev_date'];

      if (password_verify($pwd, DB::query('SELECT password FROM users WHERE username=:un', array(':un'=>$un))[0]['password']))
      {
        $total_id_query = DB::query('SELECT MAX(id) AS max_id FROM golfers');
        
        foreach ($total_id_query as $total) {
          $total_id = $total['max_id'];
        }

        for ($i=0;$i<=$total_id;$i++)
        {
          $score_count_query = DB::query('SELECT COUNT(*) AS score_count FROM golfer_score WHERE iga_u_id=:i', array(':i'=>$i));
          
          foreach ($score_count_query as $score_count_prepare) 
          {
            $score_count = $score_count_prepare['score_count'];
            //echo $score_count;
          }

          if ($score_count>4 && $score_count<7)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(MIN(hcp_diff)*0.96,1) AS hcp FROM golfer_score WHERE iga_u_id=:i", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>6 && $score_count<9)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 2) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>8 && $score_count<11)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 3) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>10 && $score_count<13)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 4) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>12 && $score_count<15)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 5) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>14 && $score_count<17)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 6) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>16 && $score_count<18)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 7) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>17 && $score_count<19)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 8) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>18 && $score_count<20)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 9) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          elseif ($score_count>19)
          {
            $hi_formula = DB::query("SELECT TRUNCATE(TRUNCATE(AVG(golfer_score.hcp_diff),3)*0.96,1) AS hcp
                                    FROM (SELECT gs.hcp_diff
                                            FROM golfer_score AS gs
                                           WHERE iga_u_id=:i
                                        ORDER BY gs.hcp_diff
                                           LIMIT 10) golfer_score", array(':i'=>$i));

            foreach ($hi_formula as $handicap_index) 
            {
              $h_index = $handicap_index['hcp'];
            }

            DB::query('UPDATE golfers SET h_index=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));

            $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE id=:i', array(':i'=>$i));
            foreach ($p_hi_query as $p_hi_prepare) 
            {
              $p_hi = $p_hi_prepare['p_hi'];
            }

            if($h_index<$p_hi)
            {
              DB::query('UPDATE golfers SET p_hi=:h_index WHERE id=:i', array(':h_index'=>$h_index, ':i'=>$i));
            }
            else
            {
              "";
            }
          }
          else
          {
            "";
          }
        }
        DB::query('UPDATE revision SET rev_date=:rev_date', array(':rev_date'=>$rev_date));
        DB::query('DELETE FROM correction');  

        ?>
          <div class="alert alert-success fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Revision Success!</strong>
          </div> 
        <?php
      }
      else
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Incorrect Password!</strong>
          </div> 
        <?php
      }
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<form action="index.php?m=revision" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="username">Username:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="pass">Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="pass" name="pass"/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-rev-date">Last Revision Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-rev-date" name="last_rev_date" value="<?php echo $last_rev_date; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="rev-date">Revision Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="rev-date" name="rev_date" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <center>
      <input type="submit" name="submit" class="btn btn-danger" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>
</form>
