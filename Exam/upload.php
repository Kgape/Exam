<?php

//session_start();
require('dbconnect.php');
$location = 'uploads/';

if(!isset($_POST['submit']))
{
echo "Error";
}
else{

	 $file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];


	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));


	//files allowed 
	$allowed = array('pdf','docx','txt');


	if(!in_array($fileActualExt,$allowed))
	{
		header("Location: file.php?upload=type");
	}		

	else{

		if ($fileError ===0)
		{
			if($fileSize >50000000)
			{
				header("Location: file.php?upload=large");
			}
			else
			{

				$fileNameNew = uniqid('',TRUE).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileName;
				//upload the file function
				move_uploaded_file($fileTmpName,$fileDestination);

				
				$sql = "INSERT INTO `upload` (`name`, `size`, `type`, `location`) VALUES ('$fileName', '$fileSize', '$fileType', '$location$fileName')";
				 $res = mysqli_query($conn, $sql);
                header("Location: view.php?upload=success");
			

		}


		}else
		{
			header("Location: file.php?upload=errorr");
		}
		
		}
	}
		
 
	

