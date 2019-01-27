<div class="table-responsive">          
  <table id="scorelist" class="table table-striped table-condensed dt-responsive nowrap" width="100%" cellspacing="0">
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
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#scorelist').DataTable({
      "columnDefs": [{
        "targets": [-1],
        "orderable": false,
        "searchable": false
      }]
    });
  });
</script>

