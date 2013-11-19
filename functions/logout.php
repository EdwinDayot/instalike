<?php

	header('refresh:5; url=' . BASE_URL);

	if (isset($_SESSION['username'])) {
		setcookie('username', '', time()-3600*24);
		setcookie('password', '', time()-3600*24);
		session_destroy();

		alert('You\'ve been successfully disconnected. You\'ll be redirect in about 5s. If not, click <a href="' . BASE_URL . '">here</a>.');
	}
