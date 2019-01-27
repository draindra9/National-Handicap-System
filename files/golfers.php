<?php
  $result = isset($_GET["result"]) ? $_GET["result"] : "";

  if (isset($_POST['delete']))
  {
    $delete_id = $_POST['delete_id'];
    $delete_iga_id = $_POST['delete_iga_id'];
    DB::query('DELETE FROM golfer_score WHERE iga_u_id=:delete_id', array(':delete_id'=>$delete_id));
    DB::query('DELETE FROM correction WHERE iga_id=:delete_iga_id', array(':delete_iga_id'=>$delete_iga_id));
    DB::query('DELETE FROM golfer_club WHERE iga_id=:delete_iga_id', array(':delete_iga_id'=>$delete_iga_id));
    DB::query('DELETE FROM golfers WHERE id=:delete_id', array(':delete_id'=>$delete_id));

    ?>
      <div class="alert alert-success fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Golfer Successfully Deleted!</strong>
      </div> 
    <?php
  }

  if ($result == "golfer_edited")
  {
    ?>
      <div class="alert alert-success fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Golfer Successfully Edited!</strong>
      </div> 
    <?php
  }
  else
  {
    "";
  }

  $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

  foreach ($user_stmt as $user) 
  {
    $username = $user['username'];
  }
?>

<?php
  if (Login::isLoggedIn())
  {
    ?>
      <a href="index.php?m=newgolfer"><button type="button" class="btn btn-primary">Add New Golfer</button></a>
    <?php
  }
  else
  {
    "";
  }
?>

<div style="margin-top:20px;" class="table-responsive">          
  <table id="golfers" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
    <?php
      if (Login::isLoggedIn())
      {
        ?>
        <thead>
          <tr>
            <th>NAME</th>
            <th>ID</th>
            <th>CURRENT HANDICAP INDEX</th>
            <th>PRIOR HANDICAP INDEX</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if ($user_level == "Admin")
            {
              $golfers_stmt = DB::query("SELECT id, name, iga_id, h_index, p_hi FROM golfers ORDER BY id");
            }
            else
            {
              $golfers_stmt = DB::query("SELECT g.id, g.name, g.iga_id, g.h_index, g.p_hi FROM golfers g INNER JOIN golfer_club gc ON g.iga_id=gc.iga_id INNER JOIN golf_club gclub ON gc.club_id=gclub.id AND gclub.club_code=:username ORDER BY g.id", array(':username'=>$username));
            }
            foreach ($golfers_stmt as $golfers) 
            {
              ?>
                <tr>
                  <td><?php echo $golfers['name']; ?></td>
                  <td><?php echo $golfers['iga_id']; ?></td>
                  <td><?php echo $golfers['h_index']; ?></td>
                  <td><?php echo $golfers['p_hi']; ?></td>
                  <?php
                    if ($user_level == "Admin")
                    {
                      ?>
                        <td><center><a href="index.php?m=viewgolfer&id=<?php echo $golfers['id']; ?>" title="View Golfer's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=editgolfer&id=<?php echo $golfers['id']; ?>" title="Edit Golfer's Information" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete Golfer" data-toggle="modal" data-target="#deleteModal<?php echo $golfers['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>
                      <?php
                    }
                    else
                    {
                      ?>
                        <td><center><a href="index.php?m=viewgolfer&id=<?php echo $golfers['id']; ?>" title="View Golfer's Information" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=editgolfer2&id=<?php echo $golfers['id']; ?>" title="Edit Golfer's Information" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete Golfer" data-toggle="modal" data-target="#deleteModal<?php echo $golfers['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>
                      <?php
                    }
                  ?>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal<?php echo $golfers['id'] ?>" role="dialog">
                    <div class="modal-dialog"> 
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header" style="background:#019875;color:#fff;">
                          <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                          <h4 class="modal-title">Delete Confirmation</h4>
                        </div>
                        <div class="modal-body" style="background:#C8F7C5" >
                          <form action="" method="POST">
                            <input type="hidden" name="delete_iga_id" value="<?php echo $golfers['iga_id'] ?>" />
                            <input type="hidden" name="delete_id" value="<?php echo $golfers['id'] ?>" />
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
      <?php
      }
      else
      {
        ?>
        <thead>
          <tr>
            <th>NAME</th>
            <th>ID</th>
            <th>CURRENT HANDICAP INDEX</th>
            <th>PRIOR HANDICAP INDEX</th>
            <th>LAST PLAYED DATE</th>
            <th>#</th>
          </tr>
        </thead> 
        <tbody>
          <?php
            $golfers_stmt = DB::query("SELECT g.id, g.name, g.iga_id, g.h_index, g.p_hi, gs.date
                                      FROM golfers g
                                      INNER JOIN golfer_score gs ON g.id=gs.iga_u_id
                                      INNER JOIN (
                                          SELECT iga_u_id, DATE_FORMAT(MAX(STR_TO_DATE(date,'%d/%m/%Y')), '%d/%m/%Y') AS gs_date
                                          FROM golfer_score
                                          GROUP BY iga_u_id
                                      ) md ON g.id=md.iga_u_id AND gs.date=md.gs_date GROUP BY md.gs_date");
            foreach ($golfers_stmt as $golfers) 
            {
              $g_id = $golfers['id'];
              ?>
                <tr>
                  <td><?php echo $golfers['name']; ?></td>
                  <td><?php echo $golfers['iga_id']; ?></td>
                  <td><?php echo $golfers['h_index']; ?></td>
                  <td><?php echo $golfers['p_hi']; ?></td>
                  <td><?php echo $golfers['date']; ?></td>
                  <?php
                    $count_score = DB::query('SELECT COUNT(*) AS score FROM golfer_score WHERE iga_u_id=:g_id' , array(':g_id'=>$g_id));
                    foreach ($count_score as $count) {
                      $total_score = $count['score'];
                    }

                    if ($total_score<5)
                    {
                      ?>
                        <td><center><center><a href="index.php?m=viewgolfersclub&id=<?php echo $golfers['id']; ?>" title="View Golfer's Club" style="color:#F62459;"><i class="fa fa-id-badge fa-fw"></i></a></center></center></td>
                      <?php
                    }
                    else
                    {
                      ?>
                        <td><center><a href="index.php?m=scoringhistory&id=<?php echo $golfers['id']; ?>" title="View Detail" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a> <a href="index.php?m=viewgolfersclub&id=<?php echo $golfers['id']; ?>" title="View Golfer's Club" style="color:#F62459;"><i class="fa fa-id-badge fa-fw"></i></a></center></td>
                      <?php
                    }
                  ?>
                </tr>
              <?php
            }
          ?>
        </tbody>
      <?php
      }
    ?>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#golfers').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });
  });
</script>
