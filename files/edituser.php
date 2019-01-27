<?php
  $uid = isset($_GET["id"]) ? $_GET["id"] : "";

  if (Login::isLoggedin() && $user_level == "Admin")
  {
    $user_stmt = DB::query("SELECT * FROM users WHERE id=:uid ORDER BY id", array(':uid'=>$uid));

    foreach ($user_stmt as $users)
    {
      $uname = $users['username'];
      $name = $users['name'];
      $email = $users['email'];
      $type = $users['type'];
      $exp_date = $users['exp_date'];
      $status = $users['status'];
    }

    if (isset($_POST['submit'])) 
    {
      $usr_name = $_POST['name'];
      $usr_email = $_POST['email'];
      $usr_type = $_POST['type'];
      $usr_exp_date = $_POST['bday'];
      $usr_status = $_POST['status'];

      DB::query('UPDATE users SET name=:usr_name, email=:usr_email, type=:usr_type, exp_date=:usr_exp_date, status=:usr_status WHERE id=:uid', array(':usr_name'=>$usr_name, ':usr_email'=>$usr_email, ':usr_type'=>$usr_type, ':usr_exp_date'=>$usr_exp_date, ':usr_status'=>$usr_status, ':uid'=>$uid));

      header("location:index.php?m=users&result=user_edited"); 
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
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $uname; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="email">Email:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="type">Type:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" name="type" id="type">
          <?php
            if ($type == "Admin")
            {
              ?>
                <option value="Admin" selected>Admin</option>
                <option value="User">User</option>
              <?php
            }
            else
            {
              ?>
                <option value="Admin">Admin</option>
                <option value="User" selected>User</option>
              <?php
            }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="exp-date">Expired Date:</label>
      </div>
      <div class="col-sm-6">
         <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="exp-date" name="bday" value="<?php echo $exp_date; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="status">Status:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="status" name="status">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
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