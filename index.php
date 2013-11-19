<?php

	$inc = true;
	$title_for_layout = 'Instalike';
	require_once('config/config.php');
	require('config/functions.php');
	include('layout/header.inc.php');
	if (!isset($_SESSION['username'])) {
		
?>

	Connectez-vous !

<?php

	} else {

		include('functions/timeline.php');

	}
	
	include('layout/footer.inc.php');

?>