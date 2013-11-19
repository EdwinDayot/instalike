<?php

	if (isset($_POST['username'])) {
		$sql = 'SELECT * FROM insta_users WHERE USE_USERNAME="' . $_POST['username'] . '"';
		$query = mysql_query($sql);
		if (!$query) {
			die('Erreur mysql_query : ' . mysql_error());
		}

		$row = mysql_fetch_array($query);

		if (!isset($_POST['agree'])) {
			$_POST['agree']	= 0;
		}

		if (mysql_num_rows($query) == 1) {
			alert('User already exist.', 'danger');
		} else {
			if ($_POST['agree'] == true) {
				if ($_POST['password'] == $_POST['confirm']) {
					
					$sql = "INSERT INTO insta_users (USE_USERNAME, USE_PASSWORD, USE_MAIL) VALUES ('" . $_POST['username'] . "', '" . md5($_POST['password']) . "', '" . $_POST['mail'] . "')";
					$query = mysql_query($sql);
					if (!$query) {
						die('Erreur mysql_query : ' . mysql_error());
					}
					alert('Your account has been successfully created.', 'success');
				
				} else {
					alert('Passwords doesn\'t match.', 'danger');
				}
			} else {
				alert('You must accept the terms of use.', 'danger');

			}
		}
	}
