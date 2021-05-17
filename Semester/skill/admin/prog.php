<?php
include("sqlcon.php");
$result = mysqli_query($con,"SELECT * FROM prog");

if(isset($_REQUEST['del']))
{
    $querry="delete from prog where u_id='".$_REQUEST['del']."'";
    $result=mysqli_query($con,$querry);
    header("location:prog.php");
}
?>
<a href="add_prog.php">ADD progs</a>
<table>
<tr><td> prog ID </td> <td> Name </td><td>Category</td><td>Price</td><td> Action </td></tr>

<?php while($fetch= mysqli_fetch_object($result)) { ?>
<tr>

<td>
<?php echo $fetch->u_id;?>
</td>
<td>
<?php echo $fetch->name;?>
</td>

<td>
<?php
$querry1="select c_name from cour where c_id='".$fetch->c_id."'";
$result1=mysqli_query($con,$querry1);
$fetch1=mysqli_fetch_object($result1);
echo $fetch1->c_name;
?>
</td>
<td>
<?php echo $fetch->price;?>
</td>

<td>
<a href="edit_prog.php?id=<?php echo $fetch->u_id;?>"> Edit </a>
</td>
<td>
<a href="prog.php?del=<?php echo $fetch->u_id;?>"> Delete </a>
</td>
</tr>
<?php } ?>

</table>