// JavaScript Document


function userAuthentication()  {
	

var ssn = document.form1.ssn.value;
var pass1 = document.form1.pass.value;

if( ssn == "" ) {
	alert(" Enter User SSN ");
	return false;
}


if( pass1 == "" ) {
	alert(" Enter User Password ");
	return false;
}



if( ssn == user && pass1 == pass )	return true;
else {
	
	alert("Wrong Entry of Librarian");
	return false;
}

}



function LogOut() {

	if( confirm(" Log Out : Are You Sure... \n\n Thank You Bey... ") )
		window.parent.close();

}



function validateRegForm(){

var dom = document.form1;
var reg = document.form1.regNo.value;
var name = document.form1.cname.value;
var fName = document.form1.fname.value;
var Gen = document.form1.Gender.value;
var dd = document.form1.Days.value;
var mm = document.form1.Month.value;
var yy = document.form1.Year.value;
var Add1 = document.form1.ADD1.value;
var Add2 = document.form1.ADD2.value;
var phNo = document.form1.phno.value;
var resNo = document.form1.res_no.value;
var mail = document.form1.email.value;
var clg = document.form1.clg.value;
var clg_add1 = document.form1.clg_add1.value;
var clg_add2 = document.form1.clg_add2.value;
var sem = document.form1.Semester.value;
var brnch = document.form1.Branch.value;
var SQ = document.form1.Que.value;
var Ans = document.form1.Answer.value;
var pass1 = document.form1.pass1.value;
var pass2 = document.form1.pass2.value;

if( reg == "" ) {
	alert(" Enter Register Number : ");
	return false;
}else if( name == "" ) {
	alert(" Enter Candidate Name : ");
	return false;
}else if( fName == "" ) {
	alert(" Enter Candidate Father Name :");
	return false;
}else if( Gen == "" ) {
	alert(" Select Gender :");
	return false;
}else if( dd == "DD" || mm == "MM" || yy == "YY" ) {
	alert(" Select Date Of Birth : ");
	return false;
}else if( Add1 == "" && Add2 == "" ) {
	alert(" Enter Postal Address :");
	return false;
}else if( mail == "" ) {
	alert(" Enter E-mail ID :");
	return false;
}else if( phNo == "" ) {
	alert(" Enter Contact Number :");
	return false;
}else if( resNo == "" ) {
	alert(" Enter Residancial Contact Number :");
	return false;
}else if( SQ == "SELECT" ) {
	alert(" Select Security Question : ");
	return false;
}else if( Ans == "" ) {
	alert(" Enter Answer for Security Question :");
	return false;
}else if( pass1 == "" ) {
	alert(" Enter Password :");
	return false;
}else if( pass2 == "" ) {
	alert(" Enter Confirm Password :");
	return false;
}else if( pass1 != pass2 ) {
	alert(" Re-Enter Confirm Password :");
	return false;
}



if( confirm(" Verify The Following Information...\n\nRegister No :  "+reg+"\nCendidate Name : "+name+" "+fName+"\nGender : "+Gen+" \nBirth Date : "+dd+"-"+mm+"-"+yy+"\nAddress : "+Add1+" "+Add2+"\nE-mail ID : "+mail+"\nPhone No. : "+phNo+"\nResidancial No. : "+resNo+"\nYour Answer : "+Ans+"\nCollage : "+clg+"\nClg Address : "+clg_add1+" "+clg_add2+" \nSemester : "+sem+"\nBranch : "+brnch+"\n\n\n Information are correct ?...")) 
	return true;
	return false;
}