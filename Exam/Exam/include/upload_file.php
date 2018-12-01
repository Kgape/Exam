<?php

	$file_result ="";
	if($_FILES["file"]["error"] >0){
		$file_result .="No file Upload or invalid File";
		$file_result .="Error code: " . $_FILES["file"]["error"] . <br>; 
		$file_name = $_FILES['file']['name'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
		$file_store = "upload/".$file_name;
		move_uploaded_file($_FILES[$file_tem_loc,$file_store);
		$file_result ="File Upload successful";

	}else{
		$file_result .=
		"Upload: " .$_FILES["file"]["name"] . "<br>" . 
		"Type: " . $_FILES["file"]["type"] . "<br>" . 
		"Size: " . ($_FILES["file"]["size"] /1024) . "Kb<br>" . 
		"Temp file: " . $_FILES["file"]["temp_name"] . "<br>" ;
		$fileExt = explode('.',$file);
		$fileActualExt = strtolower(end($file));

		
		$allowed = array('pdf','docx','doc','xlxs','csv','txt');
		if(in_array($fileActualExt, $allowed )){

		} else{
			echo "You cannot upload files of this type"
		}
		//upload a file
		
	}
	?>