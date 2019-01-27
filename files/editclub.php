<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level == "Admin")
  {
    $username = DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];

    $club_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $club_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golf_club WHERE id=:club_id", array(':club_id'=>$club_id))[0]['exist_count'];

    if ($club_exist_check != 0)
    {
      $club_stmt = DB::query("SELECT * FROM golf_club WHERE id=:club_id", array(":club_id"=>$club_id));

      foreach ($club_stmt as $course) 
      {
        $cc = $course['club_code'];
        $cn = $course['club_name'];
        $abbname = $course['abb_name'];
        $location = $course['location'];
      }

      if (isset($_POST['submit'])) 
      {
        $c_code = $_POST['c_code'];
        $c_name = $_POST['c_name'];
        $abb_name = $_POST['abb_name'];
        $loc = $_POST['loc'];

        $pass = $_POST['password'];
        if (password_verify($pass, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password']))
        {
          DB::query('UPDATE golf_club SET club_code=:c_code, club_name=:c_name, abb_name=:abb_name, location=:loc WHERE id=:club_id', array(':c_code'=>$c_code, ':c_name'=>$c_name, ':abb_name'=>$abb_name, ':loc'=>$loc, ':club_id'=>$club_id));
        
          header("location:index.php?m=golfclubs&result=club_edited"); 
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
      die("Golf club doesn't exist!");
    }
  }
  else
  {
    die("You don't have an access to view this page");
  }
?>

<form action="" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-code">Club Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-code" name="c_code" value="<?php echo $cc; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-name">Club Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-name" name="c_name" value="<?php echo $cn; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="abb-name">Abbreviation Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="abb-name" name="abb_name" value="<?php echo $abbname; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="loc">Location:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="loc" name="loc" value="<?php echo $location; ?>" />
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
      <input type="submit" class="btn btn-danger" name="submit" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>
</form>