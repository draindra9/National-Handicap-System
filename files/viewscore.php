<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn())
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
        $tee = $scores['tee'];
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
        $hcp_diff = $scores['hcp_diff'];
      }

      $g_identity_stmt = DB::query("SELECT golfers.iga_id, golfers.name, golf_courses.course_name, golf_courses.course_id, golf_courses.i_out_1, golf_courses.i_out_2, golf_courses.i_out_3, golf_courses.i_out_4, golf_courses.i_out_5, golf_courses.i_out_6, golf_courses.i_out_7, golf_courses.i_out_8, golf_courses.i_out_9, golf_courses.i_in_10, golf_courses.i_in_11, golf_courses.i_in_12, golf_courses.i_in_13, golf_courses.i_in_14, golf_courses.i_in_15, golf_courses.i_in_16, golf_courses.i_in_17, golf_courses.i_in_18, golf_courses.p_o_1, golf_courses.p_o_2, golf_courses.p_o_3, golf_courses.p_o_4, golf_courses.p_o_5, golf_courses.p_o_6, golf_courses.p_o_7, golf_courses.p_o_8, golf_courses.p_o_9, golf_courses.p_i_10, golf_courses.p_i_11, golf_courses.p_i_12, golf_courses.p_i_13, golf_courses.p_i_14, golf_courses.p_i_15, golf_courses.p_i_16, golf_courses.p_i_17, golf_courses.p_i_18, golf_courses.total_p_o, golf_courses.total_p_i FROM golfers INNER JOIN golfer_score ON golfers.id=golfer_score.iga_u_id INNER JOIN golf_courses ON golfer_score.course_id=golf_courses.id WHERE golfer_score.id=:score_id", array(':score_id'=>$score_id));
    
      foreach ($g_identity_stmt as $g_identity) 
      {
        $iga_id = $g_identity['iga_id'];
        $name = $g_identity['name'];
        $c_name = $g_identity['course_name'];
        $c_id = $g_identity['course_id'];
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

<form>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-id" value="<?php echo $iga_id; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" value="<?php echo $name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="date">Playing Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="date" value="<?php echo $date; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="s-type">Type:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="s-type" value="<?php echo $type; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-id">Course Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-id" value="<?php echo $c_id; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-course">Golf Course:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-course" value="<?php echo $c_name; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="tee">Tee Box:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="tee" value="<?php echo $tee; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-rating">Course Rating:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-rating" value="<?php echo $c_rtg; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-srating">Slope Rating:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-srating" value="<?php echo $s_rtg; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hi">Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hi" value="<?php echo $hi; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-ch">Course Handicap:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-ch" value="<?php echo $ch; ?>" disabled/>
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
            <td>Actual Out</td>
            <td><?php echo $str1; ?></td>
            <td><?php echo $str2; ?></td>
            <td><?php echo $str3; ?></td>
            <td><?php echo $str4; ?></td>
            <td><?php echo $str5; ?></td>
            <td><?php echo $str6; ?></td>
            <td><?php echo $str7; ?></td>
            <td><?php echo $str8; ?></td>
            <td><?php echo $str9; ?></td>
            <td><?php echo $tstrout; ?></td>
            <td>Actual In</td>
            <td><?php echo $str10; ?></td>
            <td><?php echo $str11; ?></td>
            <td><?php echo $str12; ?></td>
            <td><?php echo $str13; ?></td>
            <td><?php echo $str14; ?></td>
            <td><?php echo $str15; ?></td>
            <td><?php echo $str16; ?></td>
            <td><?php echo $str17; ?></td>
            <td><?php echo $str18; ?></td>
            <td><?php echo $tstrin; ?></td>
          </tr>
          <tr>
            <td>Adjust Out</td>
            <td><?php echo $adj1; ?></td>
            <td><?php echo $adj2; ?></td>
            <td><?php echo $adj3; ?></td>
            <td><?php echo $adj4; ?></td>
            <td><?php echo $adj5; ?></td>
            <td><?php echo $adj6; ?></td>
            <td><?php echo $adj7; ?></td>
            <td><?php echo $adj8; ?></td>
            <td><?php echo $adj9; ?></td>
            <td><?php echo $tadjout; ?></td>
            <td>Adjust In</td>
            <td><?php echo $adj10; ?></td>
            <td><?php echo $adj11; ?></td>
            <td><?php echo $adj12; ?></td>
            <td><?php echo $adj13; ?></td>
            <td><?php echo $adj14; ?></td>
            <td><?php echo $adj15; ?></td>
            <td><?php echo $adj16; ?></td>
            <td><?php echo $adj17; ?></td>
            <td><?php echo $adj18; ?></td>
            <td><?php echo $tadjin; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-sm-4 col-sm-offset-4" style="background:#68C3A3;padding:5px;margin-bottom:20px;">
    <center>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-eagle">Eagle:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-eagle" value="<?php echo $eagle; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-birdie">Birdie:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-birdie" value="<?php echo $birdie; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-par">Par:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-par" value="<?php echo $par; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-bogey">Bogey:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-bogey" value="<?php echo $bogey; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-d-bogey">Double Bogey:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-d-bogey" value="<?php echo $dbogey; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-gs">Gross Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-gs" value="<?php echo $gs; ?>" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="g-ags">Adjusted Gross Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="g-ags" value="<?php echo $ags; ?>" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="hcp-diff">Handicap Differential:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="hcp-diff" value="<?php echo $hcp_diff; ?>" disabled/>
        </div>
      </div>
    </center>
  </div>
</form>