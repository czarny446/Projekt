<?php

?>
<!doctype html>
<html>
<head lang="pl">
<meta charset="utf-8"/>
<title>Szkoła ponadgimnazjalna</title>
<link rel="stylesheet" href="styl.css"/>
</head>
<body>
 <div id="baner">
    <h1>Oceny uczniów: język polski</h1>
 </div>
 <div id="panel_lewy">
    <h2>Lista uczniów:</h2>
	<?php
	$host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="szkola";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$zapytanie = $polaczenie->query("SELECT imie, nazwisko FROM `uczen`");
		
		
			echo '<ol>';
		
			while ($i=$zapytanie->fetch_assoc())
			{
				echo '<li> '.$i['imie'].' '.$i['nazwisko'].'</li>';
			}
			echo '</select> <br/><br/><br>';
			
			echo '</ol>';
			
		mysqli_close($polaczenie);
		
      
    ?>
 </div>
 <div id="panel_prawy">
    <h2>Uczeń:
	<?php
	$host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="szkola";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$zapytanie = $polaczenie->query("SELECT imie, nazwisko FROM `uczen`WHERE id = '2'");
	$i=$zapytanie->fetch_assoc();	
			
	echo $i['imie']." ".$i['nazwisko'];
	
	
    mysqli_close($polaczenie);
    ?>
	</h2>
	<p>Średnia ocen z języka polskiego:
	<?php
	$host="localhost";
	$db_user="root";
	$db_password="";
	$db_name="szkola";
	
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$zapytanie = $polaczenie->query("SELECT AVG(ocena) FROM `ocena` WHERE `przedmiot_id`='1' AND `uczen_id`='2'");
	$i=$zapytanie->fetch_assoc();	
			
	echo  $i['AVG(ocena)'];
	
	
    mysqli_close($polaczenie);
    ?>
	</p>
 </div>
 <div id="stopka">
	<h3>Zespół Szkół Ponadgimnazjalnych</br>Stronę opracował:</h3>
 </div>
</body>
</html>