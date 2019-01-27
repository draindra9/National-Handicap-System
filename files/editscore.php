<?php
  if (Login::isLoggedIn() && $user_level =="User")
  {
    $score_id = isset($_GET["id"]) ? $_GET["id"] : "";

    $score_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golfer_score WHERE id=:score_id", array(':score_id'=>$score_id))[0]['exist_count'];

    if ($score_exist_check != 0)
    {

      $score_stmt = DB::query("SELECT * FROM golfer_score WHERE id=:score_id", array(":score_id"=>$score_id));

      foreach ($score_stmt as $scores) 
      {
        $date = $scores['date'];
        $type = $scores['type'];
        $s_tee = $scores['tee'];
        $c_rtg = $scores['course_rtg'];
        $s_rtg = $scores['slope_rtg'];
        $hi = $scores['h_index'];
        $ch = $scores['c_handicap'];
        $str1 = $scores['str_1'];
        $str2 = $scores['str_2'];
        $str3 = $scores['str_3'];
        $str4 = $scores['str_4'];
        $str5 = $scores['str_5'];
        $str6 = $scores['str_6'];
        $str7 = $scores['str_7'];
        $str8 = $scores['str_8'];
        $str9 = $scores['str_9'];
        $str10 = $scores['str_10'];
        $str11 = $scores['str_11'];
        $str12 = $scores['str_12'];
        $str13 = $scores['str_13'];
        $str14 = $scores['str_14'];
        $str15 = $scores['str_15'];
        $str16 = $scores['str_16'];
        $str17 = $scores['str_17'];
        $str18 = $scores['str_18'];
        $adj1 = $scores['adj_1'];
        $adj2 = $scores['adj_2'];
        $adj3 = $scores['adj_3'];
        $adj4 = $scores['adj_4'];
        $adj5 = $scores['adj_5'];
        $adj6 = $scores['adj_6'];
        $adj7 = $scores['adj_7'];
        $adj8 = $scores['adj_8'];
        $adj9 = $scores['adj_9'];
        $adj10 = $scores['adj_10'];
        $adj11 = $scores['adj_11'];
        $adj12 = $scores['adj_12'];
        $adj13 = $scores['adj_13'];
        $adj14 = $scores['adj_14'];
        $adj15 = $scores['adj_15'];
        $adj16 = $scores['adj_16'];
        $adj17 = $scores['adj_17'];
        $adj18 = $scores['adj_18'];
        $tstrout = $scores['t_str_out'];
        $tstrin = $scores['t_str_in'];
        $tadjout = $scores['t_adj_out'];
        $tadjin = $scores['t_adj_in'];
        $eagle = $scores['eagle'];
        $birdie = $scores['birdie'];
        $par = $scores['par'];
        $bogey = $scores['bogey'];
        $dbogey = $scores['double_bogey'];
        $gs = $scores['gs'];
        $ags = $scores['ags'];
      }

      $g_identity_stmt = DB::query("SELECT golfers.iga_id, golfers.name, golf_courses.id, golf_courses.course_name, golf_courses.course_id, golf_courses.i_out_1, golf_courses.i_out_2, golf_courses.i_out_3, golf_courses.i_out_4, golf_courses.i_out_5, golf_courses.i_out_6, golf_courses.i_out_7, golf_courses.i_out_8, golf_courses.i_out_9, golf_courses.i_in_10, golf_courses.i_in_11, golf_courses.i_in_12, golf_courses.i_in_13, golf_courses.i_in_14, golf_courses.i_in_15, golf_courses.i_in_16, golf_courses.i_in_17, golf_courses.i_in_18, golf_courses.p_o_1, golf_courses.p_o_2, golf_courses.p_o_3, golf_courses.p_o_4, golf_courses.p_o_5, golf_courses.p_o_6, golf_courses.p_o_7, golf_courses.p_o_8, golf_courses.p_o_9, golf_courses.p_i_10, golf_courses.p_i_11, golf_courses.p_i_12, golf_courses.p_i_13, golf_courses.p_i_14, golf_courses.p_i_15, golf_courses.p_i_16, golf_courses.p_i_17, golf_courses.p_i_18, golf_courses.total_p_o, golf_courses.total_p_i FROM golfers INNER JOIN golfer_score ON golfers.id=golfer_score.iga_u_id INNER JOIN golf_courses ON golfer_score.course_id=golf_courses.id WHERE golfer_score.id=:score_id", array(':score_id'=>$score_id));
    
      foreach ($g_identity_stmt as $g_identity) 
      {
        $iga_id = $g_identity['iga_id'];
        $name = $g_identity['name'];
        $c_name = $g_identity['course_name'];
        $c_id = $g_identity['course_id'];
        $gc_id = $g_identity['id'];
        $index1 = $g_identity['i_out_1'];
        $index2 = $g_identity['i_out_2'];
        $index3 = $g_identity['i_out_3'];
        $index4 = $g_identity['i_out_4'];
        $index5 = $g_identity['i_out_5'];
        $index6 = $g_identity['i_out_6'];
        $index7 = $g_identity['i_out_7'];
        $index8 = $g_identity['i_out_8'];
        $index9 = $g_identity['i_out_9'];
        $index10 = $g_identity['i_in_10'];
        $index11 = $g_identity['i_in_11'];
        $index12 = $g_identity['i_in_12'];
        $index13 = $g_identity['i_in_13'];
        $index14 = $g_identity['i_in_14'];
        $index15 = $g_identity['i_in_15'];
        $index16 = $g_identity['i_in_16'];
        $index17 = $g_identity['i_in_17'];
        $index18 = $g_identity['i_in_18'];
        $par1 = $g_identity['p_o_1'];
        $par2 = $g_identity['p_o_2'];
        $par3 = $g_identity['p_o_3'];
        $par4 = $g_identity['p_o_4'];
        $par5 = $g_identity['p_o_5'];                        
        $par6 = $g_identity['p_o_6'];                        
        $par7 = $g_identity['p_o_7'];                        
        $par8 = $g_identity['p_o_8'];                        
        $par9 = $g_identity['p_o_9'];                        
        $par10 = $g_identity['p_i_10'];
        $par11 = $g_identity['p_i_11'];
        $par12 = $g_identity['p_i_12'];
        $par13 = $g_identity['p_i_13'];
        $par14 = $g_identity['p_i_14'];
        $par15 = $g_identity['p_i_15'];
        $par16 = $g_identity['p_i_16'];
        $par17 = $g_identity['p_i_17'];
        $par18 = $g_identity['p_i_18'];
        $tpo = $g_identity['total_p_o'];
        $tpi = $g_identity['total_p_i'];

        $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

        foreach ($user_stmt as $user) 
        {
          $username = $user['username'];
        }

        if (isset($_POST['submit'])) 
        {
          @$s_type = $_POST['s_type'];

          if ($s_type == "")
          {
            ?>
              <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Please Specify Score's Type!</strong>
              </div> 
            <?php
          }
          else
          {
            $c_code = $_POST['course_code'];
            $s_date = $_POST['date'];
            $s_type = $_POST['s_type'];
            $tee = $_POST['tee'];
            $g_hi = $_POST['g_hi']; 
            $g_ch = $_POST['g_ch']; 
            $st_1 = $_POST['st_1'];
            $st_2 = $_POST['st_2'];
            $st_3 = $_POST['st_3'];
            $st_4 = $_POST['st_4'];
            $st_5 = $_POST['st_5'];
            $st_6 = $_POST['st_6'];
            $st_7 = $_POST['st_7'];
            $st_8 = $_POST['st_8'];
            $st_9 = $_POST['st_9'];
            $t_st_out = $_POST['t_st_out'];
            $st_10 = $_POST['st_10'];
            $st_11 = $_POST['st_11'];
            $st_12 = $_POST['st_12'];
            $st_13 = $_POST['st_13'];
            $st_14 = $_POST['st_14'];
            $st_15 = $_POST['st_15'];
            $st_16 = $_POST['st_16'];
            $st_17 = $_POST['st_17'];
            $st_18 = $_POST['st_18'];
            $t_st_in = $_POST['t_st_in'];
            $ad_1 = $_POST['ad_1'];
            $ad_2 = $_POST['ad_2'];
            $ad_3 = $_POST['ad_3'];
            $ad_4 = $_POST['ad_4'];
            $ad_5 = $_POST['ad_5'];
            $ad_6 = $_POST['ad_6'];
            $ad_7 = $_POST['ad_7'];
            $ad_8 = $_POST['ad_8'];
            $ad_9 = $_POST['ad_9'];
            $t_ad_out = $_POST['t_ad_out'];
            $ad_10 = $_POST['ad_10'];
            $ad_11 = $_POST['ad_11'];
            $ad_12 = $_POST['ad_12'];
            $ad_13 = $_POST['ad_13'];
            $ad_14 = $_POST['ad_14'];
            $ad_15 = $_POST['ad_15'];
            $ad_16 = $_POST['ad_16'];
            $ad_17 = $_POST['ad_17'];
            $ad_18 = $_POST['ad_18'];
            $t_ad_in = $_POST['t_ad_in'];
            $g_eagle = $_POST['g_eagle'];
            $g_birdie = $_POST['g_birdie'];
            $g_par = $_POST['g_par'];
            $g_bogey = $_POST['g_bogey'];
            $g_d_bogey = $_POST['g_d_bogey'];
            $g_gs = $_POST['g_gs'];
            $g_ags = $_POST['g_ags'];
            $c_rating = $_POST['c_rating'];
            $s_rating = $_POST['s_rating'];
            $esc = $g_gs-$g_ags;

            if ($c_code&&$s_date&&$s_type&&$tee&&$g_hi&&$g_ch)
            {
              $difference = $g_ags-$c_rating;
              $multiplied_difference = $difference*113;
              $pre_hcp_diff = $multiplied_difference/$s_rating;
              $hcp_diff = round($pre_hcp_diff, 1);
              $pass = $_POST['password'];

              if (password_verify($pass, DB::query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password']))
              {
                DB::query('UPDATE golfer_score SET date=:s_date, type=:s_type, course_id=:c_code, tee=:tee, course_rtg=:c_rating, slope_rtg=:s_rating, h_index=:g_hi, c_handicap=:g_ch, str_1=:st_1, str_2=:st_2, str_3=:st_3, str_4=:st_4, str_5=:st_5, str_6=:st_6, str_7=:st_7, str_8=:st_8, str_9=:st_9, str_10=:st_10, str_11=:st_11, str_12=:st_12, str_13=:st_13, str_14=:st_14, str_15=:st_15, str_16=:st_16, str_17=:st_17, str_18=:st_18, t_str_out=:t_st_out, t_str_in=:t_st_in, adj_1=:ad_1, adj_2=:ad_2, adj_3=:ad_3, adj_4=:ad_4, adj_5=:ad_5, adj_6=:ad_6, adj_7=:ad_7, adj_8=:ad_8, adj_9=:ad_9, adj_10=:ad_10, adj_11=:ad_11, adj_12=:ad_12, adj_13=:ad_13, adj_14=:ad_14, adj_15=:ad_15, adj_16=:ad_16, adj_17=:ad_17, adj_18=:ad_18, t_adj_out=:t_ad_out, t_adj_in=:t_ad_in, eagle=:g_eagle, birdie=:g_birdie, par=:g_par, bogey=:g_bogey, double_bogey=:g_d_bogey, gs=:g_gs, ags=:g_ags, esc=:esc, hcp_diff=:hcp_diff WHERE id=:score_id', array(':s_date'=>$s_date, ':s_type'=>$s_type, ':c_code'=>$c_code, ':tee'=>$tee, 'c_rating'=>$c_rating, 's_rating'=>$s_rating, ':g_hi'=>$g_hi, ':g_ch'=>$g_ch, ':st_1'=>$st_1, ':st_2'=>$st_2, ':st_3'=>$st_3, ':st_4'=>$st_4, ':st_5'=>$st_5, ':st_6'=>$st_6, ':st_7'=>$st_7, ':st_8'=>$st_8, ':st_9'=>$st_9, ':st_10'=>$st_10, ':st_11'=>$st_11, ':st_12'=>$st_12, ':st_13'=>$st_13, ':st_14'=>$st_14, ':st_15'=>$st_15, ':st_16'=>$st_16, ':st_17'=>$st_17, ':st_18'=>$st_18, ':t_st_out'=>$t_st_out, ':t_st_in'=>$t_st_in, ':ad_1'=>$ad_1, ':ad_2'=>$ad_2, ':ad_3'=>$ad_3, ':ad_4'=>$ad_4, ':ad_5'=>$ad_5, ':ad_6'=>$ad_6, ':ad_7'=>$ad_7, ':ad_8'=>$ad_8, ':ad_9'=>$ad_9, ':ad_10'=>$ad_10, ':ad_11'=>$ad_11, ':ad_12'=>$ad_12, ':ad_13'=>$ad_13, ':ad_14'=>$ad_14, ':ad_15'=>$ad_15, ':ad_16'=>$ad_16, ':ad_17'=>$ad_17, ':ad_18'=>$ad_18, ':t_ad_out'=>$t_ad_out, ':t_ad_in'=>$t_ad_in, ':g_eagle'=>$g_eagle, ':g_birdie'=>$g_birdie, ':g_par'=>$g_par, ':g_bogey'=>$g_bogey, ':g_d_bogey'=>$g_d_bogey, ':g_gs'=>$g_gs, ':g_ags'=>$g_ags, ':esc'=>$esc, ':hcp_diff'=>$hcp_diff, ':score_id'=>$score_id));

                header("location:index.php?m=scores&result=score_edited"); 
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
            else
            {
              ?>
                <div class="alert alert-danger fade in alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                  <strong>Please Complete All Golfer's Identitiy!</strong>
                </div> 
              <?php
            }
          } 
        }
      }
    }
    else
    {
      die("Score doesn't exist!");
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
        <input type="hidden" class="form-control" id="g-u-id" name="g_u_id" />
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
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $name; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="date">Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="date" name="date" value="<?php echo $date; ?>" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="s-type">Type:</label>
      </div>
      <div class="col-sm-6">
        <?php
          if ($type == "Regular")
          {
            ?>
              <label class="radio-inline"><input type="radio" name="s_type" id="s-type" value="Regular" checked/>Regular</label>
              <label class="radio-inline"><input type="radio" name="s_type" id="s-type" value="Tournament" />Tournament</label>
            <?php
          }
          else
          {
            ?>
              <label class="radio-inline"><input type="radio" name="s_type" id="s-type" value="Regular" />Regular</label>
              <label class="radio-inline"><input type="radio" name="s_type" id="s-type" value="Tournament" checked/>Tournament</label>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id">Course Code:</label>
      </div>
      <div class="col-sm-6">
        <div class="input-group">
          <input type="hidden" class="form-control" id="course-code" name="course_code" value="<?php echo $gc_id; ?>" />
          <input type="text" class="form-control" id="c-id" name="c_id" value="<?php echo $c_id; ?>" readonly/>
          <span class="input-group-addon" data-toggle="modal" data-target="#selectCourse" style="background:#C8F7C5;color:#000;cursor:pointer;cursor:hand;"><i class="fa fa-flag-o fa-fw"></i></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-course">Golf Course:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-course" name="g_course" value="<?php echo $c_name; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="tee">Tee:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="tee" name="tee">
          <?php
            if ($s_tee == "Black")
            {
              ?>
                <option>Select Tee</option>
                <option value="Black" selected>Black</option>
                <option value="Blue">Blue</option>
                <option value="White">White</option>
                <option value="White Lady">White Lady</option>
                <option value="Red">Red</option>
              <?php
            }
            else if ($s_tee == "Blue")
            {
              ?>
                <option>Select Tee</option>
                <option value="Black">Black</option>
                <option value="Blue" selected>Blue</option>
                <option value="White">White</option>
                <option value="White Lady">White Lady</option>
                <option value="Red">Red</option>
              <?php
            }
            else if ($s_tee == "White")
            {
              ?>
                <option>Select Tee</option>
                <option value="Black">Black</option>
                <option value="Blue">Blue</option>
                <option value="White" selected>White</option>
                <option value="White Lady">White Lady</option>
                <option value="Red">Red</option>
              <?php
            }
            else if ($s_tee == "White Lady")
            {
              ?>
                <option>Select Tee</option>
                <option value="Black">Black</option>
                <option value="Blue">Blue</option>
                <option value="White">White</option>
                <option value="White Lady" selected>White Lady</option>
                <option value="Red">Red</option>
              <?php
            }
            else
            {
              ?>
                <option>Select Tee</option>
                <option value="Black">Black</option>
                <option value="Blue">Blue</option>
                <option value="White">White</option>
                <option value="White Lady">White Lady</option>
                <option value="Red" selected>Red</option>
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
        <label for="c-rating">Course Rating:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-rating" name="c_rating" placeholder="Please choose course's tee" value="<?php echo $c_rtg; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-srating">Slope Rating:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="s-rating" name="s_rating" placeholder="Please choose course's tee" value="<?php echo $s_rtg; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hi">Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hi" name="g_hi" value="<?php echo $hi; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-ch">Course Handicap:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-ch" name="g_ch" value="<?php echo $ch; ?>" readonly/>
      </div>
    </div>
  </div>
  <div class="col-sm-12" style="padding:5px;margin-bottom:5px;margin-top:5px;">
    <div class="table-responsive">          
      <table id="score" class="table table-striped table-condensed">
        <thead>
          <tr>
            <th>Hole</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>Out</th>
            <th>Hole</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
            <th>In</th>                    
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Index Out</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td></td>
            <td>Index In</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td></td>   
          </tr>
          <tr>
            <td>Par Out</td>
            <td><input type="text" class="form-control input-xs" id="p-o-1" maxlength="2" style="width:28px;" value="<?php echo $par1; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-2" maxlength="2" style="width:28px;" value="<?php echo $par2; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-3" maxlength="2" style="width:28px;" value="<?php echo $par3; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-4" maxlength="2" style="width:28px;" value="<?php echo $par4; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-5" maxlength="2" style="width:28px;" value="<?php echo $par5; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-6" maxlength="2" style="width:28px;" value="<?php echo $par6; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-7" maxlength="2" style="width:28px;" value="<?php echo $par7; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-8" maxlength="2" style="width:28px;" value="<?php echo $par8; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-o-9" maxlength="2" style="width:28px;" value="<?php echo $par9; ?>"disabled/></td>
            <td><input type="text" class="form-control input-xs" id="t-p-out" maxlength="2" style="width:28px;" value="<?php echo $tpo; ?>" disabled/></td>
            <td>Par In</td>
            <td><input type="text" class="form-control input-xs" id="p-i-10" maxlength="2" style="width:28px;" value="<?php echo $par10; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-11" maxlength="2" style="width:28px;" value="<?php echo $par11; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-12" maxlength="2" style="width:28px;" value="<?php echo $par12; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-13" maxlength="2" style="width:28px;" value="<?php echo $par13; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-14" maxlength="2" style="width:28px;" value="<?php echo $par14; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-15" maxlength="2" style="width:28px;" value="<?php echo $par15; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-16" maxlength="2" style="width:28px;" value="<?php echo $par16; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-17" maxlength="2" style="width:28px;" value="<?php echo $par17; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="p-i-18" maxlength="2" style="width:28px;" value="<?php echo $par18; ?>" disabled/></td>
            <td><input type="text" class="form-control input-xs" id="t-p-in" maxlength="2" style="width:28px;" value="<?php echo $tpi; ?>" disabled/></td>  
          </tr>
          <tr>
            <td>Strokes</td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-1" name="st_1" maxlength="2" style="width:28px;" value="<?php echo $str1; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-2" name="st_2" maxlength="2" style="width:28px;" value="<?php echo $str2; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-3" name="st_3" maxlength="2" style="width:28px;" value="<?php echo $str3; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-4" name="st_4" maxlength="2" style="width:28px;" value="<?php echo $str4; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-5" name="st_5" maxlength="2" style="width:28px;" value="<?php echo $str5; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-6" name="st_6" maxlength="2" style="width:28px;" value="<?php echo $str6; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-7" name="st_7" maxlength="2" style="width:28px;" value="<?php echo $str7; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-8" name="st_8" maxlength="2" style="width:28px;" value="<?php echo $str8; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-out count-strokes" id="st-9" name="st_9" maxlength="2" style="width:28px;" value="<?php echo $str9; ?>" /></td>
            <td><input type="text" class="form-control input-xs" id="total-st-out" name="t_st_out" maxlength="2" style="width:28px;" value="<?php echo $tstrout; ?>" readonly/></td>
            <td>Strokes</td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-10" name="st_10" maxlength="2" style="width:28px;" value="<?php echo $str10; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-11" name="st_11" maxlength="2" style="width:28px;" value="<?php echo $str11; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-12" name="st_12" maxlength="2" style="width:28px;" value="<?php echo $str12; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-13" name="st_13" maxlength="2" style="width:28px;" value="<?php echo $str13; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-14" name="st_14" maxlength="2" style="width:28px;" value="<?php echo $str14; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-15" name="st_15" maxlength="2" style="width:28px;" value="<?php echo $str15; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-16" name="st_16" maxlength="2" style="width:28px;" value="<?php echo $str16; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-17" name="st_17" maxlength="2" style="width:28px;" value="<?php echo $str17; ?>" /></td>
            <td><input type="text" class="form-control input-xs count-strokes-in count-strokes" id="st-18" name="st_18" maxlength="2" style="width:28px;" value="<?php echo $str18; ?>" /></td>
            <td><input type="text" class="form-control input-xs" id="total-st-in" name="t_st_in" maxlength="2" style="width:28px;" value="<?php echo $tstrin; ?>" readonly/></td>
          </tr>
          <tr>
            <td>Adjust Out</td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-1" name="ad_1" maxlength="2" style="width:28px;" value="<?php echo $adj1; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-2" name="ad_2" maxlength="2" style="width:28px;" value="<?php echo $adj2; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-3" name="ad_3" maxlength="2" style="width:28px;" value="<?php echo $adj3; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-4" name="ad_4" maxlength="2" style="width:28px;" value="<?php echo $adj4; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-5" name="ad_5" maxlength="2" style="width:28px;" value="<?php echo $adj5; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-6" name="ad_6" maxlength="2" style="width:28px;" value="<?php echo $adj6; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-7" name="ad_7" maxlength="2" style="width:28px;" value="<?php echo $adj7; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-8" name="ad_8" maxlength="2" style="width:28px;" value="<?php echo $adj8; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-out ad" id="ad-9" name="ad_9" maxlength="2" style="width:28px;" value="<?php echo $adj9; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs" id="total-ad-out" name="t_ad_out" maxlength="2" style="width:28px;" value="<?php echo $tadjout; ?>" readonly/></td>
            <td>Adjust In</td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-10" name="ad_10" maxlength="2" style="width:28px;" value="<?php echo $adj10; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-11" name="ad_11" maxlength="2" style="width:28px;" value="<?php echo $adj11; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-12" name="ad_12" maxlength="2" style="width:28px;" value="<?php echo $adj12; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-13" name="ad_13" maxlength="2" style="width:28px;" value="<?php echo $adj13; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-14" name="ad_14" maxlength="2" style="width:28px;" value="<?php echo $adj14; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-15" name="ad_15" maxlength="2" style="width:28px;" value="<?php echo $adj15; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-16" name="ad_16" maxlength="2" style="width:28px;" value="<?php echo $adj16; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-17" name="ad_17" maxlength="2" style="width:28px;" value="<?php echo $adj17; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs ad-in ad" id="ad-18" name="ad_18" maxlength="2" style="width:28px;" value="<?php echo $adj18; ?>" readonly/></td>
            <td><input type="text" class="form-control input-xs" id="total-ad-in" name="t_ad_in" maxlength="2" style="width:28px;" value="<?php echo $tadjin; ?>" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-4" style="background:#68C3A3;padding:5px;margin-bottom:20px;color:#000;">
    <center>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-eagle">Eagle:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-eagle" name="g_eagle" value="<?php echo $eagle; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-birdie">Birdie:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-birdie" name="g_birdie" value="<?php echo $birdie; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-par">Par:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-par" name="g_par" value="<?php echo $par; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-bogey">Bogey:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-bogey" name="g_bogey" value="<?php echo $bogey; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-d-bogey">Double Bogey:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-d-bogey" name="g_d_bogey" value="<?php echo $dbogey; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-gs">Gross Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-gs" name="g_gs" value="<?php echo $gs; ?>" readonly/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-ags">Adjusted Gross Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-ags" name="g_ags" value="<?php echo $ags; ?>" readonly/>
        </div>
      </div>
    </center>
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
      <input type="submit" class="btn btn-danger" value="Submit" name="submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="selectCourse" role="dialog">
    <div class="modal-dialog"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#019875;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
          <h4 class="modal-title">Select Course</h4>
        </div>
        <div class="modal-body" style="background:#C8F7C5" >
          <div class="table-responsive">          
            <table id="courses" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>ID</th>
                  <th>PAR OUT</th>
                  <th>PAR IN</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $courses_stmt = DB::query("SELECT * FROM golf_courses ORDER BY id");
                  foreach ($courses_stmt as $courses) 
                  {
                    ?>
                      <tr>
                        <td><?php echo $courses['course_name']; ?></td>
                        <td><?php echo $courses['course_id']; ?></td>
                        <td><?php echo $courses['total_p_o']; ?></td>
                        <td><?php echo $courses['total_p_i']; ?></td>
                        <td><button type="button" class="btn btn-danger choosecourse" value="<?php echo $courses['id']; ?>">Select</button></td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer" style="background:#019875;color:#fff;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('#courses').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });

    $('.choosecourse').each(function(){
      $(this).on('click', function(){
        $('.count-strokes-out, .count-strokes-in').prop("readonly", false);
        var course_id = $(this).val();
        $('#course-code').val(course_id)
        $.ajax({
          type: "GET",
          url: "files/ajax/golfcourses.ajax.php",
          data: 'id='+course_id,
          success: function(data){
            var course_json = data;
            course_obj = JSON.parse(course_json);
            $('#c-id').val(course_obj.course_code);
            $('#g-course').val(course_obj.course_name);
            $('#p-o-1').val(course_obj.p_o_1);
            $('#p-o-2').val(course_obj.p_o_2);
            $('#p-o-3').val(course_obj.p_o_3);
            $('#p-o-4').val(course_obj.p_o_4);
            $('#p-o-5').val(course_obj.p_o_5);
            $('#p-o-6').val(course_obj.p_o_6);
            $('#p-o-7').val(course_obj.p_o_7);
            $('#p-o-8').val(course_obj.p_o_8);
            $('#p-o-9').val(course_obj.p_o_9);
            $('#t-p-out').val(course_obj.t_p_o);
            $('#p-i-10').val(course_obj.p_i_10);
            $('#p-i-11').val(course_obj.p_i_11);
            $('#p-i-12').val(course_obj.p_i_12);
            $('#p-i-13').val(course_obj.p_i_13);
            $('#p-i-14').val(course_obj.p_i_14);
            $('#p-i-15').val(course_obj.p_i_15);
            $('#p-i-16').val(course_obj.p_i_16);
            $('#p-i-17').val(course_obj.p_i_17);
            $('#p-i-18').val(course_obj.p_i_18);
            $('#t-p-in').val(course_obj.t_p_i);

            $('.count-strokes, #total-st-out, #total-st-in, .ad-out, .ad-in, #total-ad-out, #total-ad-in, #g-gs, #g-ags, #g-eagle, #g-birdie, #g-par, #g-bogey, #g-d-bogey').val(0);

            $('#tee').on('change', function(){
              var teebox = $(this).val();
              if(teebox=="Black"){
                $('#c-rating').val(course_obj.cr_black);
                $('#s-rating').val(course_obj.sr_black);
              }
              else if(teebox=="Blue"){
                $('#c-rating').val(course_obj.cr_blue);
                $('#s-rating').val(course_obj.sr_blue);
              }
              else if(teebox=="White"){
                $('#c-rating').val(course_obj.cr_white);
                $('#s-rating').val(course_obj.sr_white);
              }
              else if(teebox=="White Lady"){
                $('#c-rating').val(course_obj.cr_white_l);
                $('#s-rating').val(course_obj.sr_white_l);
              }
              else if(teebox=="Red"){
                $('#c-rating').val(course_obj.cr_red);
                $('#s-rating').val(course_obj.sr_red);
              }
              else{
                $('#c-rating').val("");
                $('#s-rating').val("");
              }

              var hi = $('#g-hi').val();
              var slopertg = $('#s-rating').val();
              var coursehcp = Math.round((hi*slopertg)/113);
              $('#g-ch').val(coursehcp);

              $('.count-strokes, #total-st-out, #total-st-in, .ad-out, .ad-in, #total-ad-out, #total-ad-in, #g-gs, #g-ags, #g-eagle, #g-birdie, #g-par, #g-bogey, #g-d-bogey').val(0);
            });
          }
        });
        $('#selectCourse').modal('toggle'); 
      });
    });

    $(document).on("change", ".count-strokes-out", function(){
      var sum = 0;
      $(".count-strokes-out").each(function(){
        sum += +parseInt($(this).val(), 10);
      });
      $("#total-st-out").val(sum);

      var sum3 = 0;
      $(".ad-out").each(function(){
        sum3 += +parseInt($(this).val(), 10);
      });
      $("#total-ad-out").val(sum3);
    });

    $(document).on("change", ".count-strokes-in", function(){
      var sum2 = 0;
      $(".count-strokes-in").each(function(){
        sum2 += +parseInt($(this).val(), 10);
      });
      $("#total-st-in").val(sum2);

      var sum4 = 0;
      $(".ad-in").each(function(){
        sum4 += +parseInt($(this).val(), 10);
      });
      $("#total-ad-in").val(sum4);
    });

    $(document).on("change", ".count-strokes", function(){
      var sum5 = 0;
      $(".count-strokes").each(function(){
        sum5 += +parseInt($(this).val(), 10);
      });
      $("#g-gs").val(sum5);

      var sum6 = 0;
      $(".ad").each(function(){
        sum6 += +parseInt($(this).val(), 10);
      });
      $("#g-ags").val(sum6);

      var sum6 = 0;
      var net = 0;
      $(".ad").each(function(){
        sum6 += +parseInt($(this).val(), 10);
      });
      $("#g-ags").val(sum6);
    });          

    $('#st-1, #st-2, #st-3, #st-4, #st-5, #st-6, #st-7, #st-8, #st-9, #st-10, #st-11, #st-12, #st-13, #st-14, #st-15, #st-16, #st-17, #st-18').change(function(){
      var ch = $('#g-ch').val();
      var adj_param = 0;
      var adjusted = 0;

      if(ch<10)
      {
        if($('#st-1').val()>parseInt($('#p-o-1').val())+2)
        {
          adjusted = parseInt($('#p-o-1').val())+2;
          $('#ad-1').val(adjusted);
        }
        else
        {
          $('#ad-1').val($('#st-1').val());
        }

        if($('#st-2').val()>parseInt($('#p-o-2').val())+2)
        {
          adjusted = parseInt($('#p-o-2').val())+2;
          $('#ad-2').val(adjusted);
        }
        else
        {
          $('#ad-2').val($('#st-2').val());
        }

        if($('#st-3').val()>parseInt($('#p-o-3').val())+2)
        {
          adjusted = parseInt($('#p-o-3').val())+2;
          $('#ad-3').val(adjusted);
        }
        else
        {
          $('#ad-3').val($('#st-3').val());
        }

        if($('#st-4').val()>parseInt($('#p-o-4').val())+2)
        {
          adjusted = parseInt($('#p-o-4').val())+2;
          $('#ad-4').val(adjusted);
        }
        else
        {
          $('#ad-4').val($('#st-4').val());
        }

        if($('#st-5').val()>parseInt($('#p-o-5').val())+2)
        {
          adjusted = parseInt($('#p-o-5').val())+2;
          $('#ad-5').val(adjusted);
        }
        else
        {
          $('#ad-5').val($('#st-5').val());
        }

        if($('#st-6').val()>parseInt($('#p-o-6').val())+2)
        {
          adjusted = parseInt($('#p-o-6').val())+2;
          $('#ad-6').val(adjusted);
        }
        else
        {
          $('#ad-6').val($('#st-6').val());
        }

        if($('#st-7').val()>parseInt($('#p-o-7').val())+2)
        {
          adjusted = parseInt($('#p-o-7').val())+2;
          $('#ad-7').val(adjusted);
        }
        else
        {
          $('#ad-7').val($('#st-7').val());
        }

        if($('#st-8').val()>parseInt($('#p-o-8').val())+2)
        {
          adjusted = parseInt($('#p-o-8').val())+2;
          $('#ad-8').val(adjusted);
        }
        else
        {
          $('#ad-8').val($('#st-8').val());
        }

        if($('#st-9').val()>parseInt($('#p-o-9').val())+2)
        {
          adjusted = parseInt($('#p-o-9').val())+2;
          $('#ad-9').val(adjusted);
        }
        else
        {
          $('#ad-9').val($('#st-9').val());
        }

        if($('#st-10').val()>parseInt($('#p-i-10').val())+2)
        {
          adjusted = parseInt($('#p-i-10').val())+2;
          $('#ad-10').val(adjusted);
        }
        else
        {
          $('#ad-10').val($('#st-10').val());
        }

        if($('#st-11').val()>parseInt($('#p-i-11').val())+2)
        {
          adjusted = parseInt($('#p-i-11').val())+2;
          $('#ad-11').val(adjusted);
        }
        else
        {
          $('#ad-11').val($('#st-11').val());
        }

        if($('#st-12').val()>parseInt($('#p-i-12').val())+2)
        {
          adjusted = parseInt($('#p-i-12').val())+2;
          $('#ad-12').val(adjusted);
        }
        else
        {
          $('#ad-12').val($('#st-12').val());
        }

        if($('#st-13').val()>parseInt($('#p-i-13').val())+2)
        {
          adjusted = parseInt($('#p-i-13').val())+2;
          $('#ad-13').val(adjusted);
        }
        else
        {
          $('#ad-13').val($('#st-13').val());
        }

        if($('#st-14').val()>parseInt($('#p-i-14').val())+2)
        {
          adjusted = parseInt($('#p-i-14').val())+2;
          $('#ad-14').val(adjusted);
        }
        else
        {
          $('#ad-14').val($('#st-14').val());
        }

        if($('#st-15').val()>parseInt($('#p-i-15').val())+2)
        {
          adjusted = parseInt($('#p-i-15').val())+2;
          $('#ad-15').val(adjusted);
        }
        else
        {
          $('#ad-15').val($('#st-15').val());
        }

        if($('#st-16').val()>parseInt($('#p-i-16').val())+2)
        {
          adjusted = parseInt($('#p-i-16').val())+2;
          $('#ad-16').val(adjusted);
        }
        else
        {
          $('#ad-16').val($('#st-16').val());
        }

        if($('#st-17').val()>parseInt($('#p-i-17').val())+2)
        {
          adjusted = parseInt($('#p-i-17').val())+2;
          $('#ad-17').val(adjusted);
        }
        else
        {
          $('#ad-17').val($('#st-17').val());
        }

        if($('#st-18').val()>parseInt($('#p-i-18').val())+2)
        {
          adjusted = parseInt($('#p-i-18').val())+2;
          $('#ad-18').val(adjusted);
        }
        else
        {
          $('#ad-18').val($('#st-18').val());
        }
      }
      else
      {
        if(ch>=10 && ch<=19)
        {
          adj_param = 7;
        }
        else if(ch>=20 && ch<=29)
        {
          adj_param = 8;
        }
        else if(ch>=30 && ch<=39)
        {
          adj_param = 9;
        }
        else if(ch>39)
        {
          adj_param = 10;
        }
        else
        {
          adj_param = 0;
        }

        if($('#st-1').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-1').val(adjusted);
        }
        else
        {
          $('#ad-1').val($('#st-1').val());
        }

        if($('#st-2').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-2').val(adjusted);
        }
        else
        {
          $('#ad-2').val($('#st-2').val());
        }

        if($('#st-3').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-3').val(adjusted);
        }
        else
        {
          $('#ad-3').val($('#st-3').val());
        }

        if($('#st-4').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-4').val(adjusted);
        }
        else
        {
          $('#ad-4').val($('#st-4').val());
        }

        if($('#st-5').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-5').val(adjusted);
        }
        else
        {
          $('#ad-5').val($('#st-5').val());
        }

        if($('#st-6').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-6').val(adjusted);
        }
        else
        {
          $('#ad-6').val($('#st-6').val());
        }

        if($('#st-7').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-7').val(adjusted);
        }
        else
        {
          $('#ad-7').val($('#st-7').val());
        }

        if($('#st-8').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-8').val(adjusted);
        }
        else
        {
          $('#ad-8').val($('#st-8').val());
        }

        if($('#st-9').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-9').val(adjusted);
        }
        else
        {
          $('#ad-9').val($('#st-9').val());
        }

        if($('#st-10').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-10').val(adjusted);
        }
        else
        {
          $('#ad-10').val($('#st-10').val());
        }

        if($('#st-11').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-11').val(adjusted);
        }
        else
        {
          $('#ad-11').val($('#st-11').val());
        }

        if($('#st-12').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-12').val(adjusted);
        }
        else
        {
          $('#ad-12').val($('#st-12').val());
        }

        if($('#st-13').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-13').val(adjusted);
        }
        else
        {
          $('#ad-13').val($('#st-13').val());
        }

        if($('#st-14').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-14').val(adjusted);
        }
        else
        {
          $('#ad-14').val($('#st-14').val());
        }

        if($('#st-15').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-15').val(adjusted);
        }
        else
        {
          $('#ad-15').val($('#st-15').val());
        }

        if($('#st-16').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-16').val(adjusted);
        }
        else
        {
          $('#ad-16').val($('#st-16').val());
        }

        if($('#st-17').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-17').val(adjusted);
        }
        else
        {
          $('#ad-17').val($('#st-17').val());
        }

        if($('#st-18').val()>adj_param)
        {
          adjusted = adj_param;
          $('#ad-18').val(adjusted);
        }
        else
        {
          $('#ad-18').val($('#st-18').val());
        }
      }

      $('.count-strokes').each(function(){
        var net_1 = $('#st-1').val()-$('#p-o-1').val(), 
        net_2 = $('#st-2').val()-$('#p-o-2').val(), 
        net_3 = $('#st-3').val()-$('#p-o-3').val(), 
        net_4 = $('#st-4').val()-$('#p-o-4').val(), 
        net_5 = $('#st-5').val()-$('#p-o-5').val(), 
        net_6 = $('#st-6').val()-$('#p-o-6').val(), 
        net_7 = $('#st-7').val()-$('#p-o-7').val(), 
        net_8 = $('#st-8').val()-$('#p-o-8').val(), 
        net_9 = $('#st-9').val()-$('#p-o-9').val(), 
        net_10 = $('#st-10').val()-$('#p-i-10').val(), 
        net_11 = $('#st-11').val()-$('#p-i-11').val(), 
        net_12 = $('#st-12').val()-$('#p-i-12').val(), 
        net_13 = $('#st-13').val()-$('#p-i-13').val(), 
        net_14 = $('#st-14').val()-$('#p-i-14').val(), 
        net_15 = $('#st-15').val()-$('#p-i-15').val(), 
        net_16 = $('#st-16').val()-$('#p-i-16').val(), 
        net_17 = $('#st-17').val()-$('#p-i-17').val(), 
        net_18 = $('#st-18').val()-$('#p-i-18').val();

        var countEagle = 0, countBirdie = 0, countPar = 0, countBogey = 0, countDoubleBogey = 0;

        switch(net_1)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_2)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_3)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_4)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_5)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_6)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_7)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_8)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_9)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_10)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_11)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_12)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_13)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_14)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_15)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_16)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_17)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        switch(net_18)
        {
          case -2:
            countEagle++; 
            break;
          case -1:
            countBirdie++;
            break;
          case 0:
            countPar++;
            break;
          case 1:
            countBogey++;
            break;
          case 2:
            countDoubleBogey++;
            break;
          default:
            '';
        }

        $('#g-eagle').val(countEagle);
        $('#g-birdie').val(countBirdie);
        $('#g-par').val(countPar);
        $('#g-bogey').val(countBogey);
        $('#g-d-bogey').val(countDoubleBogey);
      });
    });
  });
</script>