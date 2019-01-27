<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn())
  {
    $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

    foreach ($user_stmt as $user) 
    {
      $username = $user['username'];
    }

    if (isset($_POST['submit'])) 
    {
      $sex = @$_POST['sex'];

      if ($sex == "")
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Please Specify Golfer's Gender!</strong>
          </div> 
        <?php
      }
      else
      {
        $g_name = $_POST['g_name'];
        $c_member = $_POST['c_member'];
        $c_id_no = $_POST['c_id_no'];
        $g_nickname = $_POST['g_nickname'];
        $bday = $_POST['bday'];
        $sex = $_POST['sex'];
        $g_address = $_POST['g_address'];
        $g_city = $_POST['g_city'];
        $g_o_address = $_POST['g_o_address'];
        $g_o_city = $_POST['g_o_city'];
        $g_country = $_POST['g_country'];
        $g_zip = $_POST['g_zip'];
        $g_phone = $_POST['g_phone'];
        $g_hp = $_POST['g_hp'];
        $g_fax = $_POST['g_fax'];
        $hi_val = $_POST['hi_val'];
        if ($hi_val == "opt1")
        {
          $g_ihi = $_POST['g_ihi1'];
        }
        elseif ($hi_val == "opt2")
        {
          $g_ihi = $_POST['g_ihi2'];
        }
        else
        {
          $g_ihi = $_POST['g_ihi3'];
        }
        $p_hi = $g_ihi;

        $bday_count = DB::query('SELECT COUNT(birthdate) AS _count FROM golfers WHERE birthdate=:bday', array(':bday'=>$bday));

        foreach ($bday_count as $count_prepare) 
        {
          $count = $count_prepare['_count'];
        }

        list($date, $month, $year) = split('[/]', $bday);

        if ($count > 0)
        {
          $spc_bday_count = DB::query('SELECT COUNT(birthdate) AS _count FROM suspense_golfers WHERE birthdate=:bday', array(':bday'=>$bday));

          foreach ($spc_bday_count as $spc_count_prepare) 
          {
            $spc_count = $spc_count_prepare['_count'];
          }

          $spc_determiner = $date.$month.$year;
          $spc_constant = 18720830;
          $spc_multiplier = 100;
          $spc_multiplier_prepare = $spc_determiner-$spc_constant;
          $spc_multiply_result = $spc_multiplier_prepare*$spc_multiplier;

          if ($spc_count == 0)
          {
            $spc_last_2 = 1;
          }
          else
          {
            $spc_last_2 = $spc_count+1;
          }

          if ($spc_multiply_result < 0)
          {
            $spc_id = "SPC".$spc_multiply_result.$spc_last_2;
          }
          else
          {
            $spc_id = "SPC-".$spc_multiply_result.$spc_last_2;
          }

          DB::query('INSERT INTO suspense_golfers VALUES (\'\', :spc_id, :g_name, :g_nickname, :bday, :sex, :g_address, :g_city, :g_o_address, :g_o_city, :g_country, :g_zip, :g_phone, :g_hp, :g_fax, :g_ihi, :p_hi)', array(':g_name'=>$g_name, ':spc_id'=>$spc_id, ':g_nickname'=>$g_nickname, ':bday'=>$bday, ':sex'=>$sex, ':g_address'=>$g_address, ':g_city'=>$g_city, ':g_o_address'=>$g_o_address, ':g_o_city'=>$g_o_city, ':g_country'=>$g_country, ':g_zip'=>$g_zip, ':g_phone'=>$g_phone, ':g_hp'=>$g_hp, ':g_fax'=>$g_fax, ':g_ihi'=>$g_ihi, ':p_hi'=>$p_hi));
          DB::query('INSERT INTO suspense_golfer_club VALUES (\'\', :spc_id, :c_member, :c_id_no)', array(':spc_id'=>$spc_id, ':c_member'=>$c_member, ':c_id_no'=>$c_id_no));
          
          ?>
            <div class="alert alert-success fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Same Birthdate Detected, Added to Suspense List for Further Process!</strong>
            </div> 
          <?php
        }
        else
        {
          $iga_determiner = $date.$month.$year;
          $iga_constant = 18720830;
          $iga_multiplier = 100;
          $multiplier_prepare = $iga_determiner-$iga_constant;
          $multiply_result = $multiplier_prepare*$iga_multiplier;
          $last_2 = 1;

          if ($multiply_result < 0)
          {
            $iga_id = "IGA".$multiply_result.$last_2;
          }
          else
          {
            $iga_id = "IGA-".$multiply_result.$last_2;
          }

          DB::query('INSERT INTO golfers VALUES (\'\', :iga_id, :g_name, :g_nickname, :bday, :sex, :g_address, :g_city, :g_o_address, :g_o_city, :g_country, :g_zip, :g_phone, :g_hp, :g_fax, :g_ihi, :p_hi)', array(':g_name'=>$g_name, ':iga_id'=>$iga_id, ':g_nickname'=>$g_nickname, ':bday'=>$bday, ':sex'=>$sex, ':g_address'=>$g_address, ':g_city'=>$g_city, ':g_o_address'=>$g_o_address, ':g_o_city'=>$g_o_city, ':g_country'=>$g_country, ':g_zip'=>$g_zip, ':g_phone'=>$g_phone, ':g_hp'=>$g_hp, ':g_fax'=>$g_fax, ':g_ihi'=>$g_ihi, 'p_hi'=>$p_hi));
          DB::query('INSERT INTO golfer_club VALUES (\'\', :iga_id, :c_member, :c_id_no)', array(':iga_id'=>$iga_id, ':c_member'=>$c_member, ':c_id_no'=>$c_id_no));

          ?>
            <div class="alert alert-success fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Golfer Registration Success!</strong>
            </div> 
          <?php
        }   
      }
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<form action="index.php?m=newgolfer" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-member">Club Member:</label>
      </div>
      <?php
        if ($user_level == "Admin")
        {
          ?>
            <div class="col-sm-6">
              <select class="form-control" id="c-member" name="c_member">
                <?php
                  $golf_club_stmt = DB::query("SELECT * FROM golf_club ORDER BY club_code");
                  foreach ($golf_club_stmt as $golf_club) 
                  {
                    ?>
                      <option value="<?php echo $golf_club['id']; ?>"><?php echo $golf_club['club_code']." - ".$golf_club['club_name']; ?></option>
                    <?php
                  } 
                ?>
              </select>
            </div>
          <?php
        }
        else
        {
          $club_query = DB::query('SELECT id, club_code FROM golf_club WHERE club_code=:username', array(':username'=>$username));

          foreach ($club_query as $club) {
            $club_id = $club['id'];
            $club_code = $club['club_code'];
          }
          ?>
            <div class="col-sm-6">
              <input type="hidden" class="form-control" name="c_member" value="<?php echo $club_id; ?>" />
              <input type="text" class="form-control" id="c-member" value="<?php echo $club_code; ?>" disabled/>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id-no">Club ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-id-no" name="c_id_no" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-nickname">Nickname:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-nickname" name="g_nickname" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="bday">Birth Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="bday" name="bday" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-sex">Sex:</label>
      </div>
      <div class="col-sm-6">
        <label class="radio-inline"><input type="radio" name="sex" value="Male" id="g-sex" />Male</label>
        <label class="radio-inline"><input type="radio" name="sex" value="Female" id="g-sex" />Female</label>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-address">Home Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-address" name="g_address" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-city">City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-city" name="g_city" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-address">Office Address:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-address" name="g_o_address" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-o-city">Office City:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-o-city" name="g_o_city" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-country">Country:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-country" name="g_country" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-zip">Zip Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-zip" name="g_zip" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-phone">Phone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-phone" name="g_phone" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hp">Handphone:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hp" name="g_hp" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-fax">Fax:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-fax" name="g_fax" />
      </div>
    </div>
  </div>
  <div class="col-sm-12" style="background:#1E824C;padding:5px;color:#fff;">
    <div id="opt1" class="opts">
      <div class="form-group">
        <div class="col-sm-3">
          <label for="g-ihi">Initial Handicap Index:</label>
        </div>
        <div class="col-sm-6">
          <input type="hidden" class="form-control ihi-opt" name="g_ihi1" value="5.4" />
          <input type="text" class="form-control ihi-opt" name="g_ihi1" value="5.4" disabled/>
          <div class="hi-pick-box">
            <label class="radio-inline"><input type="radio" name="hi_pick" value="5.4" id="hi-pick-1" checked/>5.4</label>
            <label class="radio-inline"><input type="radio" name="hi_pick" value="15.4" id="hi-pick-2" />15.4</label>
            <label class="radio-inline"><input type="radio" name="hi_pick" value="25.4" id="hi-pick-3" />25.4</label>
          </div>
        </div>
      </div>
    </div>
    <div id="opt2" class="opts">
      <div class="form-group">
        <div class="col-sm-3">
          <label for="g-ihi2">Initial Handicap Index:</label>
        </div>
        <div class="col-sm-6">
          <input type="hidden" class="form-control ihi-opt" name="g_ihi2" />
          <input type="text" class="form-control ihi-opt" name="g_ihi2" disabled/>
          <div class="hi-pick-box">
            <label class="radio-inline"><input type="radio" name="hi_pick" value="5.4" id="hi-pick-4" />0-9</label>
            <label class="radio-inline"><input type="radio" name="hi_pick" value="15.4" id="hi-pick-5" />10-19</label>
            <label class="radio-inline"><input type="radio" name="hi_pick" value="25.4" id="hi-pick-6" />20-29</label>
          </div>
        </div>
      </div>
    </div>
    <div id="opt3" class="opts">
      <div class="form-group">
        <div class="col-sm-3">
          <label for="g-ihi3">Initial Handicap Index:</label>
        </div>
        <div class="col-sm-6">
          <input type="text" class="form-control ihi-opt" name="g_ihi3" />
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12" style="background:#1E824C;padding:5px;color:#fff;margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6" style="padding-bottom:10px;">
        <select class="form-control" id="hi-val" name="hi_val">
          <option value="opt1">By Predefined Value</option>
          <option value="opt2">By Course Handicap</option>
          <option value="opt3">By Value</option>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('.opts').hide();
    $('#opt1').show();
    $('#hi-val').change(function(){
      $('.opts').hide();
      $('#'+$(this).val()).show();
    })

    $(".hi-pick-box").on("change", function(){
      $(".ihi-opt").val($(this).find("input[type=radio]:checked").attr("value"));
    })
  });
</script>
