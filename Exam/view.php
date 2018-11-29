<?php
require('dbconnect.php');
include("dbconnect.php");

$sql = "SELECT * FROM 'upload'";
$res =mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title >Documents</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="view-form">
<p><a href="signup.php">Home</a> 
| <a href="view.php">Add A Document</a> 
| <a href="index.php">Logout</a></p>
<h1>View Edit and Delete Documents</h1>
	
		<div class = "view-container">
			<div class ="row" style="table-layout: th,td {
   border: 1px solid black;} ">
				<table class="100%" border="1" style="border-collapse: collapse;">
					<thread>
				<tr>
					<th>Id</th>
					<th>Doc Name</th>
					<th>Size</th>
					<th>Type</th>
					<th>Location</th>
					<th>Delete</th>
					<th>Edit</th>
					<th>Download</th>
				</tr>
			</thread>
			<tbody>
				<?php 
					$counter=1;
					$select_query="Select * from upload ORDER BY id desc;";
					$result = mysqli_query($conn,$select_query);
					while ($row = mysqli_fetch_assoc($result)) {
					?>

				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['size']; ?></td>
					<td><?php echo $row['type']; ?></td>
					<td><?php echo $row['location']; ?></td>
					<td><a href ="delete.php?id=<?php echo $row['id'];?>">Delete</a>
					<td><a href ="edit.php?id=<?php echo $row['id'];?>">Edit</a>
					<td><a href="download.php?id=<?php echo $row['id'];?>">Download</a></td>
					
				</tr>

				<?php $counter++; }?>
			</tbody>
				
			</table>
			</div>
		</div>


</body>
</html>