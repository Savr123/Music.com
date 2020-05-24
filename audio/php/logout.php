<?php
	require_once "config.php";
  set_include_path('W:/domains/localhost/');

	unset( $_SESSION['logged_user'] );
  header('Location:/Music.com/index.php');
?>
