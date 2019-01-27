<?php
  $club_id = isset($_GET["id"]) ? $_GET["id"] : "";

  $club_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golf_club WHERE id=:club_id", array(':club_id'=>$club_id))[0]['exist_count'];

  if ($club_exist_check != 0)
  {
    $club_stmt = DB::query("SELECT * FROM golf_club WHERE id=:club_id", array(":club_id"=>$club_id));

    foreach ($club_stmt as $course) 
    {
      $cc = $course['club_code'];
      $cn = $course['club_name'];
      $abbname = $course['abb_name'];
      $location = $course['location'];
    }
  }
  else
  {
    die("Golf club doesn't exist!");
  }
?>

<form>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-code">Club Code:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-code" value="<?php echo $cc; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="c-name">Club Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="c-name" value="<?php echo $cn; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="abb-name">Abbreviation Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="abb-name" value="<?php echo $abbname; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="loc">Location:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="loc" value="<?php echo $location; ?>" disabled/>
      </div>
    </div>
  </div>
</form>
