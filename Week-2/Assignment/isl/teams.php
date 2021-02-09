<?php include("./partials/connection.php") ?>

<?php include("./partials/header.php") ?>
<div class="content">
  <h2 style="text-align: center;">Teams</h2>
  <h3 style="text-align: center;">Click on the teams to know more about their players!</h3>
  <div class="flex">
    <?php
    $teams = mysqli_query($con, "select * from teams");
    while ($team = mysqli_fetch_object($teams)) {
    ?>
      <a class="btn" href="./players.php?tid=<?php echo $team->tid ?>"><?php echo $team->tname ?></a>
    <?php } ?>
  </div>
</div>

<?php include("./partials/footer.php") ?>