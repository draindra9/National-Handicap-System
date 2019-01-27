<?php
  if (Login::isLoggedIn() && $user_level="Admin")
  {
    $result = isset($_GET["result"]) ? $_GET["result"] : "";

    if (isset($_POST['delete']))
    {
      $u_type = $_POST['utype'];

      if ($u_type == "Admin")
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Can't Delete Admin / Account Is Being Used!</strong>
          </div> 
        <?php
      }
      else
      {
        $delete_id = $_POST['delete_id'];
        DB::query('DELETE FROM login_tokens WHERE user_id=:delete_id', array(':delete_id'=>$delete_id));
        DB::query('DELETE FROM users WHERE id=:delete_id', array(':delete_id'=>$delete_id));

        ?>
          <div class="alert alert-success fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>User Successfully Deleted!</strong>
          </div> 
        <?php
      }
    }

    if ($result == "user_edited")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>User Successfully Edited!</strong>
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

<a href="index.php?m=newuser"><button type="button" class="btn btn-primary">Add New User</button></a>
<div style="margin-top:20px;" class="table-responsive">          
  <table id="users" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>USERNAME</th>
        <th>NAME</th>
        <th>TYPE</th>
        <th>STATUS</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $user_stmt = DB::query("SELECT * FROM users ORDER BY id");

        foreach ($user_stmt as $users)
        {
          ?>
            <tr>
              <td><?php echo $users['username']; ?></td>
              <td><?php echo $users['name']; ?></td>
              <td><?php echo $users['type']; ?></td>
              <td><?php echo $users['status']; ?></td>
              <td><center><a href="index.php?m=viewuser&id=<?php echo $users['id']; ?>" title="View User's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=edituser&id=<?php echo $users['id']; ?>" title="Edit User's Information" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete User" data-toggle="modal" data-target="#deleteModal<?php echo $users['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>
              
              <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?php echo $users['id'] ?>" role="dialog">
                  <div class="modal-dialog"> 
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header" style="background:#019875;color:#fff;">
                        <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                        <h4 class="modal-title">Delete Confirmation</h4>
                      </div>
                      <div class="modal-body" style="background:#C8F7C5" >
                        <form action="" method="POST">
                          <input type="hidden" name="utype" value="<?php echo $users['type'] ?>" />
                          <input type="hidden" name="delete_id" value="<?php echo $users['id'] ?>" />
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
    $('#users').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });
  });
</script>
