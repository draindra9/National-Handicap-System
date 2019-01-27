<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level =="User")
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
          $editor = $_POST['username'];
          $pass = $_POST['password'];
          $corr_date = $_POST['corr_date'];
          $h_index = $_POST['corr_hi'];

          if (password_verify($pass, DB::query('SELECT password FROM users WHERE username=:editor', array(':editor'=>$editor))[0]['password']))
          {
            DB::query('UPDATE correction SET correction_hi=:h_index, correction_date=:corr_date WHERE id=:corr_u_id', array(':h_index'=>$h_index, ':corr_date'=>$corr_date, ':corr_u_id'=>$corr_u_id));

            header("location:index.php?m=corrections&result=correction_edited"); 
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
        <input type="text" class="form-control" id="corr-hi" name="corr_hi" value="<?php echo $corr_hi; ?>" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
   <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-date">Correction Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-date-format="dd/mm/yyyy hh:ii" id="corr-date" name="corr_date" value="<?php echo $corr_date_time; ?>" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="requester">Requester:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="requester" name="requester" value="<?php echo $corr_requester; ?>" readonly required/>
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

<script type="text/javascript">
  $('#corr-date').datetimepicker();
</script>