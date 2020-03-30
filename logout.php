<?php

	session_start();

	session_destroy();

	echo "<script> window.open('index1.php', '_self')</script>";

?>