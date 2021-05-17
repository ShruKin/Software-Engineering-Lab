<?php
include("sqlcon.php");

if(isset($_POST['insert']))
{
  
    $querry="insert into prog set name='".$_POST['name']."',c_id='".$_POST['c_id']."',price='".$_POST['price']."'";
    $result = mysqli_query($con,$querry);
    header("location:prog.php");
}
$result = mysqli_query($con,"SELECT * FROM cour where status='1'");
?>

<html> 
<form method ="POST" action=""  enctype="multipart/form-data" >
<table>

<tr><td>Name:</td><td><input type="text" name="name" value="" /></td><tr>

<tr><td>Select Category:</td><td>
<select name="c_id" id="c_id">
<?php while($fetch=mysqli_fetch_object($result)) 
 { ?>
<option value="<?php echo $fetch->c_id;?>"><?php echo $fetch->c_name;?></option>
<?php } ?>
</select></td><tr>

<tr><td>Price:</td><td><input type="text" name="price" value="" /></td><tr>

<tr><td> <input type="submit" name="insert" value="insert"/> </td></tr>

</table>
</form>
</html>