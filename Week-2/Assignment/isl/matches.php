<?php include("./partials/connection.php") ?>

<?php include("./partials/header.php") ?>
<div class="content">
  Teams
  <?php
  $matches = mysqli_query($con, "select tid1, tid2, date, t1.tname as tname1, t2.tname as tname2 from matches, teams as t1, teams as t2 where matches.tid1 = t1.tid and matches.tid2 = t2.tid");
  while ($match = mysqli_fetch_object($matches)) {
  ?>
    <a href="./players.php?tid=<?php echo $match->tid ?>"><?php echo $match->tname ?></a>
  <?php } ?>
</div>

<?php include("./partials/footer.php") ?>