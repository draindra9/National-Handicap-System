<?php
  $result = isset($_GET["result"]) ? $_GET["result"] : "";

  if (isset($_POST['delete']))
  {
    $delete_id = $_POST['delete_id'];
    DB::query('DELETE FROM golfer_score WHERE course_id=:delete_id', array(':delete_id'=>$delete_id));
    DB::query('DELETE FROM golf_courses WHERE id=:delete_id', array(':delete_id'=>$delete_id));

    ?>
      <div class="alert alert-success fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Golf Course Successfully Deleted!</strong>
      </div> 
    <?php
  }

  if ($result == "course_edited")
  {
    ?>
      <div class="alert alert-success fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Golf Course Successfully Edited!</strong>
      </div> 
    <?php
  }
  else
  {
    "";
  }
?>

<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if ($user_level == "Admin")
  {
    ?>
      <a href="index.php?m=newcourse"><button type="button" class="btn btn-primary">Add New Golf Course</button></a>
    <?php
  }
  else
  {
    "";
  }
?>
<div style="margin-top:20px;" class="table-responsive">          
  <table id="courses" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>COURSE NAME</th>
        <th>COURSE CODE</th>
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
              <?php
                if (Login::isLoggedIn() && $user_level =="Admin")
                {
                  ?>
                    <td><center><a href="index.php?m=viewcourse&id=<?php echo $courses['id']; ?>" title="View Courses's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=editcourse&id=<?php echo $courses['id']; ?>" title="Edit Courses's Information" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete Golf Course" data-toggle="modal" data-target="#deleteModal<?php echo $courses['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>
                  <?php
                }
                else
                {
                  ?>
                    <td><center><a href="index.php?m=viewcourse&id=<?php echo $courses['id']; ?>" title="View Courses's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a></center></td>
                  <?php
                }
              ?>
              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal<?php echo $courses['id'] ?>" role="dialog">
                <div class="modal-dialog"> 
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" style="background:#019875;color:#fff;">
                      <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                      <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body" style="background:#C8F7C5" >
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $courses['id'] ?>" />
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
    $('#courses').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });
  });
</script>
