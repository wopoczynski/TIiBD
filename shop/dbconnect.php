<?php

	$host="localhost";		// Nazwa hosta
	$user="root"; 				// Nazwa użytkownika - domyślnie: root
	$password=""; 			// Haslo do bazy
	$database="projekt";	 	// Nazwa bazy
	$link=mysqli_connect($host, $user, $password);
	mysqli_select_db($link,$database);
	mysqli_query($link, "SET CHARSET utf8");
	mysqli_query($link, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
	
	
?>