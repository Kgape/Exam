
<!DOCTYPE html>
<html>
<head>
	<title>Documents</title>
</head>
<body>
	<div class="form">
<p><a href="signup.php">Home</a> 
| <a href="view.php">Add A Document</a> 
| <a href="index.php">Logout</a></p>
<h1>Upload documents</h1>
	<form action="upload.php" method = "POST" enctype="multipart/form-data">
		<label>Uploading files</label>
		<input type="file" name="file" >
		<button type="submit" name="submit" >Upload</button>

		<a href="upload.php"></a><br><br>;
		
	</form>


</body>
</html>
