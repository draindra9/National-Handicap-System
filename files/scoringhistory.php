<?php
  $id = isset($_GET["id"]) ? $_GET["id"] : "";

  $count_score = DB::query('SELECT COUNT(*) AS count_score FROM golfer_score WHERE iga_u_id=:id', array(':id'=>$id))[0]['count_score'];

  if ($count_score > 4)
  {
    $golfers_stmt = DB::query('SELECT iga_id, name, h_index, p_hi FROM golfers WHERE id=:id', array(':id'=>$id));
    foreach ($golfers_stmt as $golfers) {
      $golfers_iga = $golfers['iga_id'];
      $golfers_name = $golfers['name'];
      $golfers_hi = $golfers['h_index'];
      $golfers_phi = $golfers['p_hi'];
    }

    $last_rev_stmt = DB::query("SELECT rev_date FROM revision");
    foreach ($last_rev_stmt as $last_rev) {
      $last_rev_date = $last_rev['rev_date'];
    }
  }
  else
  {
    die("There isn't enough score to calculate handicap index!");
  }    
?>

<div class="col-sm-12 form-custom">
  <div class="form-group">
    <div class="col-sm-3">
      <label for="g-id">PGI ID Number:</label>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="g-id" value="<?php echo $golfers_iga; ?>" disabled/>
    </div>
  </div>
</div>
<div class="col-sm-12 form-custom">
  <div class="form-group">
    <div class="col-sm-3">
      <label for="g-name">Name:</label>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="g-name" value="<?php echo $golfers_name; ?>" disabled/>
    </div>
  </div>
</div>
<div class="col-sm-12 form-custom">
  <div class="form-group">
    <div class="col-sm-3">
      <label for="revision-date">Revision Date:</label>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="revision-date" value="<?php echo $last_rev_date; ?>" disabled/>
    </div>
  </div>
</div>
  <!-- <div class="col-sm-12 form-custom">
  <div class="form-group">
    <div class="col-sm-3">
      <label for="p-revision-date">Prior Revision Date:</label>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" data-provide="datepicker-inline" data-date-format="dd/mm/yyyy" id="p-revision-date" disabled/>
    </div>
  </div>
</div> -->
<div class="col-sm-12" style="padding:5px;margin-bottom:5px;margin-top:5px;">
  <div class="table-responsive">          
    <table id="score" class="table table-striped table-condensed">
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Date Played</th>
          <th colspan="3">Course</th>
          <th rowspan="2">CRS HCP</th>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th rowspan="2">GS</th>
          <th rowspan="2">ESC</th>
          <th rowspan="2">AGS</th>
          <th rowspan="2">HCP DIFF</th>
          <th rowspan="2">LD</th>
