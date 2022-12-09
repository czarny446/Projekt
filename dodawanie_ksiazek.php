<?php
 session_start();
 
 if(isset($_POST['tytul']))
 {
	 //Udana walidacja
	 $wszystko_OK=true;
	 
	 //Sprawdzenie poprawności tytułu
	 $tytul = $_POST['tytul'];
	 $sprawdz = '/(*UTF8)^"[A-ZŁŚ.]+[a-ząęółśżźćń]+\s*[A-ZŁŚ.]*[a-ząęółśżźćń]*"$/';
	 
	 if(strlen($tytul)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_tytul']="Proszę podać tytuł!";
	 }
	  else if(!preg_match($sprawdz, $tytul)) 
	 {
		  $wszystko_OK=false;
		 $_SESSION['blad_tytul']="Tytuł musi zaczynać się z wielkiej litery i być zawarty w cudzysłowiu!";
	 }
	 
	 //Sprawdzenie poprawności autora
	 $autor = $_POST['autor'];
	 $sprawdz = '/(*UTF8)^[A-ZŁŚ.]+[a-ząęółśżźćń]+\s*[A-ZŁŚ.]*[a-ząęółśżźćń]*$/';
	 
	 if((strlen($autor)<=0))
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_autor']="Proszę podać autora!";
	 }
	 else if(!preg_match($sprawdz, $autor)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_autor']="Autor musi rozpoczynać się z wielkiej litery nie może zawierać znaków specjalnych!";
	 }
	 
	 //Sprawdzenie poprawności wydawnictwa
	 $wydawnictwo = $_POST['wydawnictwo'];
	 //$sprawdz = '/(*UTF8)^[A-ZŁŚ.]+[a-ząęółśżźćń]+\s*[A-ZŁŚ.]*[a-ząęółśżźćń]*$/';
	
	 if(strlen($wydawnictwo)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_wydawnictwo']="Proszę wpisać wydawnictwo!";
	 }
	 //else if(!preg_match($sprawdz, $wydawnictwo)) 
	// {
		 //$wszystko_OK=false;
		// $_SESSION['blad_wydawnictwo']="Wydawnictwo nie może zawierać znaków specjalnych!";
	 //}
	 
	 
	 //Poprawność roku wydania
	 $rok_wydania = $_POST['rok_wydania'];
	 $sprawdz = '/(*UTF8)^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/Du';
	 
	 if(strlen($rok_wydania)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_rok_wydania']="Proszę podać rok wydania!";
	 }
	 else if(!preg_match($sprawdz, $rok_wydania)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_rok_wydania']="Proszę podać poprawną datę wydania rrrr-mm-dd!";
	 }
	 //Sprawdzenie poprawności kategorii
	 $kategoria = $_POST['kategoria'];
	 $sprawdz = '/(*UTF8)^[A-ZŁŚ.]*[a-ząęółśżźćń]+\s*[A-ZŁŚ.]*[a-ząęółśżźćń]*$/';
	
	 if(strlen($kategoria)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_kategoria']="Proszę wpisać kategorię!";
	 }
	 else if(!preg_match($sprawdz, $kategoria)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_kategoria']="Kategoria nie może zawierać znaków specjalnych!";
	 }
	 
	 //Poprawność opisu
	 $opis = $_POST['opis'];
	 
	 if(strlen($opis)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_opisu']="Proszę podać opis!";
	 }
	
	 
	 
	 
	 require_once "cnct.php";
	 mysqli_report(MYSQLI_REPORT_STRICT);
	 try 
	 {
		 $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
		 if($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
			
			$rezultat = $polaczenie->query("SELECT ID_ksiazki FROM ksiazki WHERE Tytul='$tytul'");
			
			if(!$rezultat) throw new Exception($polaczenie->error);
			
			
			
			
			
			if($wszystko_OK==true)
			{
			   //Wszysto jest poprawne
			 
			  if($polaczenie->query("INSERT INTO ksiazki(`ID_ksiazki`, `Tytul`, `Autor`, `Wydawnictwo`, `Rok_wydania`, `ID_kategorii`, `Opis`) VALUES (NULL, '$tytul', '$autor', '$wydawnictwo', '$rok_wydania', '$kategoria',
			  '$opis')"))
			  {
				 $_SESSION['udanarejestracja']=true;
				 header('Location: ekran_admina.php');
			  }
			  else
			  {
				 throw new Exception($polaczenie->error); 
			  }
			  
			}
			
			$polaczenie->close();			
			}
	 }
	 catch(Exception $e)
	 {
		 echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimmy o rejestrację w innym terminie!</span>';
		 echo '<br/>Informacja developerska: '.$e;
	 }
	
 }

?>
<!doctype html>
<html lang="pl">
<head>
 <meta charset="utf-8"/>
 <title>Biblioteka</title>
 <link href="style.css" rel="stylesheet"/>
</head>
	<br/><br/><br/><br/>
<body>
<div id="home"> <a href="ekran_admina.php"><button class="button-6"> Wróć</button></a></div>
<center>
 <h2>Dodawanie książek:</h2>
 <form  method="post">
 
    Tytuł: <br/> <input type="text" name="tytul"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_tytul']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_tytul'].'</div>';
		 unset($_SESSION['blad_tytul']);
	 }
	?>
	
	Autor: <br/> <input type="text" name="autor"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_autor']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_autor'].'</div>';
		 unset($_SESSION['blad_autor']);
	 }
	?>
 
	Wydawnictwo: <br/> <input type="text" name="wydawnictwo"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_wydawnictwo']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_wydawnictwo'].'</div>';
		 unset($_SESSION['blad_wydawnictwo']);
	 }
	?>
	
	
	Rok wydania: <br/> <input type="text" name="rok_wydania"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_rok_wydania']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_rok_wydania'].'</div>';
		 unset($_SESSION['blad_rok_wydania']);
	 }
	?>
	
	<?php
	require_once "cnct.php";
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	$zapytanie=$polaczenie->query("SELECT * FROM kategorie");
		if($zapytanie->num_rows>0)
		{
			echo 'Wybierz kategorię: <br/>';
			echo '<select name="kategoria" >';
			while ($i=$zapytanie->fetch_assoc())
			{
				echo '<option value="'.$i['Id_kategorii'].'">'.$i['Nazwa'].'</option>';
			}
			echo '</select> <br/><br/><br>';
		}
		else
		{
			echo "Nie ma żadnej kategorii w bazie danych";
		}
	
	 //if(isset($_SESSION['blad_kategoria']))
	 //{
		// echo '<div class="error">'.$_SESSION['blad_kategoria'].'</div>';
		// unset($_SESSION['blad_kategoria']);
	 //}
	?>
	
	
	Opis: <br/> <textarea name="opis" style="height:250px; width:350px;"></textarea> <br/>
	
    <input type="submit" value="Zarejestruj się!"/>
 </form>


 
 </center>
</body>
</html>