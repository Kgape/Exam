<?php
	include_once 'header.php';
?>
	<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="include/signup.inc.php" method="POST">
			<input type="text" name="name" placeholder="name">
			<input type="text" name="surname" placeholder="surname">
			<input type="text" name="email" placeholder="e-mail">
			<input type="text" name="username" placeholder="username">
			<input type="password" name="password" placeholder="password"> 
			<button type="submit" name="submit">Sign Up</button>
		</form>

		<?php

		$fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if(strpos($fullUrl, "signup=empty")==true){
			echo "<p class='error'> You did not fill in all fields!</p>";
		}
		?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>
