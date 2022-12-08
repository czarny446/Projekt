<?php

	$a = $_POST['a'];
	$haslo_hash = password_hash($a, PASSWORD_DEFAULT);
	echo $haslo_hash;
	
?>
<!doctype html>
<html>
<head>
 <link href="style.css" rel="stylesheet"/>
</head>
<body>
	<form method="post">
	<input type="text" name="a"/>
	<input type="submit" value="ddff"/>
	</form>
 
</body>
</html>