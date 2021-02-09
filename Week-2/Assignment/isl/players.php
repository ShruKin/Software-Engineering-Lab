<?php include("./partials/connection.php") ?>

<?php include("./partials/header.php") ?>
<div class="content">
  <?php
  $tid =  $_GET["tid"];
  $team = mysqli_query($con, "select tname from teams where tid=$tid");
  $teamName = mysqli_fetch_object($team)->tname;
  ?>
  <h1 style="text-align: center;"><?php echo $teamName ?></h1>

  <h2 style="text-align: center;">Players</h2>
  <?php
  $players = mysqli_query($con, "select * from players where tid=$tid");
  ?>
  <div class="flex">
    <table>
      <thead>
        <th>Num</th>
        <th>Position</th>
        <th>Name</th>
      </thead>
      <tbody>
        <?php
        while ($player = mysqli_fetch_object($players)) {
        ?>
          <tr>
            <td style="text-align: center;"><?php echo $player->num ?></td>
            <td style="text-align: center;"><?php echo $player->pos ?></td>
            <td><?php echo $player->pname ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <h2 style="text-align: center;">Upcoming matches</h2>
  <?php
  $matches = mysqli_query($con, "select tid1, tid2, date, stadium, t1.tname as tname1, t2.tname as tname2 from matches, teams as t1, teams as t2 where (tid1=$tid or tid2=$tid) and matches.tid1 = t1.tid and matches.tid2 = t2.tid order by date");
  ?>
  <div class="flex">
    <table>
      <thead>
        <th>Date</th>
        <th>Team 1</th>
        <th>VS</th>
        <th>Team 2</th>
        <th>Venue</th>
      </thead>
      <tbody>
        <?php
        while ($match = mysqli_fetch_object($matches)) {
        ?>
          <tr>
            <td style="text-align: center;"><?php echo $match->date ?></td>
            <td style="text-align: right;">
              <a href="./players.php?tid=<?php echo $match->tid1 ?>">
                <?php echo $match->tname1 ?>
              </a>
            </td>
            <td style="text-align: center;">VS</td>
            <td style="text-align: left;">
              <a href="./players.php?tid=<?php echo $match->tid2 ?>">
                <?php echo $match->tname2 ?>
              </a>
            </td>
            <td><?php echo $match->stadium ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>

<?php include("./partials/footer.php") ?>