<?	session_start();	?>

<?
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );


$result = mysql_query(" SELECT * FROM branch");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$Brnch[$row['Branch_Code']] = $row['Branch_Name'] ;  }

$result = mysql_query(" SELECT * FROM questions");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$Q[$row['Num']] = $row['Question'] ;  }

$sem = array("0"=>"General","1"=>"First","2"=>"Second","3"=>"Third","4"=>"Forth","5"=>"Fifth","6"=>"Sixth","7"=>"Seventh","8"=>"Eighth","9"=>"Ninth","10"=>"Tenth");
?>


<script type="text/javascript" src="validation.js">
</script>





<? 

$res = mysql_query("SELECT * FROM registration WHERE Reg_No ='".$_REQUEST['Reg']."'  ORDER BY Reg_No");
$row = mysql_fetch_array($res);
		$_SESSION['Reg'] = $row['Reg_No'];
		$Date = explode("-",$row['DOB']);
		$yy = (int)$Date[0];
		$mm = (int)$Date[1];
		$dd = (int)$Date[2];


?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="images/blue.jpg">
<form name="form1" action="StudentProfile.php" method="get">
<table cellpadding="3" cellspacing="2" border="0" width="100%" style="font:italic; font-family:'Courier New'; color:#0000FF; font-size:20px;">
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td colspan="3"><br /></td></tr>
<tr><td></td><td>Register Number</td><td colspan="1">     <? echo $row['Reg_No']; ?></td><td align="right"><script language="javascript"> date();</script></td></tr>

<tr><td></td><td>Candidate Name</td><td colspan="1"><input type="text" name="cname" size="55" maxlength="49" value="<?=$row['Name'];?>" /></td>
<td colspan="2" align="right">Date Of Birth 

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

</td></tr>


<tr><td></td><td>Father Name </td><td colspan="1"><input type="text" name="fname" size="70" maxlength="59" value="<?=$row['Fname'];?>"/></td><td align="right"> Gender &nbsp; 
<? if( $row['Gender'] == "MALE" ) { $M = "CHECKED"; $F = ""; } else { $M = ""; $F = "CHECKED"; } ?>
<input type="radio" name="Gen" value="MALE"  <? echo $M; ?>/>MALE <input type="radio" name="Gen" value="FEMALE"  <? echo $F; ?>/>FEMALE</td></tr>


<tr><td></td><td>Phone Number </td><td colspan="4"><input type="text" name="phno" size="20" maxlength="15"  style="text-align:right;" value="<?=$row['Ph_No'];?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Residancial No  <input type="text" name="res_no" size="20" maxlength="15"  style="text-align:right;" value="<?=$row['Residancial_No'];?>"/></td></tr>

<tr><td></td><td>Email-ID </td><td colspan="4"><input type="text" name="email" size="60" maxlength="49" value="<?=$row['email'];?>"/></td></tr>

<tr><td></td><td>Address </td><td colspan="4"><input type="text" name="add" size="120" maxlength="150" value="<?=$row['Address'];?>"/></td></tr>
<tr><td colspan="5"><br /><br></td></tr>
<tr><td></td><td>College Name</td><td> <input type="text" name="clg" size="80" maxlength="99" value="<?=$row['Clg_Name'];?>"/></td></tr>
</td></tr>

<tr><td></td><td>Branch</td><td><select name="Branch">
<option value="SELECT">SELECT</option>
<?		$status = "";
		foreach ( $Brnch as $key => $val )	{
		if( $key == $row['Course'] )	$status = "SELECTED";	
		echo "<option value='$key' $status >$val</option>  ";
		$status = "";
		} ?> </select>
</td><td align="left">Semester <select name="Semester"> 
<option value="SEM">Semesters</option>
<?php
$status = "";
foreach ( $sem as $key => $val )	{
if( $row['Sem'] == $val )  $status = "SELECTED";
echo "<option value='$val' $status> $val </option>";
$status = "";
}
?>
</select></td></tr>

<tr><td></td><td>Collage Address </td><td colspan="3"><input type="text" name="clg_add" size="120" maxlength="75" value="<?=$row['Address'];?>" /></td></tr>

<tr><td><br><br></td></tr>

<tr><td></td><td>Security Q?.</td><td><select name="Que">
<option value="SELECT">SELECT</option>
<? 		$status = "";
		foreach ( $Q as $key => $val )	{
		if( $row['Security_Q'] == $key ) $status = "SELECTED";
		echo "<option value='$key' $status >$val</option>  "; 
		$status = "";
		}
?> </select>
</td></tr>
<tr><td></td><td>Answer</td><td><input type="text" name="Answer" size="50" maxlength="39" value="<?=$row['Ans'];?>"/></td></tr>

<tr><td></td><td colspan="3">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass1" size="20" maxlength="14"  value="<?=$row['Password'];?>"/></td></tr>
<tr><td></td><td colspan="3">Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass2" size="20" maxlength="14" /></td></tr>

<tr><td></td><td><a href="StudentProfile.php"><img src="images/back.jpg" border="0"></a></td><td colspan="2" align="right"><input type="submit" name="submit" value="Save Update" onClick="return validateRegForm();"/>&nbsp;&nbsp;<input type="reset" name="reset" value="Re-Set" /></td></tr>
</table>
</form>

</body>
</html>



<script type="text/javascript">

function validateRegForm(){

var name = document.form1.cname.value;
var fName = document.form1.fname.value;
var Gen = document.form1.Gen.value;
var dd = document.form1.Days.value;
var mm = document.form1.Month.value;
var yy = document.form1.Year.value;
var Add = document.form1.add.value;
var phNo = document.form1.phno.value;
var resNo = document.form1.res_no.value;
var mail = document.form1.email.value;
var clg = document.form1.clg.value;
var clg_add = document.form1.clg_add.value;
var sem = document.form1.Semester.value;
var brnch = document.form1.Branch.value;
var SQ = document.form1.Que.value;
var Ans = document.form1.Answer.value;
var pass1 = document.form1.pass1.value;
var pass2 = document.form1.pass2.value;

if( name == "" ) {
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



if( confirm(" Verify The Following Information...\n\n Cendidate Name : "+name+" "+fName+"\nGender : "+Gen+" \nBirth Date : "+dd+"-"+mm+"-"+yy+"\nAddress : "+Add+"\nE-mail ID : "+mail+"\nPhone No. : "+phNo+"\nResidancial No. : "+resNo+"\nYour Answer : "+Ans+"\nCollage : "+clg+"\nClg Address : "+clg_add+" \nSemester : "+sem+"\nBranch : "+brnch+"\n\n\n Information are correct ?... \n\nDirected By : Vayu Dev")) 
	return true;
	return false;
}


</script>