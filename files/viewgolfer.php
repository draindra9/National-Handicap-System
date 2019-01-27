<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn())
  {
    $golfer_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $golfer_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golfers WHERE id=:golfer_id", array(':golfer_id'=>$golfer_id))[0]['exist_count'];

    if ($golfer_exist_check != 0)
    {

      $golfer_stmt = DB::query("SELECT * FROM golfers WHERE id=:golfer_id", array(":golfer_id"=>$golfer_id));

      foreach ($golfer_stmt as $golfer) 
      {
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

<form action="newgolfer.php" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $iga_id; ?>" disabled/>
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
        <label for="club-member">Member of Club:</label>
      </div>
      <div class="col-sm-6">
        <div class="table-responsive">     
          <table class="table table-condensed table-striped table-custom">
            <thead>
              <tr>
                <th>Club No</th>
                <th>Club Name</th>
                <th>Club ID-No</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $golfer_club_stmt = DB::query("SELECT golf_club.club_code, golf_club.club_name, golfer_club.club_id, golfer_club.club_id_number FROM golfer_club INNER JOIN golf_club ON golf_club.id=golfer_club.club_id WHERE golfer_club.iga_id=:iga_id", array(":iga_id"=>$iga_id));
                foreach ($golfer_club_stmt as $golfer_club) 
                {
                  ?>
                    <tr>
                      <td><?php echo $golfer_club['club_code']; ?></td>
                      <td><?php echo $golfer_club['club_name']; ?></td>
                      <td><?php echo $golfer_club['club_id_number']; ?></td>
                      <input type="hidden" class="form-control" id="c-member" name="c_member" value="<?php echo $golfer_club['club_id']; ?>" />
                      <input type="hidden" class="form-control" id="c-id-no" name="c_id_no" value="<?php echo $golfer_club['club_id_number']; ?>" />
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-nickname">Nickname:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-nickname" name="g_nickname" value="<?php echo $nickname; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="bday">Birth Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="bday" name="bday" value="<?php echo $bday; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-sex">Sex:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-sex" name="g_sex" value="<?php echo $sex; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-address">Home Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-address" name="g_address" value="<?php echo $address; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-city">City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-city" name="g_city" value="<?php echo $city; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-address">Office Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-address" name="g_o_address" value="<?php echo $o_address; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-city">Office City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-city" name="g_o_city" value="<?php echo $o_city; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-country">Country:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-country" name="g_country" value="<?php echo $country; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-zip">Zip Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-zip" name="g_zip" value="<?php echo $zipcode; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-phone">Phone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-phone" name="g_phone" value="<?php echo $phone; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hp">Handphone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hp" name="g_hp" value="<?php echo $handphone; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-fax">Fax:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-fax" name="g_fax" value="<?php echo $fax; ?>" disabled/>
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
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="p-hi">Prior Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="p-hi" name="p_hi" value="<?php echo $p_hi; ?>" disabled/>
      </div>
    </div>
  </div>
</form>
