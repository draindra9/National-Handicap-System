<?php
  include('../../classes/DB.php');
  
  $id = isset($_GET["id"]) ? $_GET["id"] : "";

  $golfers_stmt = DB::query("SELECT iga_id, name, h_index FROM golfers WHERE id=:id", array(":id"=>$id));

  foreach ($golfers_stmt as $golfers) 
  {
    $iga_id = $golfers['iga_id'];
    $name = $golfers['name'];
    $h_index = $golfers['h_index'];
  }

  $response = array('iga_id'=>$iga_id, 'name'=>$name, 'h_index'=>$h_index);
  echo json_encode($response);
?>