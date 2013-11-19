<?php

	if (!isset($_POST['remember'])) {
		$_POST['remember'] = 0;
	}

	if (isset($_POST['username'])) {
		connect($_POST['username'], md5($_POST['password']), $_POST['remember']);
	}

	if (isset($_GET['confirm'])) {
		$sql = 'SELECT * FROM insta_users WHERE USE_CLE="' . $_GET['confirm'] . '" AND USE_VALID=0';
		$query = mysql_query($sql);
		if (!$query) {
			die('Erreur mysql_query : ' . mysql_error());
		}

		$row = mysql_fetch_array($query);
		if (mysql_num_rows($query) == 1) {
			$sql = 'UPDATE insta_users SET USE_VALID=1 WHERE USE_CLE="' . $_GET['confirm'] . '"';
			$query = mysql_query($sql);
			if (!$query) {
				alert('An error occured while confirming your account. Please come later.', 'warning');
				die('Erreur mysql_query : ' . mysql_error());
			}
			alert('Your account has successfully been confirmed.');
		} else {
			alert('Your account has already been confirmed.', 'warning');
		}
	}
