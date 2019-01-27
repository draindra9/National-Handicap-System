<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level =="Admin")
  {
    $corr_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $corr_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM correction WHERE correction.id=:corr_id", array(':corr_id'=>$corr_id))[0]['exist_count'];

    if ($corr_exist_check != 0)
    {
      @$corr_status_check = DB::query('SELECT approver FROM correction WHERE id=:corr_id', array(':corr_id'=>$corr_id))[0]['approver'];

      if ($corr_status_check == NULL)
      {
        $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

        foreach ($user_stmt as $user) 
        {
          $username = $user['username'];
        }

        $correction_stmt = DB::query("SELECT correction.id, correction.correction_date, correction.iga_id, correction.last_hi, correction.correction_hi, correction.last_rev_date, correction.status, correction.requester, golfers.name FROM correction, golfers WHERE correction.iga_id=golfers.iga_id AND correction.id=:corr_id", array(':corr_id'=>$corr_id));
        foreach ($correction_stmt as $correction_golfer) 
        {   
          $corr_date_time = $correction_golfer['correction_date'];
          list($corr_date, $corr_time) = split('[" "]', $corr_date_time);
          $corr_name = $correction_golfer['name'];
          $corr_iga = $correction_golfer['iga_id'];
          $last_hi = $correction_golfer['last_hi'];
          $corr_hi = $correction_golfer['correction_hi'];
          $last_rev = $correction_golfer['last_rev_date'];
          $corr_status = $correction_golfer['status'];
          $corr_requester = $correction_golfer['requester'];
        }

        if (isset($_POST['submit']))
        {
          $corr_u_id = $_POST['corr_id'];
          $golfer_u_id = $_POST['g_id'];
          $approver = $_POST['username'];
          $pass = $_POST['password'];
          $h_index = $_POST['corr_hi'];
          $dec = $_POST['act'];

          if ($dec)
          {
            if (password_verify($pass, DB::query('SELECT password FROM users WHERE username=:approver', array(':approver'=>$approver))[0]['password']))
            {
              if ($dec == "Approved")
              {
                DB::query('UPDATE golfers SET h_index=:h_index WHERE iga_id=:golfer_u_id', array(':h_index'=>$h_index, ':golfer_u_id'=>$golfer_u_id));

                $p_hi_query = DB::query('SELECT p_hi FROM golfers WHERE iga_id=:golfer_u_id', array(':golfer_u_id'=>$golfer_u_id));
                foreach ($p_hi_query as $p_hi_prepare) 
                {
                  $p_hi = $p_hi_prepare['p_hi'];
                }

                if ($h_index<$p_hi)
                {
                  DB::query('UPDATE golfers SET p_hi=:h_index WHERE iga_id=:golfer_u_id', array(':h_index'=>$h_index, ':golfer_u_id'=>$golfer_u_id));
                }
                else
                {
                  "";
                }

                DB::query('UPDATE correction SET approver=:approver WHERE id=:corr_u_id', array(':approver'=>$approver, ':corr_u_id'=>$corr_u_id));
                DB::query('UPDATE correction SET status=:dec WHERE id=:corr_u_id', array(':dec'=>$dec, ':corr_u_id'=>$corr_u_id));

                header("location:index.php?m=corrections&result=correction_approved");
              }
              else
              {
                DB::query('UPDATE correction SET approver=:approver WHERE id=:corr_u_id', array(':approver'=>$approver, ':corr_u_id'=>$corr_u_id));
                DB::query('UPDATE correction SET status=:dec WHERE id=:corr_u_id', array(':dec'=>$dec, ':corr_u_id'=>$corr_u_id));
                
                header("location:index.php?m=corrections&result=correction_rejected");
              }
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
          else
          {
            ?>
              <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Sorry, You Need To Determine Your Decision!</strong>
              </div> 
            <?php
          }
        }
      }
      else
      {
        die("This correction request is already processed by admin!");
      }
    }
    else
    {
      die("Correction doesn't exist!");
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<form action="" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="hidden" class="form-control" id="corr-id" name="corr_id" value="<?php echo $corr_id; ?>" readonly required/>
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $corr_iga; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $corr_name; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-hi">Last Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-hi" name="last_hi" value="<?php echo $last_hi; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-rev-date">Last Revision Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-rev-date" name="last_rev_date" value="<?php echo $last_rev; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-hi">Correction Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="corr-hi" name="corr_hi" value="<?php echo $corr_hi; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
   <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-date">Correction Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="corr-date" name="corr_date" value="<?php echo $corr_date; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="requester">Requester:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="requester" name="requester" value="<?php echo $corr_requester; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="act">Decision:</label>
      </div>
      <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="act" value="Approved" id="act" />Approve</label>
        <label class="radio-inline"><input type="radio" name="act" value="Rejected" id="act" />Reject</label>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <center><i>Password Verification</i></center>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="username">Username</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="password">Password</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="password" name="password" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <center>
      <input type="submit" name="submit" class="btn btn-danger" name="submit" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-warning">Cancel</button>
    </center>
  </div>
</form>