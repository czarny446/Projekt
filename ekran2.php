<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: ekran_logowania.php');
		exit();
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
 <link href="style.css"rel="stylesheet"/>
</head>
<body>
 <a href="wyloguj.php"><button class="przycisk1">Wyloguj się</button></a>
 Jesteś zalogowany
 
  
</body>
</html>