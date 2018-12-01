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
	$date =$_FILES['file']['date'];
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	
	//files allowed 
	$allowed = array('pdf','docx','txt');


	if(!in_array($fileActualExt,$allowed))
	{
		header("Location: uploadform.php?upload=type");
		
	}		

	else{

		if ($fileError ===0)
		{
			if($fileSize >50000000)
			{

				header("Location: uploadform.php?upload=large");
				
			}
			else
			{

				$date= date("Y-m-d H:i:s");
				$fileNameNew = uniqid('',TRUE).".".$fileActualExt;
				$fileDestination = 'uploads/'.$fileName;
				//upload the file function
				move_uploaded_file($fileTmpName, $fileDestination);
				
				
				$sql = "INSERT INTO `upload` (`name`, `size`, `type`, `location`,`trn_date`) VALUES ('$fileName', '$fileSize', '$fileType', '$location$fileName','$date')";
				 $res = mysqli_query($conn, $sql);
				 $update="update upload set trn_date='".$date."'";
				$result =mysqli_query($conn,$update) or die(mysqli_error($conn));
                header("Location: view.php?upload=success");
			

		}


		}else
		{
			header("Location: file.php?upload=errorr");
		}
		
		}
	}
		
 
	

