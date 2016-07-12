<!Doctype html>
<?php session_start(); ?>
<html>
<head>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../scripts/logo.css">
		<link rel="stylesheet" href="../scripts/stil.css">
		<title>Atletika</title>
	</head>
</head>
<body>
	<header>
		<div class="atletika-logo"> Atletika
				<span class="atletika-box">&nbsp; </span>	
		</div>
		<h1>Sve o atletici </h1>
	</header>
	
	<?php	
	if( !isset($_SESSION['user']) ){?>
		<nav>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
			</ul>
		</nav>
		
		<div>
			<?php
		$msg='';
		$fajl= file ('../images/users.csv');
		
		if( isset($_POST['login']) && !empty($_POST['user']) && !empty($_POST['pass']) )
		{
			$sadrzaj=explode(',',$fajl[0]);
			
			if( $_POST['user'] == $sadrzaj[0] && sha1($_POST['pass'])==$sadrzaj[1] )
			{
				
				$_SESSION['user_name']=$sadrzaj[0];
				$msg= $_SESSION['user_name'];
				header('refresh : 0 ; url= ../' );
			}
			else $msg='Pogresan korisnik ili password';
		}
	?>
	
	<form action="login.php" method="post" class="kontakt">
		<div>
			<br>
			<label> Korisničko ime: </label><br>
			<input id="user" name="user" type="text" required> <br><br>
			<label> Korisnička šifra: </label><br>
			<input id="pass" name="pass" type="password" required> <br><br>
			<input type="submit" name="login" value="Login"><br><br>
		</div>
	</form>
		<footer>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
			</ul>
		</footer>
		
		
		<?php }	else{ header("location: logout.php");}?>

</body>
</html>

<!--
 
	
	
</body>
</html>-->