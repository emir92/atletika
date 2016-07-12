<ul class="sort" >
	<li><a href="index.php?sor=au">Sortiraj abecdeno uzlazno</a></li>
	<li><a href="index.php?sor=as">Sortiraj abecdeno silazno</a></li>
	<li><a href="index.php?sor=vu">Sortiraj vremenski najnoviji</a></li>
	<li><a href="index.php?sor=vs">Sortiraj vremenski najstariji</a></li>
</ul>

<div class="vijesti" id="vijesti">
	<ul id="listavijesti">
		<?php 
		$niz = file('images/vijesti.csv');
		$vel = sizeof($niz);
		$vijesti;
		
		for( $i=0; $i<$vel; $i++ )
		{
			$vijesti[$i]=explode(';',$niz[$i]);		
		}
		
		foreach($vijesti as $key=> $row ){
			$dates[$key] = $row[3];
		}
		
		array_multisort($dates, SORT_DESC, $vijesti);
		
		if( isset($sortiranje) )
		{
			
			if( strcmp(substr($sortiranje,0,1),'a')==0){
				foreach($vijesti as $key=> $row ){
					$dates[$key] = $row[1];				
				}
			} 
			if( strcmp( substr($sortiranje,0,1),'v')==0){
				foreach($vijesti as $key=> $row ){
					$dates[$key] = $row[3];
				}
			} 
			
			if( strcmp(substr($sortiranje,1,1),'u')==0) 
			{
				
				array_multisort($dates, SORT_ASC, $vijesti);
			}
			if(strcmp(substr($sortiranje,1,1),'s')==0) array_multisort($dates, SORT_DESC, $vijesti);
		}
		
		for( $i=0; $i<$vel; $i++ )
		{
			
			$id=($i+1);
			echo "<li class='vijestilista'  id=\"v".$id."\">";
			echo "<article id=\"vijest".$id."\">";	
			echo "<h1 id=\"naslov12".$id."\" >".$vijesti[$i][1]."</h1>";
			echo "<h4 id=\"autor".$id."\"> Autor:".$vijesti[$i][0] ." </h4>";
			echo "<h4 id=\"vrijeme".$id."\"> Objavljeno tad i tad </h4>";
			echo "<p id=\"tekst".$id."\" > ".$vijesti[$i][2]."	<img id=\"slika".$id."\" src=\"images/".$vijesti[$i][4]."\" alt='' >  </p>";
			echo "<time hidden>".$vijesti[$i][3]."</time>";
			echo "</article></li>";
		}
		
		?>
	</ul>
</div>