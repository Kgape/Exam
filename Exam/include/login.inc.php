<?php
//session_start();
//check if submit button is clicked

	include 'dbh.inc.php';
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
//error handlers,if input is empty
	if(empty($username) || empty($password)){
		header("Location: ../signup.php?login=empty");
			exit();	
	}else{
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = mysqli_query($conn,$sql);
		//tells how many rows where found
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck <1){
		 	header("Location: ../signup.php?login=account doesnt not exist");
			exit();	
		}
		else{
			if($row =mysqli_fetch_assoc($result)){
				//dehashing the password
				$hashedPasswordCheck = password_verify($password,$row['password']);

				if($hashedPasswordCheck == false){
					header("Location: ../signup.php?login=incorrect password");//change
					exit();
				}
				elseif($hashedPasswordCheck ==true){
					//login here
					$_SESSION ['id'] = $row['id'];
					$_SESSION ['name'] = $row['name'];
					$_SESSION ['last'] = $row['surname'];
					$_SESSION ['email'] = $row['email'];
					$_SESSION ['username'] = $row['username'];
					//$_SESSION ['$hashedPasswordCheck'] = $row['$hashedPasswordCheck'];
					header("Location: ../uploadform.php?login=success");
					
					exit();

				}
			}
		}
	}

/*	else{
		header("Location: ../signup.php?login=error");
		exit();
	}
*/