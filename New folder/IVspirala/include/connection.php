<?php
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"emir");
	
	$select_vjesti = "select * from vijesti";
	$select_autori = "select * from autori";
	
	$p_vijesti=mysqli_query($con,$select_vjesti) ;
	$p_autori=mysqli_query($con,$select_autori);
	
	$podaci_vijesti=mysqli_fetch_all($p_vijesti,MYSQLI_ASSOC);
	$podaci_autori=mysqli_fetch_all($p_autori,MYSQLI_ASSOC);
	
	$velicina_autori= count($podaci_autori);
	$velicina_vijesti = count($podaci_vijesti);
	
	
	
?>