<?php
//checks if the user clicked the submit button

if(isset($_POST['submit'])){

	include_once 'dbh.inc.php';

	$name =mysqli_real_escape_string($conn,$_POST['name']);
	$surname =mysqli_real_escape_string($conn,$_POST['surname']);
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$username =mysqli_real_escape_string($conn,$_POST['username']);
	$password =mysqli_real_escape_string($conn,$_POST['password']);


	//effor handlers
	//check for errors
	if(empty($name) || empty($surname) || empty($email) || empty($username) || empty($password))
	{
		//error massage
		header("Location: ../signup.php?signup=empty");
		exit();
	}else
	{
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/",$name) || !preg_match("/^[a-zA-Z]*$/",$surname))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		
	}
		else
		{
			//check if email is valid
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=email");
				exit();
		} else{
			//checks if the email already exists
			$sql = "SELECT * from users where username='$username'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck>0){
				header("Location: ../signup.php?signup=email exists");
				exit();
			}else{
				//hashing the password
				$hashedPassword = password_hash($password,PASSWORD_DEFAULT);
				//insert the user inside the database
				$sql ="INSERT INTO users (name,surname,email,username,password) VALUES ('$name','$surname','$email','$username','$hashedPassword');";
				 mysqli_query($conn,$sql);
				 header("Location: ../signup.php?signup=success");
				exit();

			}
		}
	}

}

} else{
	header("Location: ../signup.php");
	exit();
}
