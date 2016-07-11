<ul class="navul">
		<li id="sv1" class="navliactive"><a class="nava" href="#" onclick="sveVijesti()"> Sve vijesti </a></li>
		<li id="sv2" class=""><a class="nava" href="#" onclick="danasnjeVijesti()"> Danasnje vijesti </a></li>
		<li id="sv3" class=""><a class="nava" href="#" onclick="sedmicneVijesti()"> Sedmicne vijesti </a></li>
		<li id="sv4" class=""><a class="nava" href="#" onclick="mjesecneVijesti()"> Mjesecne vijesti </a></li>
		<li id="sv5" class=""><a class="nava" href="#" onclick="dodaj()"> Dodaj Novost</a></li>
</ul>

<div id="vjestidiv" class="vjestidiv">
	<ul id="vest" class="vjesti">
	<?php
		
		$niz = file('images/vijesti.csv');
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