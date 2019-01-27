<?php
  $course_id = isset($_GET["id"]) ? $_GET["id"] : "";

  $course_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golf_courses WHERE id=:course_id", array(':course_id'=>$course_id))[0]['exist_count'];

  if ($course_exist_check != 0)
  {
    $course_stmt = DB::query("SELECT * FROM golf_courses WHERE id=:course_id", array(":course_id"=>$course_id));

    foreach ($course_stmt as $course) 
    {
      $c_code = $course['course_id'];    
      $c_name = $course['course_name'];    
      $abb = $course['abb_name'];    
      $loc = $course['location'];    
      $par1 = $course['p_o_1'];
      $par2 = $course['p_o_2'];
      $par3 = $course['p_o_3'];
      $par4 = $course['p_o_4'];
      $par5 = $course['p_o_5'];
      $par6 = $course['p_o_6'];
      $par7 = $course['p_o_7'];
      $par8 = $course['p_o_8'];
      $par9 = $course['p_o_9'];
      $par10 = $course['p_i_10'];
      $par11 = $course['p_i_11'];
      $par12 = $course['p_i_12'];
      $par13 = $course['p_i_13'];
      $par14 = $course['p_i_14'];
      $par15 = $course['p_i_15'];
      $par16 = $course['p_i_16'];
      $par17 = $course['p_i_17'];
      $par18 = $course['p_i_18'];
      $tpo = $course['total_p_o'];
      $tpi = $course['total_p_i'];
      $index1 = $course['i_out_1'];
      $index2 = $course['i_out_2'];
      $index3 = $course['i_out_3'];
      $index4 = $course['i_out_4'];
      $index5 = $course['i_out_5'];
      $index6 = $course['i_out_6'];
      $index7 = $course['i_out_7'];
      $index8 = $course['i_out_8'];
      $index9 = $course['i_out_9'];
      $index10 = $course['i_in_10'];
      $index11 = $course['i_in_11'];
      $index12 = $course['i_in_12'];
      $index13 = $course['i_in_13'];
      $index14 = $course['i_in_14'];
      $index15 = $course['i_in_15'];
      $index16 = $course['i_in_16'];
      $index17 = $course['i_in_17'];
      $index18 = $course['i_in_18'];
      $c_black = $course['c_r_black'];
      $c_blue = $course['c_r_blue'];
      $c_white = $course['c_r_white'];
      $c_white_l = $course['c_r_white_l'];
      $c_red = $course['c_r_red'];
      $s_black = $course['s_r_black'];
      $s_blue = $course['s_r_blue'];
      $s_white = $course['s_r_white'];
      $s_white_l = $course['s_r_white_l'];
      $s_red = $course['s_r_red'];
      $ss = $course['slope_system'];
    }
  }
  else
  {
    die("Golf course doesn't exist!");
  }
?>

<form>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id">Course Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-id" value="<?php echo $c_code; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-name">Course Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-name" value="<?php echo $c_name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="date">Abbreviation Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="abb-name" value="<?php echo $abb; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="loc">Location:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="loc" value="<?php echo $loc; ?>" disabled/>
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
            <td><?php echo $par1; ?></td>
            <td><?php echo $par2; ?></td>
            <td><?php echo $par3; ?></td>
            <td><?php echo $par4; ?></td>
            <td><?php echo $par5; ?></td>
            <td><?php echo $par6; ?></td>
            <td><?php echo $par7; ?></td>
            <td><?php echo $par8; ?></td>
            <td><?php echo $par9; ?></td>
            <td><?php echo $tpo; ?></td>
            <td>Par In</td>
            <td><?php echo $par10; ?></td>
            <td><?php echo $par11; ?></td>
            <td><?php echo $par12; ?></td>
            <td><?php echo $par13; ?></td>
            <td><?php echo $par14; ?></td>
            <td><?php echo $par15; ?></td>
            <td><?php echo $par16; ?></td>
            <td><?php echo $par17; ?></td>
            <td><?php echo $par18; ?></td>
            <td><?php echo $tpi; ?></td>
          </tr>
          <tr>
            <td>Index Out</td>
            <td><?php echo $index1; ?></td>
            <td><?php echo $index2; ?></td>
            <td><?php echo $index3; ?></td>
            <td><?php echo $index4; ?></td>
            <td><?php echo $index5; ?></td>
            <td><?php echo $index6; ?></td>
            <td><?php echo $index7; ?></td>
            <td><?php echo $index8; ?></td>
            <td><?php echo $index9; ?></td>
            <td></td>
            <td>Index In</td>
            <td><?php echo $index10; ?></td>
            <td><?php echo $index11; ?></td>
            <td><?php echo $index12; ?></td>
            <td><?php echo $index13; ?></td>
            <td><?php echo $index14; ?></td>
            <td><?php echo $index15; ?></td>
            <td><?php echo $index16; ?></td>
            <td><?php echo $index17; ?></td>
            <td><?php echo $index18; ?></td>
            <td></td>   
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="s-system">Slope System:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="s-system" value="<?php echo $ss; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-4" style="background:#68C3A3;padding:15px;margin-bottom:20px;margin-top:30px;">
    <center>
      <div class="form-group">
        <span class="input-group-addon" style="background:#1E824C;color:#fff;font-size:11px;border:none;border-radius:0px;">Course Rating</span>
        <span class="input-group-addon" style="background:#1E824C;color:#fff;font-size:11px;border:none;">Slope Rating</span>
        <div class="input-group">
          <input type="text" placeholder="Black" class="form-control" id="cr-black" value="<?php echo $c_black; ?>" disabled/>
          <span class="input-group-addon" style="background:#000;color:#fff;"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="text" placeholder="Black" class="form-control" id="sr-black" value="<?php echo $s_black; ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="text" placeholder="Blue" class="form-control" id="cr-blue" value="<?php echo $c_blue; ?>" disabled/>
          <span class="input-group-addon" style="background:#4183D7;color:#fff;"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="text" placeholder="Blue" class="form-control" id="sr-blue" value="<?php echo $s_blue; ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="text" placeholder="White" class="form-control" id="cr-white" value="<?php echo $c_white; ?>" disabled/>
          <span class="input-group-addon" style="background:#fff;color:#000;"><i class="fa fa-flag fa-fw"></i></span>
          <input type="text" placeholder="White" class="form-control" id="sr-white" value="<?php echo $s_white; ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="text" placeholder="White Lady" class="form-control" id="cr-white-lady" value="<?php echo $c_white_l; ?>" disabled/>
          <span class="input-group-addon" style="background:#fff;color:#000;"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="text" placeholder="White Lady" class="form-control" id="sr-white-lady" value="<?php echo $s_white_l; ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <input type="text" placeholder="Red" class="form-control" id="cr-red" value="<?php echo $c_red; ?>" disabled/>
          <span class="input-group-addon" style="background:#CF000F;color:#fff;"><i class="fa fa-flag-o fa-fw"></i></span>
          <input type="text" placeholder="Red" class="form-control" id="sr-red" value="<?php echo $s_red; ?>" disabled/>
        </div>
      </div>
    </center>
  </div>
</form>