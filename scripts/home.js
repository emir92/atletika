var size ;
window.onload= function(){
	document.getElementById("vjestidiv").style.visibility = "visible";
	document.getElementById("vjestidiv").style.display = "flex";
	document.getElementById("novaVijest").style.visibility = "hidden";
	document.getElementById("novaVijest").style.display = "none";
	size = document.getElementById("vest").childElementCount;
	var vijesti= [];
	
	for(var i=0; i<size; i++)
	{
		var v= "vijest"+(i+1);
		vijesti.push(document.getElementById(v).childNodes);
	}
	
	var time= [];
	
	for(var i=0; i<vijesti.length;i++)
	{
		time.push(new Date(Date.parse(vijesti[i][5].innerHTML)));
	}
	
	var ti= new Date();
	ti.stringToDate
	
	for(var i=0; i<time.length;i++){
		var d,m,y,h,mi,s;		
		d= ti.getDate()-time[i].getDate();
		m= ti.getMonth()-time[i].getMonth();
		y= ti.getYear()-time[i].getYear();
		h= ti.getHours()-time[i].getHours();
		mi=ti.getMinutes()-time[i].getMinutes();
		var razlikaDana= uporediDatumDani(ti,time[i]);
		var razlikaVrijeme= uporediDatumeSekunde(ti,time[i]);
		if((y==0 && m==1 && d<=0) || y>0 || m>1 ) document.getElementById("vrijme"+(i+1)).innerHTML= time[i].toLocaleDateString(); 
		else if( razlikaDana >=7 && razlikaDana <14) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije 1 sedmice";
		else if( razlikaDana >=14 && razlikaDana < 21 )document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije 2 sedmice"; 
		else if( razlikaDana >=21) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije 3 sedmice";
		else if( razlikaDana>1 && razlikaDana <7) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije "+razlikaDana+" dana";
		else if( razlikaDana==1 && razlikaVrijeme >=86400) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije 1 dan";
		else {
			var sat,min,sec;
			sat=~~( razlikaVrijeme/3600);
			if (sat==1) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije 1 sat";
			if (sat>1 && sat <5) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije "+sat+" sata";
			else if (sat >=5 ) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije "+sat+" sati";
			else if (sat <1){
				min =~~ ((razlikaVrijeme%3600)/60);
				if (min>0 && min <5) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije "+min+" minute";
				if (min>=5) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost je objavljena prije "+min+" minuta";
				if (min<=0) document.getElementById("vrijme"+(i+1)).innerHTML= "Novost objavljena prije par sekundi";
			}
		}
				
	}
}

uporediDatumDani= function(t1,t2){
	var mjeseci= [31,59,90,120,151,181,212,243,273,304,334,365];
	var d1= t1.getDate()+mjeseci[t1.getMonth()-2]+t1.getYear()*365;
	var d2= t2.getDate()+mjeseci[t2.getMonth()-2]+t2.getYear()*365;
	return d1-d2;
}

uporediDatumeSekunde= function(t1,t2){
	var s1=t1.getSeconds()+t1.getMinutes()*60+t1.getHours()*3600;
	var s2=t2.getSeconds()+t2.getMinutes()*60+t2.getHours()*3600;
	if( t1.getDate() == t2.getDate()) return s1-s2;
	var pom = s2-s1;
	return 86400-pom;
}

sveVijesti = function(){
	window.onload();
	document.getElementById("sv1").className="navliactive";
	document.getElementById("sv2").className="";
	document.getElementById("sv3").className="";
	document.getElementById("sv4").className="";
	document.getElementById("sv5").className="";
	for(var i=0; i<size; i++)
	{
		document.getElementById("v"+(i+1)).style.visibility = "visible";
		document.getElementById("v"+(i+1)).style.display = "flex";
	}	
}

danasnjeVijesti = function(){
	window.onload();
	document.getElementById("sv1").className="";
	document.getElementById("sv2").className="navliactive";
	document.getElementById("sv3").className="";
	document.getElementById("sv4").className="";
	document.getElementById("sv5").className="";
	var pom= [];
	for(var i=0; i<size; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijme"+(i+1)).innerHTML);
	}
	
	var str= "sekundi";
	var str1= "minut"
	var str2= "sat"
	for (var i=0; i<pom.length; i++){
		var a=pom[i].indexOf(str);
		var b=pom[i].indexOf(str1);
		var c=pom[i].indexOf(str2);
		if (a ==  -1 && b == -1 && c==-1) {
			document.getElementById("v"+(i+1)).style.visibility = "hidden";
			document.getElementById("v"+(i+1)).style.display = "none";
		}
		else {
			document.getElementById("v"+(i+1)).style.visibility = "visible";
			document.getElementById("v"+(i+1)).style.display = "flex";
		}
	}
	
}

sedmicneVijesti = function(){
	window.onload();
	document.getElementById("sv1").className="";
	document.getElementById("sv2").className="";
	document.getElementById("sv3").className="navliactive";
	document.getElementById("sv4").className="";
	document.getElementById("sv5").className="";
	var pom= [];
	for(var i=0; i<size; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijme"+(i+1)).innerHTML);
	}
	
	var str= "sekundi";
	var str1= "minut"
	var str2= "sat"
	var str3= "dan"
	for (var i=0; i<pom.length; i++){
		var a=pom[i].indexOf(str);
		var b=pom[i].indexOf(str1);
		var c=pom[i].indexOf(str2);
		var d=pom[i].indexOf(str3);
		if (a ==  -1 && b == -1 && c==-1 && d==-1) {
			document.getElementById("v"+(i+1)).style.visibility = "hidden";
			document.getElementById("v"+(i+1)).style.display = "none";
		}
		else {
			document.getElementById("v"+(i+1)).style.visibility = "visible";
			document.getElementById("v"+(i+1)).style.display = "flex";
		}
	}
}

mjesecneVijesti = function(){
	window.onload();
	document.getElementById("sv1").className="";
	document.getElementById("sv2").className="";
	document.getElementById("sv3").className="";
	document.getElementById("sv4").className="navliactive";
	document.getElementById("sv5").className="";
	var pom= [];
	for(var i=0; i<size; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijme"+(i+1)).innerHTML);
	}
	
	var str= "sekundi";
	var str1= "minut"
	var str2= "sat"
	var str3= "sedmice"
	var str4= "dan"
	for (var i=0; i<pom.length; i++){
		var a=pom[i].indexOf(str);
		var b=pom[i].indexOf(str1);
		var c=pom[i].indexOf(str2);
		var e=pom[i].indexOf(str4);
		var d=pom[i].indexOf(str3);
		if (a ==  -1 && b == -1 && c==-1 && d==-1 && e==-1) {
			document.getElementById("v"+(i+1)).style.visibility = "hidden";
			document.getElementById("v"+(i+1)).style.display = "none";
		}
		else {
			document.getElementById("v"+(i+1)).style.visibility = "visible";
			document.getElementById("v"+(i+1)).style.display = "flex";
		}
	}
}

dodaj = function(){
	
	document.getElementById("sv1").className="";
	document.getElementById("sv2").className="";
	document.getElementById("sv3").className="";
	document.getElementById("sv4").className="";
	document.getElementById("sv5").className="navliactive";
	
	document.getElementById("vjestidiv").style.visibility = "hidden";
	document.getElementById("vjestidiv").style.display = "none";
	document.getElementById("novaVijest").style.visibility = "visible";	
	document.getElementById("novaVijest").style.display = "block";	
}