<?php
  if (Login::isLoggedIn())
  {
    if (isset($_POST['submit']))
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $con_password = $_POST['con_password'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $type = $_POST['type'];
      $exp_date = $_POST['exp_date'];
      $status = $_POST['status'];

      if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username)))
      {
        if (strlen($username) >=3 && strlen($username) <=255)
        {
          if (preg_match('/[a-zA-Z0-9_]+/', $username))
          {
            if (strlen($password) >=6 && strlen($password) <=60)
            {
              if ($password == $con_password)
              {
                DB::query('INSERT INTO users VALUES (\'\', :username, :password, :name, :email, :type, :exp_date, :status)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':name'=>$name, ':email'=>$email, ':type'=>$type, ':exp_date'=>$exp_date, ':status'=>$status));

                ?>
                  <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    <strong>User Successfully Inserted!</strong>
                  </div>
                <?php
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
                  <strong>Invalid Password!</strong>
                </div>
              <?php
            }
          }
          else
          {
            ?>
              <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Invalid Username!</strong>
              </div>
            <?php
          }
        }
        else
        {
          ?>
            <div class="alert alert-danger fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Invalid Username!</strong>
            </div>
          <?php
        }
      }
      else
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>User Already Exist!</strong>
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
        <input type="text" class="form-control" id="username" name="username" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="password">Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="password" name="password" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="con-password">Confirm Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="password" class="form-control" id="con-password" name="con_password" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name" name="name" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="email">Email:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="email" name="email" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="type">Type:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="type" name="type">
          <option value="Admin">Admin</option>
          <option value="User">User</option>
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
         <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="exp-date" name="exp_date" />
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
