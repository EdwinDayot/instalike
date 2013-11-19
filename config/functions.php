<?php

	function redirect($url, $time = null)
	{
		if (isset($time)) {
			header('refresh=' . $time . '; url=' . $url);
		} else {
			header('Location: ' . $url);
		}
		
	}

	function connect($login, $password, $remember = null)
	{
		$sql = 'SELECT * FROM insta_users WHERE USE_USERNAME="' . $login . '" AND USE_PASSWORD="' . $password . '"';
		$query = mysql_query($sql);
		if (!$query) {
			die('Erreur mysql_query : ' . mysql_error());
		}

		$row = mysql_fetch_array($query);

		if (!isset($remember)) {
			$remember = 0;
		}

		if (mysql_num_rows($query) == 1) {
			$_SESSION['userid'] = $row['USE_ID'];
			$_SESSION['username'] = $login;
			if ($remember == true) {
				setcookie('username', $login, time()+3600*24*91.3105497);
				setcookie('password', $password, time()+3600*24*91.3105497);
			}
			return true;
		} else {
			alert('Wrong username or password', 'danger');
		}
	}

	function alert($message, $type = null)
	{
		if (isset($type)) {
			echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
		} else {
			echo '<div class="alert alert-success">' . $message . '</div>';
		}
	}
