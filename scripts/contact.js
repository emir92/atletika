

var reg = /^[A-Za-z]{3,20}$/;

function valName(){
	
	var form= document.getElementById('contactus');
	
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

function valLaName(){
	var form= document.getElementById('contactus');
	
	if(!reg.test(form['prezime'].value))
		form['prezime'].style.backgroundColor="red";
	else
		form['prezime'].style.backgroundColor="white";
}