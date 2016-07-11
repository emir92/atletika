<!Doctype html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../scripts/stillogo.css">
	<link rel="stylesheet" href="../scripts/stil.css">
	
	<title>Atletika</title>
</head>
<body>
	<header><?php include("header.php"); ?>	</header>
	<?php	
	if( !isset($_SESSION['user']) ){?>
		<nav>
			<ul class="navul">
			<?php include("footer.php"); ?>	
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
	
	<form action="login.php" method="post">
		<div>
			<br>
			<input id="user" name="user" type="text" required> <br><br>
			<input id="pass" name="pass" type="password" required> <br><br>
			<input type="submit" name="login" value="Login"><br><br>
		</div>
	</form>
	
	<h4><?php echo $msg; ?></h4>
	<h4><a href="login.php">Nastavi kao gost</a></h4><div>
		</div>
		
		<footer>
			<ul class="navul">
				<?php include("/footer.php"); ?>
			</ul>
		</footer>
		
		
		<?php }	else{ header("location: logout.php");}?>

</body>
</html>

<!--
 
	
	
</body>
</html>-->