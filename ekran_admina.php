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
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 <center>
	<a href="dodawanie_książek.php"><button class="button-6">Dodaj książkę</button></a>
	<br/>
	<br/>
	<a href="dodawanie_książek.php"><button class="button-6">Dodawanie wyporzyczenia</button></a>
 </center>
  
</body>
</html>