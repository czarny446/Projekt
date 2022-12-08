<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: ekran2.php');
		exit();
	}

			  
?>
<!doctype html>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
 <title>Biblioteka</title>
 <link rel="stylesheet" href="style.css"/>
</head>

	<div id="home"> <a href="index.php"><button class="button-6"> Powrót do strony głównej</button></a></div>
	
	<br/><br/><br/><br/>
	
<body>

<center>
 <form action="zaloguj.php" method="post">
  
    Login:<br/><input type="text" name="login"/><br/>
	Haslo:<br/><input type="password" name="haslo"/><br/><br/>
	 <input class="button-6" type="submit" value="Zaloguj się"/>
 </form>
  <br/>
  

 <?php
 
   if(isset($_SESSION['juz_istnieje']))	echo $_SESSION['juz_istnieje'];
   if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
   
 ?>
 </center>
</body>
</html>