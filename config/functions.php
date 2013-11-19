<?php

	$alert;

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
		if (!isset($_SESSION['userid'])) {
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
				if ($row['USE_VALID'] == 1) {
					$_SESSION['userid'] = $row['USE_ID'];
					$_SESSION['username'] = $login;
					if ($remember == true) {
						setcookie('username', $login, time()+3600*24*91.3105497);
						setcookie('password', $password, time()+3600*24*91.3105497);
					}
					redirect(BASE_URL);
					return true;
				} else {
					alert('Your account hasen\'t been confirmed yet.', 'warning');
				}
			} else {
				alert('Wrong username or password', 'danger');
			}
		}
	}

	function alert($message, $type = null)
	{
		global $alert;

		if (isset($type)) {
			$alert = '<div class="alert alert-' . $type . '">' . $message . '</div>';
		} else {
			$alert = '<div class="alert alert-success">' . $message . '</div>';
		}
	}

	/**
	 * Send a mail
	 * @param string $from FROM
	 * @param string $return REPLY
	 * @param string $to TO
	 * @param string $subject SUBJECT
	 * @param string $text MESSAGE
	 * @param string $file FILE
	 *
	 * @throws string
	 */
	function sendmail($from, $to, $subject, $text, $return = null, $file = null)
	{
		$boundary = md5(uniqid(mt_rand()));

		if (isset($file)) {
			$file_extension = pathinfo($file, PATHINFO_EXTENSION);

			if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'JPG' || $file_extension == 'JPEG') {
				$file_extension = 'jpeg';
			} elseif ($file_extension == 'png' || $file_extension == 'PNG') {
				$file_extension = 'png';
			} elseif ($file_extension == 'gif' || $file_extension == 'GIF') {
				$file_extension = 'gif';
			} else {
				alert('Wrong File Type.', 'danger');
				throw new Exception("Wrong File Type.");
			}
		}

		$headers = 'From: "Instalike" <' . $from . '>' . "\n";
		if (isset($return)) {
			$headers .= 'Reply-To: <' . $return . '>' . "\n";
			$headers .= 'Return-Path: <' . $return . '>' . "\n";
		} else {
			$headers .= 'Reply-To: <' . $from . '>' . "\n";
			$headers .= 'Return-Path: <' . $from . '>' . "\n";
		}
		$headers .= 'MIME-VERSION: 1.0' . "\n";
		$headers .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"';

		$message = 'This is a multi-part message in MIME format.' . "\n\n";

		$message .= '--' . $boundary . "\n";
		$message .= 'Content-Type: text/html; charset="iso-8859-1"' . "\n";
		$message .= 'Content-Transfer-Encoding: 8bit' . "\n\n";
		$message .= $text . "\n\n";

		if (isset($file)) {
			$message .= '--' . $boundary . "\n";
			$message .= 'Content-Type: image/' . $file_extension . '; name="' . $file . '"' . "\n";
			$message .= 'Content-Transfer-Encoding: base64' . "\n";
			$message .= 'Content-Disposition:attachement; filename="' . $file . '"' . "\n\n";
			$message .= chunk_split(base64_encode(file_get_contents($file))) . "\n";
		}

		if (!mail($to, $subject, $message, $headers)) {
			throw new Exception("An error occured while send the message.");
			alert('An error occured while send the message.', 'danger');
		}
	}
