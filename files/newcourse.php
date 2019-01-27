<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level =="Admin")
  {
    if (isset($_POST['submit'])) 
    {
      $c_code = $_POST['c_id'];
      $c_name = $_POST['c_name'];
      $abb_name = $_POST['abb_name'];
      $loc = $_POST['loc'];
      $par_out_1 = $_POST['par_out_1'];
      $par_out_2 = $_POST['par_out_2'];
      $par_out_3 = $_POST['par_out_3'];
      $par_out_4 = $_POST['par_out_4'];
      $par_out_5 = $_POST['par_out_5'];
      $par_out_6 = $_POST['par_out_6'];
      $par_out_7 = $_POST['par_out_7'];
      $par_out_8 = $_POST['par_out_8'];
      $par_out_9 = $_POST['par_out_9'];
      $t_par_out = $_POST['t_par_out'];
      $par_in_10 = $_POST['par_in_10'];
      $par_in_11 = $_POST['par_in_11'];
      $par_in_12 = $_POST['par_in_12'];
      $par_in_13 = $_POST['par_in_13'];
      $par_in_14 = $_POST['par_in_14'];
      $par_in_15 = $_POST['par_in_15'];
      $par_in_16 = $_POST['par_in_16'];
      $par_in_17 = $_POST['par_in_17'];
      $par_in_18 = $_POST['par_in_18'];
      $t_par_in = $_POST['t_par_in'];
      $i_type = $_POST['i_type'];
      if ($i_type == "opt1")
      {
        $i_out_1 = $_POST['i_out_1_opt1'];
        $i_out_2 = $_POST['i_out_2_opt1'];
        $i_out_3 = $_POST['i_out_3_opt1'];
        $i_out_4 = $_POST['i_out_4_opt1'];
        $i_out_5 = $_POST['i_out_5_opt1'];
        $i_out_6 = $_POST['i_out_6_opt1'];
        $i_out_7 = $_POST['i_out_7_opt1'];
        $i_out_8 = $_POST['i_out_8_opt1'];
        $i_out_9 = $_POST['i_out_9_opt1'];
        $i_in_10 = $_POST['i_in_10_opt1'];
        $i_in_11 = $_POST['i_in_11_opt1'];
        $i_in_12 = $_POST['i_in_12_opt1'];
        $i_in_13 = $_POST['i_in_13_opt1'];
        $i_in_14 = $_POST['i_in_14_opt1'];
        $i_in_15 = $_POST['i_in_15_opt1'];
        $i_in_16 = $_POST['i_in_16_opt1'];
        $i_in_17 = $_POST['i_in_17_opt1'];
        $i_in_18 = $_POST['i_in_18_opt1'];
      }
      elseif ($i_type == "opt2")
      {
        $i_out_1 = $_POST['i_out_1_opt2'];
        $i_out_2 = $_POST['i_out_2_opt2'];
        $i_out_3 = $_POST['i_out_3_opt2'];
        $i_out_4 = $_POST['i_out_4_opt2'];
        $i_out_5 = $_POST['i_out_5_opt2'];
        $i_out_6 = $_POST['i_out_6_opt2'];
        $i_out_7 = $_POST['i_out_7_opt2'];
        $i_out_8 = $_POST['i_out_8_opt2'];
        $i_out_9 = $_POST['i_out_9_opt2'];
        $i_in_10 = $_POST['i_in_10_opt2'];
        $i_in_11 = $_POST['i_in_11_opt2'];
        $i_in_12 = $_POST['i_in_12_opt2'];
        $i_in_13 = $_POST['i_in_13_opt2'];
        $i_in_14 = $_POST['i_in_14_opt2'];
        $i_in_15 = $_POST['i_in_15_opt2'];
        $i_in_16 = $_POST['i_in_16_opt2'];
        $i_in_17 = $_POST['i_in_17_opt2'];
        $i_in_18 = $_POST['i_in_18_opt2'];
      }
      else
      {
        $i_out_1 = $_POST['i_out_1_opt3'];
        $i_out_2 = $_POST['i_out_2_opt3'];
        $i_out_3 = $_POST['i_out_3_opt3'];
        $i_out_4 = $_POST['i_out_4_opt3'];
        $i_out_5 = $_POST['i_out_5_opt3'];
        $i_out_6 = $_POST['i_out_6_opt3'];
        $i_out_7 = $_POST['i_out_7_opt3'];
        $i_out_8 = $_POST['i_out_8_opt3'];
        $i_out_9 = $_POST['i_out_9_opt3'];
        $i_in_10 = $_POST['i_in_10_opt3'];
        $i_in_11 = $_POST['i_in_11_opt3'];
        $i_in_12 = $_POST['i_in_12_opt3'];
        $i_in_13 = $_POST['i_in_13_opt3'];
        $i_in_14 = $_POST['i_in_14_opt3'];
        $i_in_15 = $_POST['i_in_15_opt3'];
        $i_in_16 = $_POST['i_in_16_opt3'];
        $i_in_17 = $_POST['i_in_17_opt3'];
        $i_in_18 = $_POST['i_in_18_opt3'];
      }
      $s_system = $_POST['s_system'];
      if ($s_system == "pre-slope")
      {
        $cr_black = 0;
        $sr_black = 113;
        $cr_blue = 0;
        $sr_blue = 113;
        $cr_white = 0;
        $sr_white = 113;
        $cr_white_lady = 0;
        $sr_white_lady = 113;
        $cr_red = 0;
        $sr_red = 113;
      }
      else
      {
        $cr_black = $_POST['cr_black'];
        $sr_black = $_POST['sr_black'];
        $cr_blue = $_POST['cr_blue'];
        $sr_blue = $_POST['sr_blue'];
        $cr_white = $_POST['cr_white'];
        $sr_white = $_POST['sr_white'];
        $cr_white_lady = $_POST['cr_white_lady'];
        $sr_white_lady = $_POST['sr_white_lady'];
        $cr_red = $_POST['cr_red'];
        $sr_red = $_POST['sr_red'];
      }

      if (!DB::query('SELECT course_id FROM golf_courses WHERE course_id=:c_code', array(':c_code'=>$c_code)))
      {
        DB::query('INSERT INTO golf_courses VALUES (\'\', :c_code, :c_name, :abb_name, :loc, :par_out_1, :par_out_2, :par_out_3, :par_out_4, :par_out_5, :par_out_6, :par_out_7, :par_out_8, :par_out_9, :par_in_10, :par_in_11, :par_in_12, :par_in_13, :par_in_14, :par_in_15, :par_in_16, :par_in_17, :par_in_18, :t_par_out, :t_par_in, :i_out_1, :i_out_2, :i_out_3, :i_out_4, :i_out_5, :i_out_6, :i_out_7, :i_out_8, :i_out_9, :i_in_10, :i_in_11, :i_in_12, :i_in_13, :i_in_14, :i_in_15, :i_in_16, :i_in_17, :i_in_18, :cr_black, :cr_blue, :cr_white, :cr_white_lady, :cr_red, :sr_black, :sr_blue, :sr_white, :sr_white_lady, :sr_red, :s_system)', array(':c_code'=>$c_code, ':c_name'=>$c_name, ':abb_name'=>$abb_name, ':loc'=>$loc, ':par_out_1'=>$par_out_1, ':par_out_2'=>$par_out_2, ':par_out_3'=>$par_out_3, ':par_out_4'=>$par_out_4, ':par_out_5'=>$par_out_5, ':par_out_6'=>$par_out_6, ':par_out_7'=>$par_out_7, ':par_out_8'=>$par_out_8, ':par_out_9'=>$par_out_9, ':par_in_10'=>$par_in_10, ':par_in_11'=>$par_in_11, ':par_in_12'=>$par_in_12, ':par_in_13'=>$par_in_13, ':par_in_14'=>$par_in_14, ':par_in_15'=>$par_in_15, ':par_in_16'=>$par_in_16, ':par_in_17'=>$par_in_17, ':par_in_18'=>$par_in_18, ':t_par_out'=>$t_par_out, ':t_par_in'=>$t_par_in, ':i_out_1'=>$i_out_1, ':i_out_2'=>$i_out_2, ':i_out_3'=>$i_out_3, ':i_out_4'=>$i_out_4, ':i_out_5'=>$i_out_5, ':i_out_6'=>$i_out_6, ':i_out_7'=>$i_out_7, ':i_out_8'=>$i_out_8, ':i_out_9'=>$i_out_9, ':i_in_10'=>$i_in_10, ':i_in_11'=>$i_in_11, ':i_in_12'=>$i_in_12, ':i_in_13'=>$i_in_13, ':i_in_14'=>$i_in_14, ':i_in_15'=>$i_in_15, ':i_in_16'=>$i_in_16, ':i_in_17'=>$i_in_17, ':i_in_18'=>$i_in_18, ':cr_black'=>$cr_black, ':cr_blue'=>$cr_blue, ':cr_white'=>$cr_white, ':cr_white_lady'=>$cr_white_lady, ':cr_red'=>$cr_red, ':sr_black'=>$sr_black, ':sr_blue'=>$sr_blue, ':sr_white'=>$sr_white, ':sr_white_lady'=>$sr_white_lady, ':sr_red'=>$sr_red, ':s_system'=>$s_system));
        
        ?>
          <div class="alert alert-success fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Course Entry Success!</strong>
          </div> 
        <?php
      }
      else
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Sorry, Golf Course Already Exist!</strong>
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

<form action="index.php?m=newcourse" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id">Course Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-id" name="c_id" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-name">Course Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-name" name="c_name" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="date">Abbreviation Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="abb-name" name="abb_name" />
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="loc">Location:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="loc" name="loc" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="i-type">Index Type:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="i-type" name="i_type">
          <option value="opt1">Choice (Set index manually)</option>
          <option value="opt2">Odd Out Holes - Even In Holes (Recommended by USGA System)</option>
          <option value="opt3">Even Out Holes - Odd In Holes</option>
        </select>
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
            <td>Par Out</td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-1" name="par_out_1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-2" name="par_out_2" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-3" name="par_out_3" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-4" name="par_out_4" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-5" name="par_out_5" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-6" name="par_out_6" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-7" name="par_out_7" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-8" name="par_out_8" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count" id="par-out-9" name="par_out_9" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners sum" id="t-par-out" name="t_par_out" value="0" maxlength="2" style="width:28px;" readonly/></td>
            <td>Par In</td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-10" name="par_in_10" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-11" name="par_in_11" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-12" name="par_in_12" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-13" name="par_in_13" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-14" name="par_in_14" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-15" name="par_in_15" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-16" name="par_in_16" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-17" name="par_in_17" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners count2" id="par-in-18" name="par_in_18" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners sum2" id="t-par-in" name="t_par_in" value="0" maxlength="2" style="width:28px;" readonly/></td>
          </tr>
          <tr id="opt1" class="opts">
            <td>Index Out</td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-1-opt1" name="i_out_1_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-2-opt1" name="i_out_2_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-3-opt1" name="i_out_3_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-4-opt1" name="i_out_4_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-5-opt1" name="i_out_5_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-6-opt1" name="i_out_6_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-7-opt1" name="i_out_7_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-8-opt1" name="i_out_8_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-out-9-opt1" name="i_out_9_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td></td>
            <td>Index In</td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-10-opt1" name="i_in_10_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-11-opt1" name="i_in_11_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-12-opt1" name="i_in_12_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-13-opt1" name="i_in_13_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-14-opt1" name="i_in_14_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-15-opt1" name="i_in_15_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-16-opt1" name="i_in_16_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-17-opt1" name="i_in_17_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td><input type="number" class="form-control input-xs no-spinners" id="i-in-18-opt1" name="i_in_18_opt1" value="0" maxlength="2" style="width:28px;" /></td>
            <td></td>   
          </tr>
          <tr class="tr-even">
          </tr>
          <tr id="opt2" class="opts">
            <td>Index Out</td>
            <td>1<input type="hidden" class="form-control input-xs" id="i-out-1-opt2" name="i_out_1_opt2" value="1" maxlength="2" style="width:28px;" /></td>
            <td>3<input type="hidden" class="form-control input-xs" id="i-out-2-opt2" name="i_out_2_opt2" value="3" maxlength="2" style="width:28px;" /></td>
            <td>5<input type="hidden" class="form-control input-xs" id="i-out-3-opt2" name="i_out_3_opt2" value="5" maxlength="2" style="width:28px;" /></td>
            <td>7<input type="hidden" class="form-control input-xs" id="i-out-4-opt2" name="i_out_4_opt2" value="7" maxlength="2" style="width:28px;" /></td>
            <td>9<input type="hidden" class="form-control input-xs" id="i-out-5-opt2" name="i_out_5_opt2" value="9" maxlength="2" style="width:28px;" /></td>
            <td>11<input type="hidden" class="form-control input-xs" id="i-out-6-opt2" name="i_out_6_opt2" value="11" maxlength="2" style="width:28px;" /></td>
            <td>13<input type="hidden" class="form-control input-xs" id="i-out-7-opt2" name="i_out_7_opt2" value="13" maxlength="2" style="width:28px;" /></td>
            <td>15<input type="hidden" class="form-control input-xs" id="i-out-8-opt2" name="i_out_8_opt2" value="15" maxlength="2" style="width:28px;" /></td>
            <td>17<input type="hidden" class="form-control input-xs" id="i-out-9-opt2" name="i_out_9_opt2" value="17" maxlength="2" style="width:28px;" /></td>
            <td></td>
            <td>Index In</td>
            <td>2<input type="hidden" class="form-control input-xs" id="i-in-10-opt2" name="i_in_10_opt2" value="2" maxlength="2" style="width:28px;" /></td>
            <td>4<input type="hidden" class="form-control input-xs" id="i-in-11-opt2" name="i_in_11_opt2" value="4" maxlength="2" style="width:28px;" /></td>
            <td>6<input type="hidden" class="form-control input-xs" id="i-in-12-opt2" name="i_in_12_opt2" value="6" maxlength="2" style="width:28px;" /></td>
            <td>8<input type="hidden" class="form-control input-xs" id="i-in-13-opt2" name="i_in_13_opt2" value="8" maxlength="2" style="width:28px;" /></td>
            <td>10<input type="hidden" class="form-control input-xs" id="i-in-14-opt2" name="i_in_14_opt2" value="10" maxlength="2" style="width:28px;" /></td>
            <td>12<input type="hidden" class="form-control input-xs" id="i-in-15-opt2" name="i_in_15_opt2" value="12" maxlength="2" style="width:28px;" /></td>
            <td>14<input type="hidden" class="form-control input-xs" id="i-in-16-opt2" name="i_in_16_opt2" value="14" maxlength="2" style="width:28px;" /></td>
            <td>16<input type="hidden" class="form-control input-xs" id="i-in-17-opt2" name="i_in_17_opt2" value="16" maxlength="2" style="width:28px;" /></td>
            <td>18<input type="hidden" class="form-control input-xs" id="i-in-18-opt2" name="i_in_18_opt2" value="18" maxlength="2" style="width:28px;" /></td>
            <td></td>   
          </tr>
          <tr class="tr-even">
          </tr>
          <tr id="opt3" class="opts">
            <td>Index Out</td>
            <td>2<input type="hidden" class="form-control input-xs" id="i-out-1-opt3" name="i_out_1_opt3" value="2" maxlength="2" style="width:28px;" /></td>
            <td>4<input type="hidden" class="form-control input-xs" id="i-out-2-opt3" name="i_out_2_opt3" value="4" maxlength="2" style="width:28px;" /></td>
            <td>6<input type="hidden" class="form-control input-xs" id="i-out-3-opt3" name="i_out_3_opt3" value="6" maxlength="2" style="width:28px;" /></td>
            <td>8<input type="hidden" class="form-control input-xs" id="i-out-4-opt3" name="i_out_4_opt3" value="8" maxlength="2" style="width:28px;" /></td>
            <td>10<input type="hidden" class="form-control input-xs" id="i-out-5-opt3" name="i_out_5_opt3" value="10" maxlength="2" style="width:28px;" /></td>
            <td>12<input type="hidden" class="form-control input-xs" id="i-out-6-opt3" name="i_out_6_opt3" value="12" maxlength="2" style="width:28px;" /></td>
            <td>14<input type="hidden" class="form-control input-xs" id="i-out-7-opt3" name="i_out_7_opt3" value="14" maxlength="2" style="width:28px;" /></td>
            <td>16<input type="hidden" class="form-control input-xs" id="i-out-8-opt3" name="i_out_8_opt3" value="16" maxlength="2" style="width:28px;" /></td>
            <td>18<input type="hidden" class="form-control input-xs" id="i-out-9-opt3" name="i_out_9_opt3" value="18" maxlength="2" style="width:28px;" /></td>
            <td></td>
            <td>Index In</td>
            <td>1<input type="hidden" class="form-control input-xs" id="i-in-10" name="i_in_10_opt3" value="1" maxlength="2" style="width:28px;" /></td>
            <td>3<input type="hidden" class="form-control input-xs" id="i-in-11" name="i_in_11_opt3" value="3" maxlength="2" style="width:28px;" /></td>
            <td>7<input type="hidden" class="form-control input-xs" id="i-in-12" name="i_in_12_opt3" value="7" maxlength="2" style="width:28px;" /></td>
            <td>9<input type="hidden" class="form-control input-xs" id="i-in-13" name="i_in_13_opt3" value="9" maxlength="2" style="width:28px;" /></td>
            <td>11<input type="hidden" class="form-control input-xs" id="i-in-14" name="i_in_14_opt3" value="11" maxlength="2" style="width:28px;" /></td>
            <td>13<input type="hidden" class="form-control input-xs" id="i-in-15" name="i_in_15_opt3" value="13" maxlength="2" style="width:28px;" /></td>
            <td>15<input type="hidden" class="form-control input-xs" id="i-in-16" name="i_in_16_opt3" value="15" maxlength="2" style="width:28px;" /></td>
            <td>17<input type="hidden" class="form-control input-xs" id="i-in-17" name="i_in_17_opt3" value="17" maxlength="2" style="width:28px;" /></td>
            <td>19<input type="hidden" class="form-control input-xs" id="i-in-18" name="i_in_18_opt3" value="19" maxlength="2" style="width:28px;" /></td>
            <td></td>   
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div id="slope-system" class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="s-system">Slope System:</label>
      </div>
      <div class="col-sm-6">
        <select class="form-control" id="s-system" name="s_system">
          <option value="pre-slope">Pre Slope (Use Standard Slope Rating - 113)</option>
          <option value="own-slope" selected>Own Slope</option>
        </select>
      </div>
    </div>
  </div>
  <div id="own-slope" class="col-sm-4 col-sm-offset-4 s-opts" style="background:#68C3A3;color:#fff;padding:15px;margin-bottom:20px;margin-top:30px;">
    <center>
      <div class="form-group">
        <span class="input-group-addon" style="background:#1E824C;color:#fff;font-size:11px;border:none;border-radius:0px;">Course Rating</span>
        <span class="input-group-addon" style="background:#1E824C;color:#fff;font-size:11px;border:none;">Slope Rating</span>
        <div class="input-group">
          <input type="number" step="any" placeholder="Black" class="form-control no-spinners" id="cr-black" name="cr_black" />
          <span class="input-group-addon" style="background:#000;color:#fff;border:none"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="number" placeholder="Black" class="form-control no-spinners" id="sr-black" name="sr_black" />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="number" step="any" placeholder="Blue" class="form-control no-spinners" id="cr-blue" name="cr_blue" />
          <span class="input-group-addon" style="background:#4183D7;color:#fff;border:none"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="number" placeholder="Blue" class="form-control no-spinners" id="sr-blue" name="sr_blue" />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="number" step="any" placeholder="White" class="form-control no-spinners" id="cr-white" name="cr_white" />
          <span class="input-group-addon" style="background:#fff;color:#000;border:none"><i class="fa fa-flag fa-fw"></i></span>
          <input type="number" placeholder="White" class="form-control no-spinners" id="sr-white" name="sr_white" />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="number" step="any" placeholder="White Lady" class="form-control no-spinners" id="cr-white-lady" name="cr_white_lady" />
          <span class="input-group-addon" style="background:#fff;color:#000;border:none"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="number" placeholder="White Lady" class="form-control no-spinners" id="sr-white-lady" name="sr_white_lady" />
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="number" step="any" placeholder="Red" class="form-control no-spinners" id="cr-red" name="cr_red" />
          <span class="input-group-addon" style="background:#CF000F;color:#fff;border:none"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="number" placeholder="Red" class="form-control no-spinners" id="sr-red" name="sr_red" />
        </div>
      </div>
    </center>
  </div>
  <div id="confirm_btn" class="col-sm-12">
    <center>
      <input type="submit" name="submit" class="btn btn-danger" value="Submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="javascript:history.go(-1)"><button type="button" class="btn btn-warning">Cancel</button></a>
    </center>
  </div>
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('.tr-even').hide();

    $('.opts').hide();
    $('#opt1').show();
    $('#i-type').change(function(){
      $('.opts').hide();
      $('#'+$(this).val()).show();
    });

    $('.s-opts').hide();
    $('#own-slope').show();
    $('#s-system').change(function(){
      $('.s-opts').slideUp();
      $('#confirm_btn').css('margin-top',20);
      $('#own-slope').css('margin-bottom',0);
      $('#'+$(this).val()).slideDown();
    });

    $(document).on("change", ".count", function(){
      var sum = 0;
      $(".count").each(function(){
        sum += +parseInt($(this).val(), 10);
      });
      $(".sum").val(sum);
    });

    $(document).on("change", ".count2", function(){
      var sum = 0;
      $(".count2").each(function(){
        sum += +parseInt($(this).val(), 10);
      });
      $(".sum2").val(sum);
    }); 
  });
</script>