<?php

	$sql = 'SELECT *
			FROM insta_follows A, insta_users B, insta_posts C
			WHERE A.USERS_USE_ID1 = B.USE_ID
			AND C.USERS_USE_ID = B.USE_ID
			AND A.USERS_USE_ID =' . $_SESSION['userid'] . '
			ORDER BY C.POS_ID DESC';
	$user = mysql_query($sql);
	if (!$user) {
		die('Erreur mysql_query : ' . mysql_error());
	}

	

?>
<div class="jumbotron">
<?php
	while ($row = mysql_fetch_object($user)) {
		foreach ($row as $k => $v) {

			if ($k == 'USE_USERNAME') {
				$username = $v;
			} elseif ($k == 'POS_PHOTO') {
?>
	<div class="row">
		<div class="col-md-6">
			<div class="thumbnail">
				<img src="<?php echo $v ?>">
				<div class="caption">
					<h3><?php echo $username; ?></h3>
				</div>
			</div>
		</div>
	</div>
<?php
			}
		}
	}
?>
</div>
