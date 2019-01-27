<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level == "Admin")
  {
    if (isset($_POST['submit']))
    {
      $c_code = $_POST['c_code'];
      $c_name = $_POST['c_name'];
      $abb_name = $_POST['abb_name'];
      $loc = $_POST['loc'];

      if (!DB::query('SELECT club_code FROM golf_club WHERE club_code=:c_code', array(':c_code'=>$c_code)))
      {
        if (strlen($c_code) >=3 && strlen($c_code) <=20)
        {
          DB::query('INSERT INTO golf_club VALUES (\'\', :c_code, :c_name, :abb_name, :loc)', array(':c_code'=>$c_code, ':c_name'=>$c_name, ':abb_name'=>$abb_name, ':loc'=>$loc));
          ?>
            <div class="alert alert-success fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Club Successfully Inserted!</strong>
            </div>
          <?php
        }
        else
        {
          ?>
            <div class="alert alert-danger fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Sorry, Invalid Club Code!</strong>
            </div>
          <?php
        }
      }
      else
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Sorry, Golf Club Already Exist!</strong>
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

<form action="index.php?m=newclub" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-code">Club Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-code" name="c_code" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-name">Club Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-name" name="c_name" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="abb-name">Abbreviation Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="abb-name" name="abb_name"/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="loc">Location:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="loc" name="loc"/>
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
