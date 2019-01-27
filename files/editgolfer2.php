<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level == "User")
  {
    $username = DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];

    $golfer_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $golfer_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golfers WHERE id=:golfer_id", array(':golfer_id'=>$golfer_id))[0]['exist_count'];

    if ($golfer_exist_check != 0)
    {
      $golfer_stmt = DB::query("SELECT golfers.iga_id, golfers.name, golfers.nickname, golfers.birthdate, golfers.sex, golfers.address, golfers.city, golfers.office_address, golfers.office_city, golfers.country, golfers.zipcode, golfers.phone, golfers.handphone, golfers.fax, golfers.h_index, golfers.p_hi, golf_club.club_code, golf_club.club_name, golfer_club.club_id_number, golfer_club.club_id FROM golfers INNER JOIN golfer_club ON golfers.iga_id=golfer_club.iga_id INNER JOIN golf_club ON golf_club.id=golfer_club.club_id WHERE golfers.id=:golfer_id AND golf_club.club_code=:username", array(":golfer_id"=>$golfer_id, ':username'=>$username));
      //$golfer_stmt = DB::query("SELECT * FROM golfers WHERE id=:golfer_id", array(":golfer_id"=>$golfer_id));

      foreach ($golfer_stmt as $golfer) 
      {
        $club_id = $golfer['club_id'];
        $club_code = $golfer['club_code'];
        $club_name = $golfer['club_name'];
        $club_id_no = $golfer['club_id_number'];
        $iga_id = $golfer['iga_id'];
        $name = $golfer['name'];
        $nickname = $golfer['nickname'];
        $bday = $golfer['birthdate'];
        $sex = $golfer['sex'];
        $address = $golfer['address'];
        $city = $golfer['city'];
        $o_address = $golfer['office_address'];
        $o_city = $golfer['office_city'];
        $country = $golfer['country'];
        $zipcode = $golfer['zipcode'];
        $phone = $golfer['phone'];
        $handphone = $golfer['handphone'];
        $fax = $golfer['fax'];
        $hi = $golfer['h_index'];
        $p_hi = $golfer['p_hi'];
      }

      if (isset($_POST['submit']))
      {
        $c_id = $_POST['club_id'];
        $c_id_no = $_POST['c_id_no'];
        $g_iga_id = $_POST['g_id'];
        $g_nickname = $_POST['g_nickname'];
        $g_bday = $_POST['bday'];
        $g_sex = $_POST['g_sex'];
        $g_address = $_POST['g_address'];
        $g_city = $_POST['g_city'];
        $g_o_address = $_POST['g_o_address'];
        $g_o_city = $_POST['g_o_city'];
        $g_country = $_POST['g_country'];
        $g_zip = $_POST['g_zip'];
        $g_phone = $_POST['g_phone'];
        $g_hp = $_POST['g_hp'];
        $g_fax = $_POST['g_fax'];

        $pass = $_POST['password'];
        if (password_verify($pass, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password']))
        {
          DB::query('UPDATE golfers SET nickname=:g_nickname, birthdate=:g_bday, sex=:g_sex, address=:g_address, city=:g_city, office_address=:g_o_address, office_city=:g_o_city, country=:g_country, zipcode=:g_zip, phone=:g_phone, handphone=:g_hp, fax=:g_fax WHERE iga_id=:g_iga_id', array(':g_nickname'=>$g_nickname, ':g_bday'=>$g_bday, ':g_sex'=>$g_sex, ':g_address'=>$g_address, ':g_city'=>$g_city, ':g_o_address'=>$g_o_address, ':g_o_city'=>$g_o_city, ':g_country'=>$g_country, ':g_zip'=>$g_zip, ':g_phone'=>$g_phone, ':g_hp'=>$g_hp, ':g_fax'=>$g_fax, ':g_iga_id'=>$g_iga_id));

          DB::query('UPDATE golfer_club SET club_id_number=:c_id_no WHERE iga_id=:g_iga_id AND club_id=:c_id', array(':c_id_no'=>$c_id_no, ':g_iga_id'=>$g_iga_id, ':c_id'=>$c_id));

          header("location:index.php?m=golfers&result=golfer_edited"); 
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
      die("Golfer doesn't exist!");
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
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $iga_id; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-member">Club Member:</label>
      </div>
      <div class="col-sm-6">
        <input type="hidden" class="form-control" id="club-id" name="club_id" value="<?php echo $club_id; ?>" />
        <input type="text" class="form-control" id="club-member" name="club_member" value="<?php echo $club_code; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="club-name">Club Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="club-name" name="club_name" value="<?php echo $club_name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id-no">Club ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-id-no" name="c_id_no" value="<?php echo $club_id_no; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-nickname">Nickname:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-nickname" name="g_nickname" value="<?php echo $nickname; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="bday">Birth Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="bday" name="bday" value="<?php echo $bday; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-sex">Sex:</label>
      </div>
      <div class="col-sm-6">
        <?php
          if ($sex == "Male")
          {
            ?>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Male" id="g-sex" checked/>Male</label>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Female" id="g-sex" />Female</label>
            <?php
          }
          else if ($sex == "Female")
          {
            ?>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Male" id="g-sex" />Male</label>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Female" id="g-sex" checked/>Female</label>
            <?php
          }
          else
          {
            ?>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Male" id="g-sex" />Male</label>
              <label class="radio-inline"><input type="radio" name="g_sex" value="Female" id="g-sex" />Female</label>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-address">Home Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-address" name="g_address" value="<?php echo $address; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-city">City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-city" name="g_city" value="<?php echo $city; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-address">Office Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-address" name="g_o_address" value="<?php echo $o_address; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-city">Office City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-city" name="g_o_city" value="<?php echo $o_city; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-country">Country:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-country" name="g_country" value="<?php echo $country; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-zip">Zip Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-zip" name="g_zip" value="<?php echo $zipcode; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-phone">Phone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-phone" name="g_phone" value="<?php echo $phone; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hp">Handphone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hp" name="g_hp" value="<?php echo $handphone; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-fax">Fax:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-fax" name="g_fax" value="<?php echo $fax; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-hi">Current Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-hi" name="c_hi" value="<?php echo $hi; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="p-hi">Prior Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="p-hi" name="p_hi" value="<?php echo $p_hi; ?>" disabled/>
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
      <input type="submit" name="submit" class="btn btn-danger" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>
</form>