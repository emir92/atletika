<!doctype php>
<?php session_start() ?>
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
		<?php if ( !isset( $_SESSION['user_name'] ) ) { ?>
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="aktivan"><a href="">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</nav>
		
		<table>
			<tr><th colspan="6">Calendar</th> </tr>
			<tr>
				<th>Meeting name</th>
				<th>Competition Category </th>
				<th>Venue</th>
				<th>Country</th>
				<th>Date</th>
			</tr>
			
			<tr class="nepar">
			<td>Bosnia Open</td>
			<td>Balkan</td>
			<td>Zenica</td>
			<td>BIH</td>
			<td>21.Mart</td>
			</tr>
			<tr class="par">
				<td>Zurich</td>
				<td>Diamont Legue</td>
				<td>Zurich</td>
				<td>SUI</td>
				<td>18.Decembar</td>
			</tr>
			<tr class="nepar">
				<td>Paris</td>
				<td>Diamont Legue</td>
				<td>Paris</td>
				<td>FRA</td>
				<td>21.Septembar</td>
			</tr>
			<tr class="par">
				<td>Zagreb</td>
				<td>Balkan</td>
				<td>Zagreb</td>
				<td>CRO</td>
				<td>1.Maj</td>
			</tr>
		</table>
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="aktivan"><a href="">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="login.php">Log in</a></li>
			</ul>
		</footer>
		
		<?php } else { ?> 
		<nav>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="aktivan"><a href="">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</nav>
		
		<table>
			<tr><th colspan="6">Calendar</th> </tr>
			<tr>
				<th>Meeting name</th>
				<th>Competition Category </th>
				<th>Venue</th>
				<th>Country</th>
				<th>Date</th>
			</tr>
			
			<tr class="nepar">
			<td>Bosnia Open</td>
			<td>Balkan</td>
			<td>Zenica</td>
			<td>BIH</td>
			<td>21.Mart</td>
			</tr>
			<tr class="par">
				<td>Zurich</td>
				<td>Diamont Legue</td>
				<td>Zurich</td>
				<td>SUI</td>
				<td>18.Decembar</td>
			</tr>
			<tr class="nepar">
				<td>Paris</td>
				<td>Diamont Legue</td>
				<td>Paris</td>
				<td>FRA</td>
				<td>21.Septembar</td>
			</tr>
			<tr class="par">
				<td>Zagreb</td>
				<td>Balkan</td>
				<td>Zagreb</td>
				<td>CRO</td>
				<td>1.Maj</td>
			</tr>
		</table>
		
		<footer>
			<ul class="navbar">
				<li class="navbarlista" ><a href="../">Home</a></li>
				<li class="aktivan"><a href="">Tabela</a></li>
				<li class="navbarlista"><a href="kontakt.php">Kontakt</a></li>
				<li class="navbarlista"><a href="link.php">Link</a></li>
				<li class="user"><a href="../include/logout.php">Log out: <?php echo $_SESSION['user_name']; ?></a></li>
			</ul>
		</footer>
		<?php  }  ?>
	</body>
</html>