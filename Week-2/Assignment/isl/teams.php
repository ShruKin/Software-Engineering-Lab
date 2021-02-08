<?php include("./partials/connection.php") ?>

<?php include("./partials/header.php") ?>
<div class="content">
  Teams
  <?php
  $teams = mysqli_query($con, "select * from teams");
  while ($team = mysqli_fetch_object($teams)) {
  ?>
    <a href="./players.php?tid=<?php echo $team->tid ?>"><?php echo $team->tname ?></a>
  <?php } ?>
</div>

<?php include("./partials/footer.php") ?>