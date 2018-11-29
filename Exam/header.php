<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
				<div class="nav-login">

					<? php
						if(isset($_SESSION['username'])){
								echo <form action=include/login.inc.php method="POST">
						
					</form>
							 <form action=include/login.inc.php method="POST">
						<input type="text" name="username" placeholder="Username/email">
						<input type="password" name="password" placeholder="password">
						<button type="submit" name="submit" >Login</button>
					</form>
					<a href="signup.php">Sign up</a> 
						

					

					
					
				</div>

			</div>
		</nav> 
	</header> 