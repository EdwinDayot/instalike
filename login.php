<?php

	$inc = true;
	$title_for_layout = 'Log In';
	include('layout/header.inc.php');
	require('functions/login.php');
	if (!isset($_SESSION['username'])) {
		
	

?>

	<form action="login.php" role="form" method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" required autofocus>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" required>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember"> Remember me
			</label>
		</div>
		<button type="submit" class="btn btn-lg btn-block btn-primary">Log In</button>
	</form>

<?php

	} else {

?>
	
	Vous êtes déjà connecté :)

<?php

	}
	include('layout/footer.inc.php');

?>