<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="stillogo.css">
	<link rel="stylesheet" href="stil.css">
	<script src="home.js"></script>
	<title>Atletika</title>
</head>
<body>
	<header>
		<div class="wrap">
		<div class="logoHead"></div>
		<div class="logoBody"></div>
		<div class="logoArmLefta"></div>
		<div class="logoArmLeftb"></div>
		<div class="logoArmRighta"></div>
		<div class="logoArmRightb"></div>
		<div class="logoLegLefta"></div>
		<div class="logoLegLeftb"></div>
		<div class="logoLegRighta"></div>
		<div class="logoLegRightb"></div>
		</div>
	</header>
	<nav>
		<ul class="navul">
			<li class="navliactive"><a  class="nava" href="index.html">HOME</a></li>
			<li><a class="nava" href="link.html">LINK</a></li>
			<li><a class="nava" href="contactus.html">CONTACT US</a></li>
			<li ><a class="nava" href="tabel.html">TABEL</a></li>
		</ul>
	</nav>
	<div id="iv" class="izborVjesti">
		<ul class="navul">
		<li id="sv1" class="navliactive"><a class="nava" href="#" onclick="sveVijesti()"> Sve vijesti </a></li>
		<li id="sv2" class=""><a class="nava" href="#" onclick="danasnjeVijesti()"> Danasnje vijesti </a></li>
		<li id="sv3" class=""><a class="nava" href="#" onclick="sedmicneVijesti()"> Sedmicne vijesti </a></li>
		<li id="sv4" class=""><a class="nava" href="#" onclick="mjesecneVijesti()"> Mjesecne vijesti </a></li>
		<li id="sv5" class=""><a class="nava" href="#" onclick="dodaj()"> Dodaj Novost</a></li>
		<li id="sv6" class=""><a class="nava" href="logout.php" > Logout</a></li>
		</ul>
	</div><br>
	<div id="vjestidiv" class="vjestidiv">
	<ul id="vest" class="vjesti">
	<?php
		
		$niz = file('vijesti.csv');
		$vel = sizeof($niz);
		$vijesti;
		
		for( $i=0; $i<$vel; $i++ )
		{
			$vijesti[$i]=explode(';',$niz[$i]);		
		}
		
		foreach($vijesti as $key=> $row ){
			$dates[$key] = $row[4];
		}
		
		array_multisort($dates, SORT_DESC, $vijesti);
		
		for( $i=0; $i<$vel; $i++ )
		{
			$id='v'.($i+1);
			echo "<li class='vjestili'  id=\"".$id."\">";
			echo "<article id=\"vijest".($i+1)."\">";	
			echo "<h1>".$vijesti[$i][1]."</h1>";
			echo "<p><strong>Author:</strong>".$vijesti[$i][0].", <strong>Published:</strong></p><p id=\"vrijme".($i+1)."\"> Yesterday</p>"; // id='vrijme".$vijesti[$i][0]."
			echo "<div class='image-wrapper'>";
			echo "<img src=".$vijesti[$i][4]." alt='Amel Tuka'>";
			echo "<span>".$vijesti[$i][5]."</span></div>";
			echo "<p>".$vijesti[$i][2]."</p>";
			echo "<time hidden>".$vijesti[$i][3]."</time>";
			echo "</article></li>";
		}
		
	?>
	</ul>
	</div>
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
	<footer >
		<ul class="navul">
			<li class="navliactive"><a  class="nava" href="index.html">HOME</a></li>
			<li><a class="nava" href="link.html">LINK</a></li>
			<li><a class="nava" href="contactus.html">CONTACT US</a></li>
			<li ><a class="nava" href="tabel.html">TABEL</a></li>
		</ul>
	</footer>
	
<body>
</html>