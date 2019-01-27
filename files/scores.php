<?php
  if (Login::isLoggedIn())
  {
    $result = isset($_GET["result"]) ? $_GET["result"] : "";

    //$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];

    $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

    foreach ($user_stmt as $user) 
    {
      $username = $user['username'];
    }

    if (isset($_POST['delete']))
    {
      $delete_id = $_POST['delete_id'];
      DB::query('DELETE FROM golfer_score WHERE id=:delete_id', array(':delete_id'=>$delete_id));

      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Score Successfully Deleted!</strong>
        </div> 
      <?php
    }

    if ($result == "score_edited")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Scores Successfully Edited!</strong>
        </div> 
      <?php
    }
    else
    {
      "";
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<?php
  if ($user_level == "User")
  {
    ?>
      <a href="index.php?m=newscore"><button type="button" class="btn btn-primary">Add New Score</button></a>
    <?php
  }
  else
  {
    "";
  }
?>
<div style="margin-top:20px;" class="table-responsive">          
  <table id="scores" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>NAME</th>
        <th>ID</th>
        <th>DATE</th>
        <th>TYPE</th>
        <th>GOLF COURSE</th>
        <th>TEE</th>
        <th>GROSS</th>
        <th>ADJUSTED</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if ($user_level == "Admin")
        {
          $scores_stmt = DB::query("SELECT golfer_score.id, golfer_score.date, golfer_score.type, golfer_score.tee, golfer_score.gs, golfer_score.ags, golfers.name, golfers.iga_id, golf_courses.course_id, golf_courses.course_name FROM golfer_score INNER JOIN golfers ON golfer_score.iga_u_id=golfers.id INNER JOIN golf_courses ON golfer_score.course_id=golf_courses.id ORDER BY golfers.iga_id");
        }
        else
        {
          $scores_stmt = DB::query("SELECT golfer_score.id, golfer_score.date, golfer_score.type, golfer_score.tee, golfer_score.gs, golfer_score.ags, golfers.name, golfers.iga_id, golf_courses.course_id, golf_courses.course_name FROM golfer_score INNER JOIN golfers ON golfer_score.iga_u_id=golfers.id INNER JOIN golf_courses ON golfer_score.course_id=golf_courses.id INNER JOIN golfer_club ON golfers.iga_id=golfer_club.iga_id INNER JOIN golf_club ON golfer_club.club_id=golf_club.id AND golf_club.club_code=:username ORDER BY golfers.iga_id", array(':username'=>$username));
        }
        foreach ($scores_stmt as $scores) 
        {
          ?>
            <tr>
              <td><?php echo $scores['name']; ?></td>
              <td><?php echo $scores['iga_id']; ?></td>
              <td><?php echo $scores['date']; ?></td>
              <td><?php echo $scores['type']; ?></td>
              <td><?php echo $scores['course_id']; ?> (<?php echo $scores['course_name']; ?>)</td>
              <td><?php echo $scores['tee']; ?></td>
              <td><?php echo $scores['gs']; ?></td>
              <td><?php echo $scores['ags']; ?></td>
              <td><center><a href="index.php?m=viewscore&id=<?php echo $scores['id']; ?>" title="View Score's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=editscore&id=<?php echo $scores['id']; ?>" title="Edit Scores's Information" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete Score" data-toggle="modal" data-target="#deleteModal<?php echo $scores['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal<?php echo $scores['id'] ?>" role="dialog">
                <div class="modal-dialog"> 
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" style="background:#019875;color:#fff;">
                      <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                      <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body" style="background:#C8F7C5" >
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $scores['id'] ?>" />
                        <p>Are you sure you'd like to delete?</p>
                        <button type="submit" name="delete" class="btn btn-default">Delete</button>
                      </form>
                    </div>
                    <div class="modal-footer" style="background:#019875;color:#fff;">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </tr>
          <?php
        }
      ?>
    </tbody>
  </table>
</div>
            
<script type="text/javascript">
  $(document).ready(function(){
    $('#scores').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });
  });
</script>
