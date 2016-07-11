<!Doctype html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="scripts/stillogo.css">
	<link rel="stylesheet" href="scripts/stil.css">
	<script src="scripts/home.js"></script>
	<title>Atletika</title>
</head>
<body>
	<header><?php include("include/header.php"); ?>	</header>
	
	
<?php	
	
	if( !isset($_SESSION['user_name']) ){?>
		<nav>
			<ul class="navul">
				<?php include("include/footer.php"); ?>	
				<li ><a class="nava" href="include/login.php">LOGIN</a></li>
				
			</ul>
		</nav>
		
		
		<div class="izborVjesti"><?php include("include/news.php"); ?> <div>
		<div id="novaVijest" ></div>
		<footer>
			<ul class="navul">
				<?php include("include/footer.php"); ?>
				<li ><a class="nava" href="include/login.php">LOGIN</a></li>
			</ul>
		</footer>
		
	<?php }	else{?>
		<nav>
			<ul class="navul">
				<?php include("include/footer.php"); ?>
				<li ><a class="nava" href="include/logout.php">LOGOUT</a></li>
				<li id="user1" ><a class="nava" >DOBRO DOŠAO: <?php echo strtoupper($_SESSION['user_name']) ?></a></li>
			</ul>
		</nav>
		
		<div class="izborVjesti"> <?php include("include/newsuser.php"); ?></div>
		<div id="novaVijest" >
		<form action='homeadmin.php' method='post'>
			<br><br><br>
			<label>Ime autora:</label><br>
			<input type='text' name='autor' required> </input><br><br>
			<label>Naslov:</label><br>
			<input type='text' name='naslov' required> </input><br><br>
			<label>Slika:</label><br>
			<input type='text' name='slika' required> </input><br><br>
			<textarea rows='20' clos='100' name='tekst' required></textarea><br>
			<input type='submit' class='button' name='potvrdi' value='Spasi vijest' />
		</form>
	</div>
	<?php
	 if(isset($_POST['potvrdi'])){ 
		$ime_autora = $_POST['autor'];
		$naslov = $_POST['naslov'];
		$artikal = $_POST['tekst'];
		$slika = $_POST['slika'];
		$vrijeme = date('m.d.Y');
		file_put_contents('vijesti.csv',"\n".$ime_autora.';'.$naslov.';'.$artikal.';'.$vrijeme.';'.$slika.';sadsad',FILE_APPEND);
		echo "<meta http-equiv='refresh' content='0'>";
	 }
	?>
		</div>
		<footer>
			<ul class="navul">
				<?php include("include/footer.php"); ?>
				<li ><a class="nava" href="include/logout.php">LOGOUT</a></li>
				<li id="user1" ><a class="nava" >DOBRO DOŠAO: <?php echo strtoupper($_SESSION['user_name']) ?></a></li>
			</ul>
		</footer>
		
<?php	}?>

	
	
	
	
	
</body>
</html>
