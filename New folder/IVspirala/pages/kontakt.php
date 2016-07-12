<!doctype php>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../scripts/logo.css">
		<link rel="stylesheet" href="../scripts/stil.css">
		<script src="../scripts/kontakt.js"></script>
		<title>Atletika</title>
	</head>
	<body>
		<header>
			<div class="atletika-logo"> Atletika
				<span class="atletika-box">&nbsp; </span>
				
			</div>
			<h1>Sve o atletici </h1>
		</header>
		<?php if( !isset($_SESSION['user_name']) ){	?>
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="aktivan"><a href="">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</nav>
		
		<form id="kontakt" class="kontakt" action="../">
		<fieldset>
			<br><br>
			<label> Unesite ime: </label>
			<br>
			<input type="text" name="ime" id="ime" onkeyup="imeProv()" required>
			<br><br>
			<label> Unesite Prezime: </label>
			<br>
			<input type="text" name="prezime" id="prezime" onkeyup="prezimeProv()" required >
			<br><br>
			<label> Unesite text: </label>
			<br>
			<textarea  name="text" rows="10" id="text" onkeyup="tekstProv()" required></textarea>
			<br><br>
			<input class="dugme" type="submit" name="submit" value="Posalji" id="submit">
			<br><br>
			</fieldset>
		</form>
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="aktivan"><a href="">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</footer>
		
		<?php } else { ?> 
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="aktivan"><a href="">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</nav>
		
		<form id="kontakt" class="kontakt" action="../">
		<fieldset>
			<br><br>
			<label> Unesite ime: </label>
			<br>
			<input type="text" name="ime" id="ime" onkeyup="imeProv()" required>
			<br><br>
			<label> Unesite Prezime: </label>
			<br>
			<input type="text" name="prezime" id="prezime" onkeyup="prezimeProv()" required >
			<br><br>
			<label> Unesite text: </label>
			<br>
			<textarea  name="text" rows="10" id="text" onkeyup="tekstProv()" required></textarea>
			<br><br>
			<input class="dugme" type="submit" name="submit" value="Posalji" id="submit">
			<br><br>
			</fieldset>
		</form>
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="aktivan"><a href="">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</footer>
		
		<?php } ?> 
	</body>
</html>