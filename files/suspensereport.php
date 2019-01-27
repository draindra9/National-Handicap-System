<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level =="Admin")
  {
    $suspense_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $susp_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM suspense_golfers WHERE suspense_id=:suspense_id", array(':suspense_id'=>$suspense_id))[0]['exist_count'];

    if ($susp_exist_check != 0)
    {

      $suspense_golfer_stmt = DB::query("SELECT * FROM suspense_golfers WHERE suspense_id=:suspense_id", array(":suspense_id"=>$suspense_id));

      foreach ($suspense_golfer_stmt as $suspense_golfer) 
      {
        $suspense_name = $suspense_golfer['name'];
        $suspense_nickname = $suspense_golfer['nickname'];
        $suspense_bday = $suspense_golfer['birthdate'];
        $suspense_sex = $suspense_golfer['sex'];
        $suspense_address = $suspense_golfer['address'];
        $suspense_city = $suspense_golfer['city'];
        $suspense_o_address = $suspense_golfer['office_address'];
        $suspense_o_city = $suspense_golfer['office_city'];
        $suspense_country = $suspense_golfer['country'];
        $suspense_zipcode = $suspense_golfer['zipcode'];
        $suspense_phone = $suspense_golfer['phone'];
        $suspense_handphone = $suspense_golfer['handphone'];
        $suspense_fax = $suspense_golfer['fax'];
        $suspense_hi = $suspense_golfer['h_index'];
      }

      if (isset($_POST['submit']))
      {
        $g_name = $_POST['g_name'];
        $c_member = $_POST['c_member'];
        $c_id_no = $_POST['c_id_no'];
        $g_nickname = $_POST['g_nickname'];
        $bday = $_POST['bday'];
        $sex = $_POST['g_sex'];
        $g_address = $_POST['g_address'];
        $g_city = $_POST['g_city'];
        $g_o_address = $_POST['g_o_address'];
        $g_o_city = $_POST['g_o_city'];
        $g_country = $_POST['g_country'];
        $g_zip = $_POST['g_zip'];
        $g_phone = $_POST['g_phone'];
        $g_hp = $_POST['g_hp'];
        $g_fax = $_POST['g_fax'];
        $g_hi = $_POST['c_hi'];
        $p_hi = $g_hi;

        $decision = @$_POST['dec'];

        if ($decision)
        {
          if ($decision == "insert_new")
          {
            $bday_count = DB::query('SELECT COUNT(birthdate) AS _count FROM golfers WHERE birthdate=:suspense_bday', array(':suspense_bday'=>$suspense_bday));

            foreach ($bday_count as $count_prepare) 
            {
              $count = $count_prepare['_count'];
              echo $count;
            }

            list($date, $month, $year) = split('[/]', $bday);

            $iga_determiner = $date.$month.$year;
            $iga_constant = 18720830;
            $iga_multiplier = 100;
            $multiplier_prepare = $iga_determiner-$iga_constant;
            $multiply_result = $multiplier_prepare*$iga_multiplier;
            $last_2 = 1;

            if ($count == 0)
            {
              $last_2 = 1;
            }
            else
            {
              $last_2 = $count+1;
            }

            if ($multiply_result < 0)
            {
              $iga_id = "IGA".$multiply_result.$last_2;
            }
            else
            {
              $iga_id = "IGA-".$multiply_result.$last_2;
            }

            echo $last_2."=>";
            echo $iga_id;

            DB::query('INSERT INTO golfers VALUES (\'\', :iga_id, :g_name, :g_nickname, :bday, :sex, :g_address, :g_city, :g_o_address, :g_o_city, :g_country, :g_zip, :g_phone, :g_hp, :g_fax, :g_hi, :p_hi)', array(':g_name'=>$g_name, ':iga_id'=>$iga_id, ':g_nickname'=>$g_nickname, ':bday'=>$bday, ':sex'=>$sex, ':g_address'=>$g_address, ':g_city'=>$g_city, ':g_o_address'=>$g_o_address, ':g_o_city'=>$g_o_city, ':g_country'=>$g_country, ':g_zip'=>$g_zip, ':g_phone'=>$g_phone, ':g_hp'=>$g_hp, ':g_fax'=>$g_fax, ':g_hi'=>$g_hi, ':p_hi'=>$p_hi));
            DB::query('INSERT INTO golfer_club VALUES (\'\', :iga_id, :c_member, :c_id_no)', array(':iga_id'=>$iga_id, ':c_member'=>$c_member, ':c_id_no'=>$c_id_no));
            DB::query('DELETE FROM suspense_golfer_club WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));
            DB::query('DELETE FROM suspense_golfers WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));

            header("location:index.php?m=suspense&result=insert_new");
          }
          elseif ($decision == "reject")
          {
            DB::query('DELETE FROM suspense_golfer_club WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));
            DB::query('DELETE FROM suspense_golfers WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));

            header("location:index.php?m=suspense&result=rejected");
          }
        }
        else
        {
          $identical_id = $_POST['identical_id'];

          if (!DB::query('SELECT club_id FROM golfer_club WHERE iga_id=:identical_id AND club_id=:club_member', array(':identical_id'=>$identical_id, ':club_member'=>$c_member)))
          {
            DB::query('INSERT INTO golfer_club VALUES (\'\', :identical_id, :c_member, :c_id_no)', array(':identical_id'=>$identical_id, ':c_member'=>$c_member, ':c_id_no'=>$c_id_no));
            DB::query('DELETE FROM suspense_golfer_club WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));
            DB::query('DELETE FROM suspense_golfers WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));

            header("location:index.php?m=suspense&result=add_club");
          }
          else
          {
            DB::query('DELETE FROM suspense_golfer_club WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));
            DB::query('DELETE FROM suspense_golfers WHERE suspense_id=:suspense_id', array(':suspense_id'=>$suspense_id));

            header("location:index.php?m=suspense&result=overwrite");
          }
        }
      }
    }
    else
    {
      die("Suspension doesn't exist!");
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
  
?>

<form action="index.php?m=suspensereport&id=<?php echo $suspense_id; ?>" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $suspense_id; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-id" name="g_id" value="<?php echo $suspense_id; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $suspense_name; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-name" name="g_name" value="<?php echo $suspense_name; ?>" />
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
                $golfer_club_stmt = DB::query("SELECT golf_club.club_code, golf_club.club_name, suspense_golfer_club.club_id, suspense_golfer_club.club_id_number FROM suspense_golfer_club INNER JOIN golf_club ON golf_club.id=suspense_golfer_club.club_id WHERE suspense_golfer_club.suspense_id=:suspense_id", array(":suspense_id"=>$suspense_id));
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
        <input type="text" class="form-control" id="g-nickname" name="g_nickname" value="<?php echo $suspense_nickname; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-nickname" name="g_nickname" value="<?php echo $suspense_nickname; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="bday">Birth Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="bday" name="bday" value="<?php echo $suspense_bday; ?>" disabled/>
        <input type="hidden" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="bday" name="bday" value="<?php echo $suspense_bday; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-sex">Sex:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-sex" name="g_sex" value="<?php echo $suspense_sex; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-sex" name="g_sex" value="<?php echo $suspense_sex; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-address">Home Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-address" name="g_address" value="<?php echo $suspense_address; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-address" name="g_address" value="<?php echo $suspense_address; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-city">City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-city" name="g_city" value="<?php echo $suspense_city; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-city" name="g_city" value="<?php echo $suspense_city; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-address">Office Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-address" name="g_o_address" value="<?php echo $suspense_o_address; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-o-address" name="g_o_address" value="<?php echo $suspense_o_address; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-city">Office City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-city" name="g_o_city" value="<?php echo $suspense_o_city; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-o-city" name="g_o_city" value="<?php echo $suspense_o_city; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-country">Country:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-country" name="g_country" value="<?php echo $suspense_country; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-country" name="g_country" value="<?php echo $suspense_country; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-zip">Zip Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-zip" name="g_zip" value="<?php echo $suspense_zipcode; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-zip" name="g_zip" value="<?php echo $suspense_zipcode; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-phone">Phone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-phone" name="g_phone" value="<?php echo $suspense_phone; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-phone" name="g_phone" value="<?php echo $suspense_phone; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hp">Handphone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hp" name="g_hp" value="<?php echo $suspense_handphone; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-hp" name="g_hp" value="<?php echo $suspense_handphone; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-fax">Fax:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-fax" name="g_fax" value="<?php echo $suspense_fax; ?>" disabled/>
        <input type="hidden" class="form-control" id="g-fax" name="g_fax" value="<?php echo $suspense_fax; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-hi">Current Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-hi" name="c_hi" value="<?php echo $suspense_hi; ?>" disabled/>
        <input type="hidden" class="form-control" id="c-hi" name="c_hi" value="<?php echo $suspense_hi; ?>" />
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-4" style="background:#68C3A3;padding:5px;margin-bottom:20px;color:#000;">
    <center>
      <div class="col-sm-12">
        <b><i>Decision:</i></b>
      </div>
      <div class="col-sm-12" style="margin-top:10px;">
        <label class="radio-inline"><input type="radio" name="dec" value="insert_new" />Insert as a New Golfer</label>
      </div>
      <div class="col-sm-12" style="margin-top:10px;">
        <label class="radio-inline"><input type="radio" name="dec" value="reject" />Reject</label>
      </div>
      <div class="col-sm-12" style="margin-top:10px;">
        <div class="table-responsive">     
          <table class="table table-condensed table-striped table-custom">
            <thead>
              <tr>
                <th>Identical Birth Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $identical_birthdate_stmt = DB::query("SELECT name, iga_id FROM golfers WHERE birthdate=:suspense_bday", array(":suspense_bday"=>$suspense_bday));

                foreach ($identical_birthdate_stmt as $identical_birthdate) 
                {
                  ?>
                    <tr>
                      <td><label class="radio-inline"><input type="radio" name="identical_id" value="<?php echo $identical_birthdate['iga_id']; ?>" /><?php echo $identical_birthdate['name']; ?> (<?php echo $identical_birthdate['iga_id']; ?>)</label></td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </center>
  </div>
  <div class="col-sm-12">
    <center>
      <input type="submit" name="submit" class="btn btn-danger" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('input[type=radio]').prop('checked', false);
    $('input[type=radio]:first').prop('checked', true)
    $('input[type=radio]').click(function (event){
      $('input[type=radio]').prop('checked', false);
      $(this).prop('checked', true);
    });
  });
</script>
