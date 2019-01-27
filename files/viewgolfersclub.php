<?php
  $golfer_id = isset($_GET["id"]) ? $_GET["id"] : "";

  $golfer_exist_check = DB::query("SELECT COUNT(*) AS exist_count FROM golfers WHERE id=:golfer_id", array(':golfer_id'=>$golfer_id))[0]['exist_count'];

  if ($golfer_exist_check != 0)
  {

    $golfer_stmt = DB::query("SELECT * FROM golfers WHERE id=:golfer_id", array(":golfer_id"=>$golfer_id));

    foreach ($golfer_stmt as $golfer) 
    {
      $iga_id = $golfer['iga_id'];
      $name = $golfer['name'];
    }
  }
  else
  {
    die("Golfer doesn't exist!");
  }
?>

<form action="newgolfer.php" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-id" name="g_id" value="<?php echo $iga_id; ?>" disabled/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" value="<?php echo $name; ?>" disabled/>
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
                $golfer_club_stmt = DB::query("SELECT golf_club.club_code, golf_club.club_name, golfer_club.club_id, golfer_club.club_id_number FROM golfer_club INNER JOIN golf_club ON golf_club.id=golfer_club.club_id WHERE golfer_club.iga_id=:iga_id", array(":iga_id"=>$iga_id));
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
</form>