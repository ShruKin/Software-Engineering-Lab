<?php include("./partials/connection.php") ?>

<?php include("./partials/header.php") ?>
<div class="content">
  Players
  <?php
  $tid =  $_GET["tid"];
  $players = mysqli_query($con, "select * from players where tid=$tid");
  while ($player = mysqli_fetch_object($players)) {
  ?>
    <a href="./players.php?tid=<?php echo $player->pid ?>"><?php echo $player->pname ?></a>
  <?php } ?>
</div>

<?php include("./partials/footer.php") ?>