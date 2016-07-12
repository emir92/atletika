<!doctype php>
<?php session_start() ?> 
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="scripts/logo.css">
		<link rel="stylesheet" href="scripts/stil.css">
		<script src="scripts/index.js"></script>
		<title>Atletika</title>
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
		
		?>
		<nav>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="pages/login.php">Log in</a></li>
			</ul>
		</nav>
		
		<div class="izborVijesti">
			<ul class="izborVijesti">
				<li class="aktivan"><a >Vijesti: </a></li>
				<li id="iv1" class="aktivan" ><a href="#" onclick="sve()">Sve</a></li>
				<li id="iv2" class="navbarlista"><a href="#" onclick="danasnje()">Danasnje</a></li>
				<li id="iv3" class="navbarlista"><a href="#" onclick="sedmicne()">Sedmicne</a></li>
				<li id="iv4" class="navbarlista"><a href="#" onclick="mjesecne()">Mjesecne</a></li>
			</ul>
		</div>
		
		 
		
		<?php 
		
		if( !isset( $_GET['sor'] ) ){
			include("include/vijesti.php"); 
		} 
		else
		{
			$sortiranje= $_GET['sor'];
			include("include/vijesti.php");
		}
		?>

		
		<footer>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="pages/login.php">Log in</a></li>
			</ul>
		</footer>
		
		<?php } else { ?> 
		
		
		<nav>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="include/logout.php">Log out: <?php echo $_SESSION['name']; ?></a></li>
			</ul>
		</nav>
		
		
		<div class="izborVijesti">
			<ul class="izborVijesti">
				<li class="aktivan"><a >Vijesti: </a></li>
				<li id="iv1" class="aktivan" ><a href="index.php#" onclick="sve()">Sve</a></li>
				<li id="iv2" class="navbarlista"><a href="index.php#" onclick="danasnje()">Danasnje</a></li>
				<li id="iv3" class="navbarlista"><a href="index.php#" onclick="sedmicne()">Sedmicne</a></li>
				<li id="iv4" class="navbarlista"><a href="index.php#" onclick="mjesecne()">Mjesecne</a></li>
				<li class="navbarlista"><a href="pages/novavijest.php">Dodaj Novu </a></li>
			</ul>
		</div>
		<?php 
		
		if( !isset( $_GET['sor'] ) ){
			include("include/vijesti.php"); 
		} 
		else
		{
			$sortiranje= $_GET['sor'];
			include("include/vijesti.php");
		}
		?>
		
		<footer>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="include/logout.php">Log out: <?php echo $_SESSION['name']; ?></a></li>
			</ul>
		</footer>
		
		<?php
			if(isset($_GET['nov']) ){
		    if($_GET['nov']=='sve'  ) echo '<script> sve(); </script> '; 
			if($_GET['nov']=='danasnje'  )echo '<script> danasnje(); </script> ';
			if( $_GET['nov']=='sedmicne'  )echo '<script> sedmicne(); </script> ';
			if( $_GET['nov']=='mjesecne' )  echo '<script> mjesecne(); </script> ';
;
			}?>
		
		
		<?php } ?>
	</body>
</html>