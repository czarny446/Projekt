<?php
session_start();


	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}

	
 require_once "cnct.php";
 
 $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
 
 if($polaczenie->connect_errno!=0)
 {
	echo "Error: ".$polaczenie->connect_errno;
 }
 else
 {
	 $login = $_POST['login'];
     $haslo = $_POST['haslo'];
	 
	 $login = htmlentities($login, ENT_QUOTES, "UTF-8");
	 
	 
	 
	 if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM uczniowie 
	 WHERE Login='%s'", 
	 mysqli_real_escape_string($polaczenie,$login))))
		 //$rezultat to zmiennna przechowywująca wiersz z tabeli dla danego ucznia
	 {
		 $ilu_userow = $rezultat->num_rows;
		 if($ilu_userow>0)
		 {
			 $wiersz = $rezultat->fetch_assoc();
			 
			 if(password_verify($haslo, $wiersz['Haslo'] ))
			 {
			 
				 $_SESSION['zalogowany'] = true;
				 

				 $name = $wiersz['Imie'];
				 
				 
				 
				 
				 
				 unset ($_SESSION['blad']);
				 $rezultat->close();
				 header('Location: ekran2.php');
			 }else{
			 
			 header('Location: ekran_logowania.php');
			 $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			 
		     }
			 
			 
		 }else{
			 
			 header('Location: ekran_logowania.php');
			 $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			 
		 }
	 }
	  if($rezultat = @$polaczenie->query(sprintf("SELECT * FROM administratorzy 
	 WHERE login='%s'", 
	 mysqli_real_escape_string($polaczenie,$login))))
		 //$rezultat to zmiennna przechowywująca wiersz z tabeli dla danego ucznia
	 {
		 $ilu_userow = $rezultat->num_rows;
		 if($ilu_userow>0)
		 {
			 $wiersz = $rezultat->fetch_assoc();
			 
			 if(password_verify($haslo, $wiersz['haslo'] ))
			 {
			 
				 $_SESSION['zalogowany'] = true;
				 

				;
				 
				 
				 
				 
				 
				 unset ($_SESSION['blad']);
				 $rezultat->close();
				 header('Location: ekran_admina.php');
			 }else{
			 
			 header('Location: ekran_logowania.php');
			 $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			 
		     }
			 
			 
		 }else{
			 
			 header('Location: ekran_logowania.php');
			 $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			 
		 }
	 }
	 
	 $polaczenie->close();
 
 }

 

?>