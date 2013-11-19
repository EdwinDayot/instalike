<?php

	$inc = true;
	$title_for_layout = 'Sign Up';
	include('layout/header.inc.php');
	require('functions/signup.php');
	if (!isset($_SESSION['username'])) {
	
?>

	<form action="signup.php" role="form" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" required autofocus>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" required>
		</div>
		<div class="form-group">
			<label for="confirm">Confirm</label>
			<input type="password" class="form-control" name="confirm" required>
		</div>
		<div class="form-group">
			<label for="mail">Mail</label>
			<input type="mail" class="form-control" name="mail" required>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="checkmeout" value="1" checked> Newsletter
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" value="1" name="agree"> I agree with the <a href="">terms of use</a>
			</label>
		</div>
		<button type="submit" class="btn btn-lg btn-block btn-primary">Sign Up</button>
	</form>

<?php

	} else {

?>
	
	Vous êtes déjà connecté :)

<?php

	}
	include('layout/footer.inc.php');

?>