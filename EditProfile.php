
<? session_start(); ?>


<script type="text/javascript" src="mngAuth.js"></script> 



<?
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error());


		$sql = "SELECT * FROM  lib_mnger  ";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);

		$Date = explode("-",$row['DOB']);
		$yy = (int)$Date[0];
		$mm = (int)$Date[1];
		$dd = (int)$Date[2];

		$_SESSION['ID'] = $row['SSN'];
?>

<script type="text/javascript" src="validation.js">
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="images/blue.jpg">
<br>
<p align="center" style="color:#333333; font-family:Vineta BT; font-size:30px; font:bold; text-decoration:underline;">Govt. Polytechnic Afzalpur</p>
<div style="position:absolute; top:50px; left:990px;"><script language="javascript"> date();</script></div>
<form name="form1" action="mangProfile.php" method="get">
<table cellpadding="3" cellspacing="8" border="0" width="100%" style="position:absolute; top:40px; left:0px; font:italic; font-family:'Courier New';  color:#333333; font-size:20px;">
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td colspan="3"><br /></td></tr>
<tr><td></td><td>Librarian</td><td colspan="2">   <input type="text" name="name" size="55" maxlength="49" value="<?=$row['Name'];?>" /></td><td colspan="2" align="right">Librarian UID :  <input type="text" name="ssn" size="18" maxlength="14" value="<?=$row['SSN'];?>" /></tr>

<tr><td></td><td>Father Name </td><td colspan="4"> <input type="text" name="fname" size="65" maxlength="59" value="<?=$row['Fname'];?>" /></td></tr>

<tr><td></td><td>Date Of Birth </td><td colspan="2">

<select name="Year">
<option value="YY">YYYY</option>
<? 
$status = "";
for( $i = 1947 ; $i <= 2015; $i++ ){
if($i == $yy ) $status = "SELECTED";
echo "<option value='$i' $status >$i</option>";
$status = "";
}
?>
</select>


<select name="Month">
<option value="MM">MM</option>
<? 
$status = "";
for( $i = 01 ; $i <= 12; $i++ ){
if($i == $mm ) $status = "SELECTED";
if($i < 10 ) $i = '0'.$i;
echo "<option value='$i' $status >$i</option>";
$status = "";
}
?>
</select>


<select name="Days"><option value="DD">DD</option>
<? 
$status = "";
for( $i = 01 ; $i <= 31; $i++ ){
if($i == $dd ) $status = "SELECTED";
if($i < 10 ) $i = '0'.$i;
echo "<option value='$i' $status >$i</option>";
$status = "";
}
?></select>

</td><td>Gender 
<? if( $row['Gender'] == "MALE" ) { $M = "CHECKED"; $F = ""; } else { $M = ""; $F = "CHECKED"; } ?>
<input type="radio" name="Gen" value="MALE"  <? echo $M; ?>/>MALE <input type="radio" name="Gen" value="FEMALE"  <? echo $F; ?>/>FEMALE</td></tr>
<tr><td></td><td>Phone Number </td><td colspan="2"> <input type="text" name="ph_no" size="20" maxlength="18" value="<?=$row['Ph_No'];?>" /></td><td>Residancial No   <input type="text" name="res_no" size="20" maxlength="18" value="<?=$row['Residancial_No'];?>" /></td></tr>

<tr><td></td><td>Email-ID </td><td colspan="4">  <input type="text" name="email" size="55" maxlength="49" value="<?=$row['email'];?>" /></td></tr>

<tr><td></td><td>Address </td><td colspan="4">  <input type="text" name="add" size="120" maxlength="149" value="<?=$row['Address'];?>" /></td></tr>
<tr><td></td><td>Security Q</td><td colspan="4">
<select name="SQ">
<option value="SELECT">SELSECT</option>
<? 
$status = "";
$res = mysql_query("SELECT *FROM questions");
while($Q = mysql_fetch_array($res)){
	if( $Q['Num'] == $row['Security_Q'] ) $status = "SELECTED";
	echo "<option value='".$Q['Num']."' $status> ".$Q['Question'].".</option>";
	$status = "";
}
?></select></td></tr>
<tr><td></td><td>Answer </td><td colspan="4"><input type="text" name="ans" size="50" maxlength="39" value="<?=$row['Ans'];?>" /></td></tr>
<tr><td></td><td>Password </td><td><input type="password" name="pass1" size="20" maxlength="15" value="<?=$row['Password'];?>" /></td></tr>
<tr><td></td><td>Confirm</td><td><input type="password" name="pass2" size="20" maxlength="15"  /></td></tr>
<tr><td colspan="5" align="right"><br /><br /><input type="submit" name="submit" value="Save Upadate" onclick="return lib_validation();"  />
</table>
</form>

</body>
</html>





<script type="text/javascript">

function lib_validation()	 {

var ssn = document.form1.ssn.value;
var name = document.form1.name.value;
var fName = document.form1.fname.value;
var Gen = document.form1.Gen.value;
var dd = document.form1.Days.value;
var mm = document.form1.Month.value;
var yy = document.form1.Year.value;
var Add = document.form1.add.value;
var phNo = document.form1.ph_no.value;
var resNo = document.form1.res_no.value;
var mail = document.form1.email.value;
var SQ = document.form1.SQ.value;
var Ans = document.form1.ans.value;
var pass1 = document.form1.pass1.value;
var pass2 = document.form1.pass2.value;

if( name == "" ) {
	alert(" Enter Librarian Name : ");
	return false;
}else if( ssn == "" ) {
	alert(" Enter Librarian UID : ");
	return false;
}else if( fName == "" ) {
	alert(" Enter Father Name :");
	return false;
}else if( Gen == "" ) {
	alert(" Select Gender :");
	return false;
}else if( dd == "DD" || mm == "MM" || yy == "YY" ) {
	alert(" Select Date Of Birth : ");
	return false;
}else if( Add == "" ) {
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

if( confirm(" Verify The Following Information...\n\nLibrarian UID :  "+ssn+"\nLibrarian Name : "+name+" "+fName+"\nGender : "+Gen+" \nBirth Date : "+dd+"-"+mm+"-"+yy+"\nAddress : "+Add+"\nE-mail ID : "+mail+"\nPhone No. : "+phNo+"\nResidancial No. : "+resNo+"\nYour Security Answer : "+Ans+"\n\n\n Information are correct ?... \n\nDirected By : Vayu Dev")) 
	return true; 
	return false;
}


</script>