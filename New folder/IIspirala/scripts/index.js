var brVijesti;
var vremena=[];

window.onload = function(){
	
	
	brVijesti= document.getElementById("listavijesti").childElementCount;
	
	var pom;
	
	for(var i=0; i<brVijesti;i++){
		pom=( document.getElementById('vijest'+(i+1) ).childNodes );
		vremena.push( new Date( Date.parse(pom[9].innerHTML) ) );
	}
	
	var ti=new Date("7.12.2016 12:00:00");
	
	for(var i=0; i<vremena.length;i++){
		var d,m,y,h,mi,s;		
		d= ti.getDate()-vremena[i].getDate();
		m= ti.getMonth()-vremena[i].getMonth();
		y= ti.getYear()-vremena[i].getYear();
		h= ti.getHours()-vremena[i].getHours();
		mi=ti.getMinutes()-vremena[i].getMinutes();
		var razlikaDana= uporediDatumDani(ti,vremena[i]);
		var razlikaVrijeme= uporediDatumeSekunde(ti,vremena[i]);
		
		if((y==0 && m==1 && d<=0) || y>0 || m>1 ) document.getElementById("vrijeme"+(i+1)).innerHTML= vremena[i].toLocaleDateString(); 
		else if( razlikaDana >=7 && razlikaDana <14) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije 1 sedmice";
		else if( razlikaDana >=14 && razlikaDana < 21 )document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije 2 sedmice"; 
		else if( razlikaDana >=21) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije 3 sedmice";
		else if( razlikaDana>1 && razlikaDana <7) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije "+razlikaDana+" dana";
		else if( razlikaDana==1 && razlikaVrijeme >=86400) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije 1 dan";
		else {
			var sat,min,sec;
			sat=~~( razlikaVrijeme/3600);
			if (sat==1) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije 1 sat";
			if (sat>1 && sat <5) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije "+sat+" sata";
			else if (sat >=5 ) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije "+sat+" sati";
			else if (sat <1){
				min =~~ ((razlikaVrijeme%3600)/60);
				if (min>0 && min <5) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije "+min+" minute";
				if (min>=5) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost je objavljena prije "+min+" minuta";
				if (min<=0) document.getElementById("vrijeme"+(i+1)).innerHTML= "Novost objavljena prije par sekundi";
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

promjeni = function(index){
	for(var i=0; i<4; i++){
		if((i+1)==index){
			document.getElementById("iv"+index).className="aktivan";
		}
		else{
			document.getElementById("iv"+(i+1)).className="navbarlista";
		}
	}
}

sve= function(){
	promjeni(1);
	for(var i=0; i<brVijesti; i++)
	{
		document.getElementById("v"+(i+1)).style.visibility = "visible";
		document.getElementById("v"+(i+1)).style.display = "flex";
	}	
}

danasnje= function(){
	promjeni(2);
	var pom= [];
	for(var i=0; i<brVijesti; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijeme"+(i+1)).innerHTML);
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

sedmicne= function(){
	promjeni(3);
	var pom= [];
	for(var i=0; i<brVijesti; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijeme"+(i+1)).innerHTML);
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

mjesecne= function(){
	promjeni(4);
	var pom= [];
	for(var i=0; i<brVijesti; i++)
	{
		var v= "vijest"+(i+1);
		pom.push(document.getElementById("vrijeme"+(i+1)).innerHTML);
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