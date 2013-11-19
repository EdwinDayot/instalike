<?php

	header('HTTP/1.0 404 Not Found');
	$root = dirname($_SERVER['SCRIPT_NAME']);
	$inc = true;
	$title_for_layout = 'Not Found';
	include('header.inc.php');

?>
<h1>Oops !</h1>
<h2>404 Not Found</h2>
<a href="<?php echo BASE_URL; ?>" class="btn btn-primary"><span class="glyphions-home"></span> Take Me Home</a>