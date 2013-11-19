<?php

	if (!isset($_POST['remember'])) {
		$_POST['remember'] = 0;
	}

	if (isset($_POST['username'])) {
		connect($_POST['username'], md5($_POST['password']), $_POST['remember']);
	}	
