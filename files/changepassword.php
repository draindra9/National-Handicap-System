<?php
  if (Login::isLoggedIn()) 
  {
    if (isset($_POST['submit'])) 
    {
      $old_pwd = $_POST['old_pwd'];
      $new_pwd = $_POST['new_pwd'];
      $con_pwd = $_POST['confirm_pwd'];
      $userid = Login::isLoggedIn();

      if (password_verify($old_pwd, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) 
      {
        if ($new_pwd == $con_pwd) 
        {
          if (strlen($new_pwd) >= 6 && strlen($new_pwd) <= 60) 
          {
            DB::query('UPDATE users SET password=:new_pwd WHERE id=:userid', array(':new_pwd'=>password_hash($new_pwd, PASSWORD_BCRYPT), ':userid'=>$userid));
            
            ?>
              <div class="alert alert-success fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Password Change Success!</strong>
              </div> 
            <?php
          }
        } 
        else 
        {
          ?>
            <div class="alert alert-danger fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Password Didn't Match!</strong>
            </div> 
          <?php
        }
      } 
      else 
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Incorrect Old Password!</strong>
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
      
<form action="" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="username">Username:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $usr_n; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user_name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="old-pwd">Old Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="old-pwd" name="old_pwd" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="new-pwd">New Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="new-pwd" name="new_pwd" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="confirm-pwd">Confirm Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="confirm-pwd" name="confirm_pwd" required/>
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