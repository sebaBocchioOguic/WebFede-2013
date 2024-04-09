<?php
    session_start();
	$login_ok = $_SESSION['login'];
	if ($login_ok != "ok")
	{
		header("Location:./form_login.php?error=2");
	}
?>