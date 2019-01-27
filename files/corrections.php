<?php
  $result = isset($_GET["result"]) ? $_GET["result"] : "";

  if (Login::isLoggedIn()) 
  {
    if (isset($_POST['delete']))
    {
      $delete_id = $_POST['delete_id'];
      DB::query('DELETE FROM correction WHERE id=:delete_id', array(':delete_id'=>$delete_id));

      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Correction Successfully Deleted!</strong>
        </div> 
      <?php
    }

    $user_level = DB::query('SELECT type FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['type'];
    $user_username = DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];

    if ($result == "correction_success")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Correction Successfully Requested!</strong>
        </div> 
      <?php
    }
    else if ($result == "correction_approved")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Correction Successfully Approved!</strong>
        </div> 
      <?php
    }
    else if ($result == "correction_rejected")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Correction Successfully Rejected!</strong>
        </div> 
      <?php
    }
    else if ($result == "correction_edited")
    {
      ?>
        <div class="alert alert-success fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Correction Successfully Edited!</strong>
        </div> 
      <?php
    }
    else
    {
      "";
    }

    if ($user_level == "User")
    {
      ?>
        <a href="index.php?m=newcorrection"><button type="button" class="btn btn-primary">Add New Correction</button></a>
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

<div style="margin-top:20px;" class="table-responsive">
  Date: <input type="text" class="form-control" id="daterange" name="daterange" /><br />
  <table id="corrections" class="table table-striped table-condensed nowrap" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th rowspan="2">DATE</th>
        <th rowspan="2">NAME</th>
        <th rowspan="2">ID</th>
        <th colspan="2">HANDICAP INDEX</th>
        <th rowspan="2">STATUS</th>
        <th rowspan="2">#</th>
      </tr>
      <tr>
        <th>Last</th>
        <th>Correction</th>
      </tr>
    </thead>
    <tbody id="table-body">
      <?php
        if ($user_level == "Admin")
        {
          $correction_stmt = DB::query("SELECT correction.id, correction.correction_date, correction.iga_id, correction.last_hi, correction.correction_hi, correction.status, golfers.name FROM correction, golfers WHERE correction.iga_id=golfers.iga_id ORDER BY correction.id");
        }
        else
        {
          $correction_stmt = DB::query("SELECT correction.id, correction.correction_date, correction.iga_id, correction.last_hi, correction.correction_hi, correction.status, golfers.name FROM correction, golfers WHERE correction.iga_id=golfers.iga_id AND correction.requester=:user_username ORDER BY correction.id", array(':user_username'=>$user_username));
        }
        foreach ($correction_stmt as $correction_golfer) 
        {
          ?>
            <tr>
              <td><?php echo $correction_golfer['correction_date']; ?></td>
              <td><?php echo $correction_golfer['name']; ?></td>
              <td><?php echo $correction_golfer['iga_id']; ?></td>
              <td><?php echo $correction_golfer['last_hi']; ?></td>
              <td><?php echo $correction_golfer['correction_hi']; ?></td>
              <td><?php echo $correction_golfer['status']; ?></td>
              <?php
                if ($correction_golfer['status'] == "Approved" || $correction_golfer['status'] == "Rejected")
                {
                  ?>
                    <td><center><a href="index.php?m=correctiondetail&id=<?php echo $correction_golfer['id']; ?>" title="View Details" style="color:#000;"><i class="fa fa-list-alt fa-fw"></i></a></center></td>
                  <?php
                }
                else
                {
                  if ($user_level == "Admin")
                  {
                    ?>
                      <td><center><a href="index.php?m=viewcorrection&id=<?php echo $correction_golfer['id']; ?>" title="Determine Decision" style="color:#F39C12;"><i class="fa fa-gavel fa-fw"></i></a></center></td>
                    <?php
                  }
                  else
                  {
                    ?>
                      <td><center><a href="index.php?m=editcorrection&id=<?php echo $correction_golfer['id']; ?>" title="Edit Correction" style="color:#67809F;"><i class="fa fa-pencil-square-o fa-fw"></i></a> <a href="#" title="Delete Correction" data-toggle="modal" data-target="#deleteModal<?php echo $correction_golfer['id'] ?>" style="color:#CF000F;"><i class="fa fa-trash fa-fw"></i></a></center></td>
                    <?php
                  }
                }
              ?>
              <!-- Delete Modal -->
              <div class="modal fade" id="deleteModal<?php echo $correction_golfer['id'] ?>" role="dialog">
                <div class="modal-dialog"> 
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" style="background:#019875;color:#fff;">
                      <button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
                      <h4 class="modal-title">Delete Confirmation</h4>
                    </div>
                    <div class="modal-body" style="background:#C8F7C5" >
                      <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?php echo $correction_golfer['id'] ?>" />
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
    var oTable=$('#corrections').dataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });

    var startdate;
    var enddate;
    $('#daterange').daterangepicker({
      // timePicker: true,
      // timePicker24Hour: true,
      // timePickerIncrement: 30,
      locale:{
        // format: 'DD/MM/YYYY H:mm:ss'
        format: 'DD/MM/YYYY H:mm'
      },
      ranges:{
        'All dates' : [moment().subtract(10, 'year'), moment().add(10, 'year')],
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 days': [moment().subtract(6, 'days'), moment()],
        'Last 30 days': [moment().subtract(29, 'days'), moment()],
        'This month': [moment().startOf('month'), moment().endOf('month')],
        'Last month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      "opens": "right"
    },

    function(start,end,label){
      var s = moment(start.toISOString());
      var e = moment(end.toISOString());
      // startdate = s.format("YYYY-MM-DD H:mm:ss");
      // enddate = e.format("YYYY-MM-DD H:mm:ss");
      startdate = s.format("YYYY-MM-DD H:mm");
      enddate = e.format("YYYY-MM-DD H:mm");
    });

    $('#daterange').on('apply.daterangepicker', function(ev, picker){
      // startdate=picker.startDate.format('YYYY-MM-DD H:mm:ss');
      // enddate=picker.endDate.format('YYYY-MM-DD H:mm:ss');
      startdate=picker.startDate.format('YYYY-MM-DD H:mm');
      enddate=picker.endDate.format('YYYY-MM-DD H:mm');
      $.fn.dataTableExt.afnFiltering.push(
      function(oSettings, aData, iDataIndex){
        if(startdate!=undefined){
          var column = aData[0].split(" ");
          var coldate = column[0].split("/");
          var coltime = column[1].split(":");
          // var d = new Date(coldate[2], coldate[1]-1, coldate[0], coltime[0], coltime[1], coltime[2]);
          var d = new Date(coldate[2], coldate[1]-1, coldate[0], coltime[0], coltime[1]);
          var date = moment(d.toISOString());
          // date = date.format("YYYY-MM-DD H:mm:ss");
          date = date.format("YYYY-MM-DD H:mm");

          dateMin=startdate.replace(/-/g, "");
          dateMax=enddate.replace(/-/g, "");
          date=date.replace(/-/g, "");

          if(dateMin=="" && date<=dateMax){
            return true;
          }
          else if(dateMin=="" && date<=dateMax){
            return true;
          }
          else if(dateMin<=date && ""==dateMax){
            return true;
          }
          else if(dateMin<=date && date<=dateMax){
            return true;
          }
          return false;
          }
      });
      oTable.fnDraw();
    });
  });
</script>
