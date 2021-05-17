<?php
include("sqlcon.php");
if(isset($_POST['click']))
{
    $querry="update prog set name='".$_POST['name']."',price='".$_POST['price']."' where u_id='".$_REQUEST['id']."'";
    mysqli_query($con,$querry);
    header("location:prog.php");
}

$querry="select * from prog where u_id='".$_REQUEST['id']."'";
$result = mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);
?>

<html> 
<form method ="POST" action="">
<a href="prog.php">GO TO progs</a>
<table>

<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $fetch->name;?>" /></td></tr>
<tr><td>Price:</td><td><input type="text" name="price" value="<?php echo $fetch->price;?>" /></td></tr>
<tr><td> <input type="submit" name="click" value="update"/> </td></tr>

</table>
</form>
</html>