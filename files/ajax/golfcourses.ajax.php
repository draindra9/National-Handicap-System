<?php
  include('../../classes/DB.php');
  
  $id = isset($_GET["id"]) ? $_GET["id"] : "";

  $golfers_stmt = DB::query("SELECT * FROM golf_courses WHERE id=:id", array(":id"=>$id));

  foreach ($golfers_stmt as $golfers) 
  {
    $course_code = $golfers['course_id'];
    $course_name = $golfers['course_name'];
    $cr_black = $golfers['c_r_black'];
    $cr_blue = $golfers['c_r_blue'];
    $cr_white = $golfers['c_r_white'];
    $cr_white_l = $golfers['c_r_white_l'];
    $cr_red = $golfers['c_r_red'];
    $sr_black = $golfers['s_r_black'];
    $sr_blue = $golfers['s_r_blue'];
    $sr_white = $golfers['s_r_white'];
    $sr_white_l = $golfers['s_r_white_l'];
    $sr_red = $golfers['s_r_red'];
    $p_o_1 = $golfers['p_o_1'];
    $p_o_2 = $golfers['p_o_2'];
    $p_o_3 = $golfers['p_o_3'];
    $p_o_4 = $golfers['p_o_4'];
    $p_o_5 = $golfers['p_o_5'];
    $p_o_6 = $golfers['p_o_6'];
    $p_o_7 = $golfers['p_o_7'];
    $p_o_8 = $golfers['p_o_8'];
    $p_o_9 = $golfers['p_o_9'];
    $t_p_o = $golfers['total_p_o'];
    $p_i_10 = $golfers['p_i_10'];
    $p_i_11 = $golfers['p_i_11'];
    $p_i_12 = $golfers['p_i_12'];
    $p_i_13 = $golfers['p_i_13'];
    $p_i_14 = $golfers['p_i_14'];
    $p_i_15 = $golfers['p_i_15'];
    $p_i_16 = $golfers['p_i_16'];
    $p_i_17 = $golfers['p_i_17'];
    $p_i_18 = $golfers['p_i_18'];
    $t_p_i = $golfers['total_p_i'];
  }

  $response = array('course_code'=>$course_code, 'course_name'=>$course_name, 'cr_black'=>$cr_black, 'cr_blue'=>$cr_blue, 'cr_white'=>$cr_white, 'cr_white_l'=>$cr_white_l, 'cr_red'=>$cr_red, 'sr_black'=>$sr_black, 'sr_blue'=>$sr_blue, 'sr_white'=>$sr_white, 'sr_white_l'=>$sr_white_l, 'sr_red'=>$sr_red, 'p_o_1'=>$p_o_1, 'p_o_2'=>$p_o_2, 'p_o_3'=>$p_o_3, 'p_o_4'=>$p_o_4, 'p_o_5'=>$p_o_5, 'p_o_6'=>$p_o_6, 'p_o_7'=>$p_o_7, 'p_o_8'=>$p_o_8, 'p_o_9'=>$p_o_9, 't_p_o'=>$t_p_o, 'p_i_10'=>$p_i_10, 'p_i_11'=>$p_i_11, 'p_i_12'=>$p_i_12, 'p_i_13'=>$p_i_13, 'p_i_14'=>$p_i_14, 'p_i_15'=>$p_i_15, 'p_i_16'=>$p_i_16, 'p_i_17'=>$p_i_17, 'p_i_18'=>$p_i_18, 't_p_i'=>$t_p_i);
  echo json_encode($response);
?>