<!--           <th rowspan="2">TS</th>     -->            
        </tr>
        <tr>
          <th>CR</th>
          <th>SR</th>
          <th>TEE</th>
          <th>10</th>
          <th>11</th>
          <th>12</th>
          <th>13</th>
          <th>14</th>
          <th>15</th>
          <th>16</th>
          <th>17</th>
          <th>18</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=1;
          $score_history_stmt = DB::query('SELECT golfer_score.date, golfer_score.type, golfer_score.tee, golfer_score.course_rtg, golfer_score.slope_rtg, golfer_score.hcp_diff, golfer_score.c_handicap, golfer_score.str_1, golfer_score.str_2, golfer_score.str_3, golfer_score.str_4, golfer_score.str_5, golfer_score.str_6, golfer_score.str_7, golfer_score.str_8, golfer_score.str_9, golfer_score.str_10, golfer_score.str_11, golfer_score.str_12, golfer_score.str_13, golfer_score.str_14, golfer_score.str_15, golfer_score.str_16, golfer_score.str_17, golfer_score.str_18, golfer_score.gs, golfer_score.ags, golfer_score.esc, golf_courses.course_name FROM golfer_score, golf_courses WHERE golfer_score.course_id=golf_courses.id AND golfer_score.iga_u_id=:id', array(':id'=>$id));
          foreach ($score_history_stmt as $score_history) 
          {
            $hcp_diff = $score_history['hcp_diff'];
            ?>
              <tr>
                <td rowspan="2"><?php echo $no; ?></td>
                <td rowspan="2"><?php echo $score_history['date']; ?></td>
                <td style="border-left:1px solid #BDC3C7;border-right:1px solid #BDC3C7;border-bottom:1px solid #BDC3C7;" colspan="3"><?php echo $score_history['course_name']; ?></td>
                <td rowspan="2"><?php echo $score_history['c_handicap']; ?></td>
                <td style="border-left:1px solid #BDC3C7;border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_1']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_2']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_3']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_4']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_5']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_6']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_7']; ?></td>
                <td style="border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_8']; ?></td>
                <td style="border-right:1px solid #BDC3C7;border-bottom:1px solid #BDC3C7;"><?php echo $score_history['str_9']; ?></td>
                <td rowspan="2"><?php echo $score_history['gs']; ?></td>
                <td rowspan="2"><?php echo $score_history['esc']; ?></td>
                <td rowspan="2"><?php echo $score_history['ags']; ?></td>
                <td rowspan="2"><?php echo $hcp_diff; ?></td>
                <?php
                  $score_count_query = DB::query('SELECT COUNT(*) AS score_count FROM golfer_score WHERE iga_u_id=:id', array(':id'=>$id));
        
                  foreach ($score_count_query as $score_count_prepare) 
                  {
                    $score_count = $score_count_prepare['score_count'];
                  }
                  
                  if ($score_count>4 && $score_count<7)
                  {
                    $hi_limit = DB::query("SELECT MIN(hcp_diff) AS hcp FROM golfer_score WHERE iga_u_id=:id", array(':id'=>$id));
                  }
                  elseif ($score_count>6 && $score_count<9)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 2) golfer_score", array(':id'=>$id));                  
                  }
                  elseif ($score_count>8 && $score_count<11)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 3) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>10 && $score_count<13)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 4) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>12 && $score_count<15)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 5) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>14 && $score_count<17)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 6) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>16 && $score_count<18)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 7) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>17 && $score_count<19)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 8) golfer_score", array(':id'=>$id));   
                  }
                  elseif ($score_count>18 && $score_count<20)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 9) golfer_score", array(':id'=>$id));  
                  }
                  elseif ($score_count>19)
                  {
                    $hi_limit = DB::query("SELECT MAX(golfer_score.hcp_diff) AS hcp
                                  FROM (SELECT gs.hcp_diff
                                          FROM golfer_score AS gs
                                         WHERE iga_u_id=:id
                                      ORDER BY gs.hcp_diff
                                         LIMIT 10) golfer_score", array(':id'=>$id));  
                  }
                  else
                  {
                    "";
                  }

                  foreach ($hi_limit as $handicap_param) 
                  {
                    $hi_param = $handicap_param['hcp'];
                    //echo $hi_param;
                  }
                ?>
                <?php
                  if ($hcp_diff>$hi_param)
                  {
                    ?>
                      <td rowspan="2"></td>
                    <?php
                  }
                  else
                  {
                    ?>
                      <td rowspan="2"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <?php
                  }
                ?>
<!--                 <td rowspan="2"></td>  -->               
              </tr>
              <tr>
                <td style="border-top:none;border-left:1px solid #BDC3C7;"><?php echo $score_history['course_rtg']; ?></td>
                <td style="border-top:none;border-left:1px solid #BDC3C7;border-right:1px solid #BDC3C7;"><?php echo $score_history['slope_rtg']; ?></td>
                <td style="border-top:none;border-right:1px solid #BDC3C7;"><?php echo $score_history['tee']; ?></td>
                <td style="border-top:none;border-left:1px solid #BDC3C7;"><?php echo $score_history['str_10']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_11']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_12']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_13']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_14']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_15']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_16']; ?></td>
                <td style="border-top:none;"><?php echo $score_history['str_17']; ?></td>
                <td style="border-top:none;border-right:1px solid #BDC3C7;"><?php echo $score_history['str_18']; ?></td>
              </tr>
            <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="col-sm-12" style="margin-bottom:20px;padding-top:20px;background:#2C3E50;color:#fff;">
  <center>
    <div class="col-sm-2" style="margin-top:5px;">
      <img class="img-responsive" src="images/pgi_logo.png" style="width:100px;" />
    </div>
    <div class="col-sm-10">
      <div class="form-group">
        <label for="ahi">Actual Handicap Index:</label>
        <input style="text-align:center;" type="text" class="form-control" id="ahi" value="<?php echo $golfers_hi; ?>" disabled/><br />
        <label for="ahi">Prior Handicap Index:</label>
        <input style="text-align:center;" class="form-control" id="ahi" value="<?php echo $golfers_phi; ?>" disabled/>
      </div><br />
    </div>
  </center>
</div>
  
  <!-- <div class="col-sm-4" style="background:#C8F7C5;border-radius:6px;padding:5px;border:1px solid #000;">
    <center>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="ats">Avg. Tournament Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="ats" disabled/>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="ahi-ats">AHI-ATS:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="ahi-ats" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="hcp-reduc">Handicap Reduction:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="hcp-reduc" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="hcp-index">Handicap Index:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="hcp-index" disabled/>
        </div>
      </div>
    </center>
  </div>
  <div class="col-sm-4" style="background:#C8F7C5;border-radius:6px;padding:5px;border:1px solid #000;">
    <center>
      <div class="form-group">
        <div class="col-sm-12" style="margin-bottom:10px;">
          <label for="tsi">Tournament Score Info:</label>
        </div>
      </div><br />
      <div class="form-group">
        <div class="col-sm-8">
          <label for="lowest-1">Lowest[1]:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="lowest-1" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="lowest2">Lowest[2]:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="lowest-2" disabled/>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8">
          <label for="tts">Total Tournament Score:</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="tts" disabled/>
        </div>
      </div>
    </center>
  </div> -->

