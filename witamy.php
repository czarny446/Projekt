<?php
session_start();


	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		unset ($_SESSION['udanarejestracja']);
	}
?>
<!doctype html>
<html>
<head>
 <link href="style.css" rel="stylesheet"/>
</head>
<body>
	
 <center>
  
    <h1><font size="5" face="Arial">DZIĘKUJEMY ZA REJESTRACJĘ NA STRONIE BIBLIOTEKI SZKOLNEJ! MOŻESZ JUŻ ZALOGOWAĆ SIĘ NA SWOJE KONTO!</font></h1>

	<img src="bookshelf.png" />
	<br/>
    <a href="ekran_logowania.php"><button class="button-6">Przejdź na stronę logowania</button></a>
	
	
 
 </center>
</body>
</html>