<?php 
	
	// create the log out modul 
	session_start(); 
	unset($_SESSION);
    session_unset();
	session_destroy(); 
	
	header('Location:index.html');
?>