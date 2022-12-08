<?php
 session_start();
 
 if(isset($_POST['email']))
 {
	 //Udana walidacja
	 $wszystko_OK=true;
	 
	 //Sprawdzenie poprawności imienia
	 $imie = $_POST['imie'];
	 $sprawdz = '/(*UTF8)^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';
	 
	 if(strlen($imie)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_imie']="Proszę podać imie!";
	 }
	  else if(!preg_match($sprawdz, $imie)) 
	 {
		  $wszystko_OK=false;
		 $_SESSION['blad_imie']="Imię musi zaczynać się z wielkiej litery i nie może zawierać znaków specjalnych!";
	 }
	 
	 //Sprawdzenie poprawności nazwiska
	 $nazwisko = $_POST['nazwisko'];
	 $sprawdz = '/(*UTF8)^[A-ZŁŚ]{1}+[a-ząęółśżźćń]+$/';
	 
	 if((strlen($nazwisko)<=0))
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_nazwisko']="Proszę podać nazwisko!";
	 }
	 else if(!preg_match($sprawdz, $nazwisko)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_nazwisko']="Nazwisko musi zaczynać się z wielkiej litery i nie może zawierać znaków specjalnych!";
	 }
	 
	 //Sprawdzenie poprawności loginu
	 $login = $_POST['login'];
	 
	 //Sprawdzenie długości loginu
	 if((strlen($login)<3)||(strlen($login)>20))
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_login']="Login musi posiadać od 3 do 20 znaków!";
	 }
	 
	 //poprawność adresu email
	 $email = $_POST['email'];
	 $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
	 
	 if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_email']="Podaj poprawny adres e-mail!";
	 }
	 
	 //Sprawdzenie poprawności miejscowości
	 $miejscowosc = $_POST['miejscowosc'];
	 $sprawdz = '/(*UTF8)^[A-ZŁŚ]{1,10}+[a-ząęółśżźćń].+$/';
	 
	 if(strlen($miejscowosc)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_miejscowosc']="Proszę podać miejscowość!";
	 }
	  else if(!preg_match($sprawdz, $miejscowosc)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_miejscowosc']="Proszę podać poprawną nazwę miejscowości!";
	 }
	 
	 //Sprawdzanie poprawności ulicy
	 $ulica = $_POST['ulica'];
	 $sprawdz = '/(*UTF8)^[ul]+\.[a-zA-Z0-9\-\]+$]/';
	 
	 if(strlen($ulica)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_ulica']="Proszę podać ulicę!";
	 }
	 else if(!preg_match($sprawdz, $ulica)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_ulica']="Proszę podać poprawną nazwę ulicy zaczynającą się na 'ul.'!";
	 }
	 
	 //Sprawdzenie numeru domu
	 $nr_domu = $_POST['nr_domu'];
	 if(strlen($nr_domu)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_nr_domu']="Proszę podać numer domu/numer mieszkania(jeśli możliwe)!";
	 }
	 
	 //Poprawność kodu pocztowego
	 $kod_pocztowy = $_POST['kod_pocztowy'];
	 $sprawdz = '/(*UTF8)^[0-9]{0,2}-?[0-9]{3}$/Du';
	 
	 if(strlen($kod_pocztowy)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_kod_pocztowy']="Proszę podać kod pocztowy!";
	 }
	 else if(!preg_match($sprawdz, $kod_pocztowy)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_kod_pocztowy']="Proszę podać poprawny kod pocztowy np. 18-400!";
	 }
	 
	 //Poprawność daty urodzenia
	 $data_urodzenia = $_POST['data_urodzenia'];
	 $sprawdz = '/(*UTF8)^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/Du';
	 
	 if(strlen($data_urodzenia)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_data_urodzenia']="Proszę podać datę urodzenia!";
	 }
	 else if(!preg_match($sprawdz, $data_urodzenia)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_data_urodzenia']="Proszę podać poprawną datę urodzenia rrrr-mm-dd!";
	 }
	 
	 //Poprawność telefonu
	 $nr_telefonu = $_POST['telefon'];
	 $sprawdz = '/(*UTF8)^[0-9]{3}\s?[0-9]{3}\s?[0-9]{3}$/Du';
	 
	 if(strlen($nr_telefonu)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_nr_telefonu']="Proszę podać numer telefonu!";
	 }
	 else if(!preg_match($sprawdz, $nr_telefonu)) 
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_nr_telefonu']="Proszę podać poprawny numer telefonu np. 111 111 111!";
	 }
	 
	 //płeć
	 $plec = $_POST['plec'];
	 if(strlen($plec)<=0)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_plec']="Proszę podać płeć!";
	 }
	 
	 //poprawność hasła
	 $haslo1 = $_POST['haslo1'];
	 $haslo2 = $_POST['haslo2'];
	 
	 if((strlen($haslo1)<8) || (strlen($haslo1)>20))
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_haslo']="Hasło musi zawierać od 8 do 20 znaków!";
	 }
	 
	 if($haslo1!=$haslo2)
	 {
		 $wszystko_OK=false;
		 $_SESSION['blad_haslo']="Podane hasła nie są identyczne!";
	 }
	 
	 $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
	 
	 //Czy zaakceptowano regulamin?
	 if(!isset($_POST['regulamin']))
	 {
		$wszystko_OK=false;
		$_SESSION['blad_regulamin']="Wymagane jest zaakceptowanie regulaminu"; 
	 }
	 //Czy nie znajduje się już ktoś o takim samym loginie lub mailu?
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
			// Czy email już istnieje? 
			$rezultat = $polaczenie->query("SELECT ID_ucznia FROM uczniowie WHERE Email='$email'");
			
			if(!$rezultat) throw new Exception($polaczenie->error);
			
			$ile_takich_maili = $rezultat->num_rows;
			if($ile_takich_maili>0)
			{
				$wszystko_OK=false;
				$_SESSION['blad_email']="Istnieje już konto o podanym adresie email!";
				
			}
			// Czy login już istnieje? 
			$rezultat = $polaczenie->query("SELECT ID_ucznia FROM uczniowie WHERE Login='$login'");
			
			if(!$rezultat) throw new Exception($polaczenie->error);
			
			$ile_takich_loginow = $rezultat->num_rows;
			if($ile_takich_loginow>0)
			{
				$wszystko_OK=false;
				$_SESSION['blad_login']="Istnieje już konto o podanym loginie!";
				
			}
			
			if($ile_takich_maili>0 && $ile_takich_loginow>0)
			{  
		        
				header('Location: ekran_logowania.php');
				$_SESSION['juz_istnieje']="Istnieje już konto o podanym loginie oraz adresie e-mail! Czy chciałbyś się zalogować?<br/>";
				exit();
				
				
			}
			else
			{
				unset($_SESSION['juz_istnieje']);
			}
			
			if($wszystko_OK==true)
			{
			   //Wszysto jest poprawne
		      
			  if($polaczenie->query("INSERT INTO uczniowie(`ID_ucznia`, `Imie`, `Nazwisko`, `Login`, `Haslo`, `Miejscowosc`, `Ulica`, `Nr.domu`, `Kod_pocztowy`, `Data_urodzenia`, `Telefon`, `Email`, `plec` ) VALUES (NULL, '$imie', '$nazwisko', '$login', '$haslo_hash', '$miejscowosc',
			  '$ulica', '$nr_domu', '$kod_pocztowy', '$data_urodzenia', '$nr_telefonu','$email', '$plec' )"))
			  {
				 $_SESSION['udanarejestracja']=true;
				 header('Location: witamy.php');
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
<center>
 <h2>Rejestracja ucznia:</h2>
 <form  method="post">
 
    Imie: <br/> <input type="text" name="imie"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_imie']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_imie'].'</div>';
		 unset($_SESSION['blad_imie']);
	 }
	?>
	
	Nazwisko: <br/> <input type="text" name="nazwisko"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_nazwisko']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_nazwisko'].'</div>';
		 unset($_SESSION['blad_nazwisko']);
	 }
	?>
 
	Login: <br/> <input type="text" name="login"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_login']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_login'].'</div>';
		 unset($_SESSION['blad_login']);
	 }
	?>
	
	Hasło: <br/> <input type="password" name="haslo1"/> <br/>
	
	
	<?php
	 if(isset($_SESSION['blad_haslo']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_haslo'].'</div>';
		 unset($_SESSION['blad_haslo']);
	 }
	?>
	
	Powtórz hasło: <br/> <input type="password" name="haslo2"/> <br/>
	
	
	E-mail: <br/> <input type="text" name="email"/> <br/>
	
	
	<?php
	 if(isset($_SESSION['blad_email']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_email'].'</div>';
		 unset($_SESSION['blad_email']);
	 }
	?>
	
	Miejscowość: <br/> <input type="text" name="miejscowosc"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_miejscowosc']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_miejscowosc'].'</div>';
		 unset($_SESSION['blad_miejscowosc']);
	 }
	?>
	
	Ulica: <br/> <input type="text" name="ulica"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_ulica']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_ulica'].'</div>';
		 unset($_SESSION['blad_ulica']);
	 }
	?>
	
	Nr domu/numer mieszkania: <br/> <input type="text" name="nr_domu"/> <br/>

	<?php
	 if(isset($_SESSION['blad_nr_domu']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_nr_domu'].'</div>';
		 unset($_SESSION['blad_nr_domu']);
	 }
	?>
	
	Kod pocztowy: <br/> <input type="text" name="kod_pocztowy"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_kod_pocztowy']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_kod_pocztowy'].'</div>';
		 unset($_SESSION['blad_kod_pocztowy']);
	 }
	?>
	
	Data urodzenia: <br/> <input type="text" name="data_urodzenia"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_data_urodzenia']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_data_urodzenia'].'</div>';
		 unset($_SESSION['blad_data_urodzenia']);
	 }
	?>
	
	Telefon: <br/> <input type="text" name="telefon"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_nr_telefonu']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_nr_telefonu'].'</div>';
		 unset($_SESSION['blad_nr_telefonu']);
	 }
	?>
	
	Płeć (M/Ż): <br/> <input type="text" name="plec"/> <br/>
	
	<?php
	 if(isset($_SESSION['blad_plec']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_plec'].'</div>';
		 unset($_SESSION['blad_plec']);
	 }
	?>
	
	
 <label>	
	<input type="checkbox" name="regulamin" />Akceptuję regulamin
 </label>
    <br/>
	<?php
	 if(isset($_SESSION['blad_regulamin']))
	 {
		 echo '<div class="error">'.$_SESSION['blad_regulamin'].'</div>';
		 unset($_SESSION['blad_regulamin']);
	 }
	?>
    <input type="submit" value="Zarejestruj się!"/>
 </form>


 
 </center>
</body>
</html>