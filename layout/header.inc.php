<?php

	if ($inc !== true) {
		header('Location: 404.php');
	} else {

		if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
			connect($_COOKIE['username'], $_COOKIE['password']);
		}

		if (!isset($root)) {
			$root = dirname($_SERVER['SCRIPT_NAME']) . '/layout';
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title_for_layout; ?></title>
		<link rel="stylesheet" href="<?php echo $root ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $root ?>/css/rewrite.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="<?php echo $root ?>/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo BASE_URL; ?>">Instalike</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav pull-right">
						<?php if (isset($_SESSION['username'])){ ?>
							<li><a href="profile.php">My Profile</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
						<?php } else { ?>
							<li><a href="signup.php">Sign Up</a></li>
							<li><a href="login.php">Log In</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php

				if (isset($alert)) {
					echo $alert;
				}

			?>

<?php } ?>