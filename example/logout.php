<?php
	session_start();

	unset($_SESSION['user_name']);
	echo 'wait..';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
?>