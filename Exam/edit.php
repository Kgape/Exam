<?php

require('dbconnect.php');
include("dbconnect.php");


$id=$_REQUEST['id'];
$query = "SELECT * from upload where id='".$id."'";
$result = mysqli_query($conn,$query) or die (mysqli_error());

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit records</title>
	<link rel="stylesheet" type="text/css" href=""/>
</head>
<div class="form">
<p><a href="index.php">Home</a> 
| <a href="view.php">Add A Document</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update A Document</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$date_modified = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
//$age =$_REQUEST['age'];
//$submittedby = $_SESSION["username"];
$update="update upload set trn_date='".$date_modified."',
name='".$name."', age='".$id."' where id='".$id."'";
$result =mysqli_query($conn,$update) or die(mysqli_error($conn));
$status = "Document Successfully Updated. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Document name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="id" placeholder="Enter document id" 
required value="<?php echo $row['id'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
