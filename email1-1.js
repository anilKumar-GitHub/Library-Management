// JavaScript Document
var dom=document.form1;
var name1=dom.Name.value;
var Lname=dom.LName.value;
var Rd="";
for(i = 0; i < dom.Rad.length; i++){
if(dom.rad.value checked)
 Rd =dom.Rad[i].value;
}
var DD=dom.date.value;
var MM=dom.Month.value;
var YY=dom.Year.value;
var Count=dom.nation.value;
var pass2=dom.pass.value;
var pass3=dom.pass1.value;

if(n;ame1==""){
alert("Enter yor Name first");
return false;
}
else if(Lname==""){
	alert("Enter your Last name first");
	return false;
}else if(Rd=""){
		alert("Enter your Sex");
		return false;
}else if(DD == "DD" || MM =="MM" || YY=="YYYYY"){
	alert("Enter your date currectly");
	return false;
}else if(Conut==""){
	alert("Enter your National");
	return false;
}else if(pass2==""){
	alert("Enter your pass word");
	return false;
}else if(pass3==""){
	alert("Confirm your password first");
	return false;
}else if(pass2==pass3){
	alert("Your password deos not macth");
	return false;
}else
{
	return true;
}
		

