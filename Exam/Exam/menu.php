<?php
	if(isset($_POST['upload']))
	 $_FILES['file'];
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<h2>Upload</h2>
			<form class="upload-form" enctype="multipart/form-data" ="upload-form" action="upload_file.php" method="post">
		<input type="file" name="file" id="file" size="80"> <br>
		<button type="submit" name="submit">Upload</button>
</form>
</div>

</body>
</html>

	
