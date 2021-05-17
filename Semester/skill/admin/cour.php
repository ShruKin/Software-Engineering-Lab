<?php
include("sqlcon.php");
$result = mysqli_query($con,"SELECT * FROM cour");
if(isset($_REQUEST['del']))
{
    $querry="delete from cour where c_id='".$_REQUEST['del']."'";
    $result = mysqli_query($con,$querry);
    header("location:cour.php");
}
if (isset($_REQUEST["status"])) {
    $query = "update cour set status='" . $_REQUEST['status'] . "' where c_id='" . $_REQUEST["id"] . "'";
    $result = mysqli_query($con, $query);
    header("location:cour.php");
    echo $_REQUEST['status'];
  }
?>
<a href="add_cour.php">ADD course</a>
<table>
<tr><td> cour ID </td> <td> Name </td><td> Status </td><td> Action </td></tr>

<?php 
while($fetch= mysqli_fetch_object( $result )) { ?>
<tr>

<td>
<?php echo $fetch->c_id;?>
</td>
<td>
<?php echo $fetch->c_name;?>
</td>
<td>
<?php
     if ($fetch->status) { ?>
    <a href="?status=0 &id=<?php echo $fetch->c_id ?>">Active</a>
    <?php }
     else { ?>
    <a href="?status=1 &id=<?php echo $fetch->c_id ?>">Inactive</a>
    <?php } ?>
</td>
<td>
<a href="edit_cour.php?id=<?php echo $fetch->c_id;?>"> Edit </a>
</td>
<td>
<a href="cour.php?del=<?php echo $fetch->c_id;?>"> Delete </a>
</td>
</tr>
<?php } ?>

</table>