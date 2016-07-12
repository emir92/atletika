<!doctype php>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../scripts/logo.css">
		<link rel="stylesheet" href="../scripts/stil.css">
		<title>Atletika</title>
	</head>
	<body>
	
		<header>
			<div class="atletika-logo"> Atletika
				<span class="atletika-box">&nbsp; </span>
				
			</div>
			<h1>Sve o atletici </h1>
		</header>
		<?php if( !isset( $_SESSION['user_name'] ) ) { ?>
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="aktivan"><a href="">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</nav>
		
		<ul class="linkovi">
			<li><a href="http://www.etf.unsa.ba">ETF</a></li>
			<li><a href="http://www.w3schools.com/">W3SCHOOL</a></li>
			<li><a href="http://www.facebok.com">FACEBOOK</a></li>
			<li><a href="http://www.klix.ba">KLIX</a></li>
			<li><a href="http://www.iaaf.org">IAFF</a></li>
			<li><a href="http://www.avaz.ba">AVAZ</a></li>
		</ul>
		
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="aktivan"><a href="">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</footer>
		
		<?php } else { ?> 
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="aktivan"><a href="">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</nav>
		
		<ul class="linkovi">
			<li><a href="http://www.etf.unsa.ba">ETF</a></li>
			<li><a href="http://www.w3schools.com/">W3SCHOOL</a></li>
			<li><a href="http://www.facebok.com">FACEBOOK</a></li>
			<li><a href="http://www.klix.ba">KLIX</a></li>
			<li><a href="http://www.iaaf.org">IAFF</a></li>
			<li><a href="http://www.avaz.ba">AVAZ</a></li>
		</ul>
		
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="aktivan"><a href="">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</footer>
		
		<?php } ?>
	</body>
</html>