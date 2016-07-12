<!doctype html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../scripts/logo.css">
		<link rel="stylesheet" href="../scripts/stil.css">
		<script src="../scripts/nova.js"></script>
		<title>Atletika</title>
	</head>
	<body>
	
		<header>
			<div class="atletika-logo"> Atletika
				<span class="atletika-box">&nbsp; </span>
				
			</div>
			<h1>Sve o atletici </h1>
		</header>
		
		<?php if ( isset( $_SESSION['user_name'] ) ) { ?> 
		
		<nav>
			<ul class="navbar">
				<li class="aktivan" ><a href="../">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</nav>
		
		<div class="izborVijesti">
			<ul class="izborVijesti">
				<li class="aktivan"><a >Vijesti: </a></li>
				<li id="iv1" class="navbarlista" ><a href="../?nov=sve" onclick="sve()">Sve</a></li>
				<li id="iv2" class="navbarlista"><a href="../?nov=danasnje" onclick="danasnje()">Danasnje</a></li>
				<li id="iv3" class="navbarlista"><a href="../?nov=sedmicne" onclick="sedmicne()">Sedmicne</a></li>
				<li id="iv4" class="navbarlista"><a href="../?nov=mjesecne" onclick="mjesecne()">Mjesecne</a></li>
				<li class="aktivan"><a href="novavijest.php">Dodaj Novu </a></li>
			</ul>
		</div>
		
		<form action="novavijest.php" method="post" id="novavijest" class="kontakt" enctype="multipart/form-data">
			<fieldset>
				<br><br><br>
				<label> Naslov: </label><br>
				<input type="tekst" name="naslov" required onkeyup="naslovProv()"><br><br>
				<label> Autor: </label><br>
				<input type="tekst" name="autor" required onkeyup="autorProv()"><br><br>
				<label> Slika: </label><br>
				<input type="file" name="image" id="slika"><br><br>
				<label> Unesite text: </label>
				<br>
				<textarea  name="text" rows="10" id="text"  required onkeyup="tekstProv()"></textarea>
				<br><br>
				<label> Kod drzave: </label><br>
				<input type="tekst" name="koddrzave"  onkeyup="kodDrzave()"><br><br>
				<label> Tel Broj: </label><br>
				<input type="tekst" name="telbroj" onkeyup="brojDrzave()" ><br><br>
				<input class="dugme" type="submit" name="submit" value="Spasi" id="submit">
				<br><br>				
			</fieldset>
		</form>
		
		<?php 

			if( isset($_POST['submit'])  )
			{
				$naslov=htmlEntities($_POST['naslov'], ENT_QUOTES);
				$autor=htmlEntities($_POST['autor'], ENT_QUOTES);
				$tekst=htmlEntities($_POST['text'], ENT_QUOTES);
				$vrijeme= date('m.d.Y H:i:s');
				$slika = $_FILES['image']['name'];
				$tmp_slika =$_FILES['image']['tmp_name'];
				
				move_uploaded_file($tmp_slika, "../images/$slika");
				file_put_contents('../images/vijesti.csv',$autor.';'.$naslov.';'.$tekst.';'.$vrijeme.';'.$slika.';'."\n",FILE_APPEND);
				
			}
		?>
		

		<footer>
			<ul class="navbar">
				<li class="aktivan" ><a href="">Home</a></li>
				<li class="navbarlista"><a href="pages/tabela.php">Tabela</a></li>
				<li class="navbarlista"><a href="pages/kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="pages/link.php">Link</a></li>
				<li class="user"><a href="include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</footer>
		<?php } else { header('url: login.php' );} ?>
</html>