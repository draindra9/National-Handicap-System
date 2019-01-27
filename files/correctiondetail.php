<?php
  if (Login::isLoggedIn())
  {
    $corr_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $corr_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM correction WHERE correction.id=:corr_id", array(':corr_id'=>$corr_id))[0]['exist_count'];

    if ($corr_exist_check != 0)
    {
      @$corr_status_check = DB::query('SELECT approver FROM correction WHERE id=:corr_id', array(':corr_id'=>$corr_id))[0]['approver'];

      if ($corr_status_check != NULL)
      {
        $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

        foreach ($user_stmt as $user) 
        {
          $username = $user['username'];
        }

        $correction_stmt = DB::query("SELECT correction.id, correction.correction_date, correction.iga_id, correction.last_hi, correction.correction_hi, correction.last_rev_date, correction.status, correction.requester, correction.approver, golfers.name FROM correction, golfers WHERE correction.iga_id=golfers.iga_id AND correction.id=:corr_id", array(':corr_id'=>$corr_id));
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
          $corr_approver = $correction_golfer['approver'];
        }
      }
      else
      {
        die("Admin isn't yet processing this correction request!");
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
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $corr_iga; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $corr_name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-hi">Last Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-hi" name="last_hi" value="<?php echo $last_hi; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-rev-date">Last Revision Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-rev-date" name="last_rev_date" value="<?php echo $last_rev; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-hi">Correction Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="corr-hi" name="corr_hi" value="<?php echo $corr_hi; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
   <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-date">Correction Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="corr-date" name="corr_date" value="<?php echo $corr_date; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="requester">Requester:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="requester" name="requester" value="<?php echo $corr_requester; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="approver">Approver:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="approver" name="approver" value="<?php echo $corr_approver; ?>" disabled/>
      </div>
    </div>
  </div>
</form>