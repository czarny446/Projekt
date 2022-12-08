<?php

	session_start();
	
	unset($_SESSION['juz_istnieje']);
	unset($_SESSION['blad']);
	
	
?>
<!doctype html>
<html>
<head>
 <link href="style.css" rel="stylesheet"/>
</head>
<body>
	
 <center>
  
    <h1><font size="7" face="Arial">Witamy na stronie biblioteki szkolnej</font></h1>

	<img src="bookshelf.png" />
	<br/>
    <a href="ekran_logowania.php"><button class="button-6">Zaloguj</button></a>
	<br/><br/>
	<a href="ekran_rejestracji.php"><button class="button-6">Zarejestruj</button></a>
	
 
 </center>
</body>
</html>