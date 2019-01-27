<?php
  @$user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
  if (Login::isLoggedIn() && $user_level == "User")
  {
    $user_stmt = DB::query("SELECT * FROM users WHERE id=:id", array(":id"=>Login::isLoggedIn()));

    foreach ($user_stmt as $user)
    {
      $username = $user['username'];
    }

    $date_stmt = DB::query("SELECT rev_date FROM revision");

    $last_rev_date = "";
    foreach ($date_stmt as $date)
    {
      $last_rev_date = $date['rev_date'];
    }

    if (isset($_POST['submit']))
    {
      $iga_id = $_POST['g_id'];
      $un = $_POST['requester'];
      $pwd = $_POST['pass'];
      $last_hi = $_POST['last_hi'];
      $last_rev = $_POST['last_rev_date'];
      $corr_hi = $_POST['g_hi'];
      $corr_date = $_POST['corr_date'];
      $status = $_POST['status'];

      if (password_verify($pwd, DB::query('SELECT password FROM users WHERE username=:un', array(':un'=>$un))[0]['password']))
      {
        if (!DB::query('SELECT iga_id FROM correction WHERE iga_id=:iga_id', array(':iga_id'=>$iga_id)))
        {
          if ($last_hi != $corr_hi)
          {
            DB::query('INSERT INTO correction VALUES (\'\', :iga_id, :last_hi, :last_rev, :corr_hi, :corr_date, :un, \'\', :status)', array(':iga_id'=>$iga_id, ':last_hi'=>$last_hi, ':last_rev'=>$last_rev, ':corr_hi'=>$corr_hi, ':corr_date'=>$corr_date, ':un'=>$un, ':status'=>$status));
            header("location:index.php?m=corrections&result=correction_success");
          }
          else
          {
            ?>
              <div class="alert alert-danger fade in alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                <strong>Can't Insert Correction, Same Value Of Handicap Index Correction!</strong>
              </div>
            <?php
          }
        }
        else
        {
          ?>
            <div class="alert alert-danger fade in alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
              <strong>Can't Insert Correction, IGA ID Already Exist!</strong>
            </div>
          <?php
        }
      }
      else
      {
        ?>
          <div class="alert alert-danger fade in alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Incorrect Password!</strong>
          </div>
        <?php
      }
    }
  }
  else
  {
    die("You don't have an access to view this page!");
  }
?>

<form action="" method="POST">
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-id">PGI ID Number:</label>
      </div>
      <div class="col-sm-6">
        <div class="input-group">
          <input type="text" class="form-control" id="g-id" name="g_id" readonly required/>
          <span class="input-group-addon" data-toggle="modal" data-target="#selectGolfer" style="background:#C8F7C5;color:#000;cursor:pointer;cursor:hand;"><i class="fa fa-user-o fa-fw"></i></span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-name">Name:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-name" name="g_name" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-hi">Last Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-hi" name="last_hi" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="last-rev-date">Last Revision Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="last-rev-date" name="last_rev_date" value="<?php echo $last_rev_date; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="g-hi">Correction Handicap Index:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="g-hi" name="g_hi" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="corr-date">Correction Date:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" data-date-format="dd/mm/yyyy hh:ii" id="corr-date" name="corr_date" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="requester">Requester:</label>
      </div>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="requester" name="requester" value="<?php echo $username; ?>" readonly required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12 form-custom" style="margin-bottom:20px;">
    <div class="form-group">
      <div class="col-sm-3">
        <label for="pass">Password:</label>
      </div>
      <div class="col-sm-6">
        <input type="hidden" class="form-control" id="status" name="status" value="Pending" required/>
        <input type="password" class="form-control" id="pass" name="pass" required/>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <center>
      <input type="submit" class="btn btn-danger" value="Submit" name="submit" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-warning">Cancel</button>
    </center>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="selectGolfer" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#019875;color:#fff;">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
          <h4 class="modal-title">Select Golfer</h4>
        </div>
        <div class="modal-body" style="background:#C8F7C5" >
          <div class="table-responsive">
            <table id="golfers" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>ID</th>
                  <th>CURRENT HI</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $golfers_stmt = DB::query("SELECT g.id, g.name, g.iga_id, g.h_index FROM golfers g INNER JOIN golfer_club gc ON g.iga_id=gc.iga_id INNER JOIN golf_club gclub ON gc.club_id=gclub.id AND gclub.club_code=:username ORDER BY g.id", array(':username'=>$username));
                  foreach ($golfers_stmt as $golfers)
                  {
                    ?>
                      <tr>
                        <td><?php echo $golfers['name']; ?></td>
                        <td><?php echo $golfers['iga_id']; ?></td>
                        <td><?php echo $golfers['h_index']; ?></td>
                        <td><button type="button" class="btn btn-danger choosegolfer" value="<?php echo $golfers['id']; ?>">Select</button></td>
                      </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer" style="background:#019875;color:#fff;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</form>

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

  $('#corr-date').datetimepicker();

  $('.choosegolfer').each(function(){
    $(this).on('click', function(){
      var golfer_id = $(this).val();
      $.ajax({
        type: "GET",
        url: "files/ajax/golfers.ajax.php",
        data: 'id='+golfer_id,
        success: function(data){
          var golfer_json = data;
          golfer_obj = JSON.parse(golfer_json);
          $('#g-id').val(golfer_obj.iga_id);
          $('#g-name').val(golfer_obj.name);
          $('#last-hi').val(golfer_obj.h_index);
        }
      });
      $('#selectGolfer').modal('toggle');
    });
  });
</script>
