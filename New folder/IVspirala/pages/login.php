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
	
		if( !isset($_SESSION['user_name']) ){
		include("../include/connection.php");
	
	?>
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
		
		
		if( isset($_POST['login']) && !empty($_POST['user']) && !empty($_POST['pass']) )
		{
			
			
			for($i = 0 ; $i<$velicina_autori;$i++)
			{
				if( $podaci_autori[$i]['username'] == $_POST['user']  && $podaci_autori[$i]['password'] == sha1($_POST['pass'])  ){
					$_SESSION['user_name']= $_POST['user'];
					$_SESSION['iduser']=$podaci_autori[$i]['idautora'];
					$_SESSION['name']=$podaci_autori[$i]['imeautora'];
					
					header('refresh : 0 ; url= ../' );
				}
				
			}
			
			$msg='Pogresan korisnik ili password';
			
			
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
		
		
		<?php }	else{ header("url= ../include/logout.php");}?>

</body>
</html>

<!--
 
	
	
</body>
</html>-->