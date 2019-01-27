<?php
  $result = isset($_GET["result"]) ? $_GET["result"] : "";

  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level =="Admin")
  {
    if ($result == "insert_new")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Golfers Successfully Inserted As New Golfer!</strong>
        </div> 
      <?php
    }
    else if ($result == "rejected")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Suspension Successfully Rejected !</strong>
        </div> 
      <?php
    }
    else if ($result == "add_club")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Club Successfully Added to the Golfers!</strong>
        </div> 
      <?php
    }
    else if ($result == "overwrite")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Golfer Overwrite Success!</strong>
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

<div class="table-responsive">          
  <table id="golfers" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
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
        $suspense_golfer_stmt = DB::query("SELECT * FROM suspense_golfers ORDER BY id");
        foreach ($suspense_golfer_stmt as $suspense_golfer) 
        {
          ?>
            <tr>
              <td><?php echo $suspense_golfer['name']; ?></td>
              <td><?php echo $suspense_golfer['suspense_id']; ?></td>
              <td><?php echo $suspense_golfer['h_index']; ?></td>
              <td><?php echo $suspense_golfer['p_hi']; ?></td>
              <td><center><a href="index.php?m=suspensereport&id=<?php echo $suspense_golfer['suspense_id']; ?>" style="color:#CF000F;"><i class="fa fa-copy fa-fw"></i></a></center></td>
            </tr>
          <?php
        }
      ?>
    </tbody>
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

