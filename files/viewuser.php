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
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="email">Email:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="type">Type:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="exp-date">Expired Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="exp-date" name="exp-date" value="<?php echo $exp_date; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="status">Status:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" disabled/>
      </div>
    </div>
  </div>
</form>