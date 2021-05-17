<?php
include("sqlcon.php");
if(isset($_POST['click']))
{
    $querry="update cour set c_name='".$_POST['name']."'  where c_id='".$_REQUEST['id']."'";
    mysqli_query($con,$querry);
    header("location:cour.php");
}

$querry="select * from cour where c_id='".$_REQUEST['id']."'";
$result = mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);

?>

<html> 
<form method ="POST" action="">
<a href="cour.php">Go to course</a>
<table>

<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $fetch->c_name;?>" /></td><tr>

<tr><td> <input type="submit" name="click" value="update"/> </td></tr>

</table>
</form>
</html>