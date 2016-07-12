var form;
var reg = /^[A-Za-z]{3,20}$/;
var regtekst = /^[A-Za-z]{3,200}$/;

window.onload= function(){
	form= document.getElementById('kontakt');
	form['prezime'].disabled=true;
	form['text'].disabled=true;
	form['submit'].disabled=true;
}


imeProv = function(){
	if(!reg.test(form['ime'].value))
	{
		form['ime'].style.backgroundColor="red";
		form['prezime'].disabled=true;
	}
	else
	{
		form['ime'].style.backgroundColor="white";
		form['prezime'].disabled=false;
	}
}

prezimeProv = function(){
	if(!reg.test(form['prezime'].value))
	{
		form['prezime'].style.backgroundColor="red";
		form['text'].disabled=true;
	}
	else
	{
		form['prezime'].style.backgroundColor="white";
		form['text'].disabled=false;
	}
	
}

tekstProv = function(){
	if(!regtekst.test( form['text'].value) )
	{
		form['text'].style.backgroundColor="red";
		form['submit'].disabled=true;
	}
	else
	{
		form['text'].style.backgroundColor="white";
		form['submit'].disabled=false;
	}
}