var regex = /^[A-Za-z0-9]{3,15}$/;
var regextext = /^[A-Za-z]{3,300}$/;
var form;
window.onload = function(){
	form = document.getElementById("novavijest");
}

naslovProv = function(){
	if ( !regex.test( form['naslov'].value ) ) 
		form['naslov'].style.backgroundColor="red";
	else form['naslov'].style.backgroundColor="white";
}
autorProv = function(){
	if ( !regex.test( form['autor'].value ) ) 
		form['autor'].style.backgroundColor="red";
	else form['autor'].style.backgroundColor="white";
}
tekstProv = function(){
	if ( !regextext.test( form['text'].value ) ) 
		form['text'].style.backgroundColor="red";
	else form['text'].style.backgroundColor="white";
}

sve= function(){
	window.location.href = '../'
}
danasnje= function(){
	window.location.href = '../'
}
sedmicne= function(){
	window.location.href = '../'
}
mjesecne= function(){
	window.location.href = '../'
}

kodDrzave = function(){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
		{
			var spisak= ajax.responseText;
			var arr= eval( '(' + spisak + ')' );
			for (i in arr)
			{
				form['telbroj'].value='+'+ arr[i]["callingCodes"];
			}
			
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			alert( "Greska: nepoznat URL");
	}
	var grad= form['koddrzave'].value
	var gra= encodeURIComponent(grad);
	ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+gra, true);
	ajax.send();
}

brojDrzave= function(){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
		{
			var spisak= ajax.responseText;
			var arr= eval( '(' + spisak + ')' );
			for (i in arr)
			{
				form['koddrzave'].value=arr[i]["alpha2Code"];
			}
			
		}
		if (ajax.readyState == 4 && ajax.status == 404)
			alert( "Greska: nepoznat URL");
	}
	
	var grad= form['telbroj'].value
	var pom = grad.substr(1,3);
	var gra= encodeURIComponent(pom);
	ajax.open("GET", "https://restcountries.eu/rest/v1/callingcode/"+gra, true);
	ajax.send();
}