<?php
include("sqlcon.php");

if(isset($_POST['insert']))
{
    $querry="insert into cour set c_name='".$_POST['name']."'";
    mysqli_query($con,$querry);
    header("location:cour.php");
}
?>

<html> 
<form method ="POST" action="">
<table>

<tr><td> course Name:</td><td><input type="text" name="name" value="" /></td><tr>

<tr><td> <input type="submit" name="insert" value="insert"/> </td></tr>

</table>
</form>
</html>