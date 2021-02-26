<script type="text/javascript" src="mngAuth.js"></script> 


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

	if(! isset($_REQUEST['CandidateRegistration']))		$_REQUEST['CandidateRegistration'] = "";
	if( $_REQUEST['CandidateRegistration'] == "Send Request of Registration" ) {
	include("RqRegstrn.php");
	} 

	

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="images/blue.jpg">
<form name="form1" action="RqRegistration.php" method="get">
<table cellpadding="3" cellspacing="2" border="0" width="100%" style="font:italic; font-family:'Courier New'; color:#0000FF; font-size:20px;">
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td colspan="3"><br /></td></tr>
<tr><td></td><td>Register Number</td><td colspan="1"> <input type="text" name="regNo" size="20" maxlength="14"/>&nbsp;&nbsp;<input type="button" name="Gen" value="Generator" onClick="Generator();" /> </td><td align="right"><script language="javascript"> date();</script></td></tr>

<tr><td></td><td>Candidate Name</td><td colspan="1"><input type="text" name="cname" size="55" maxlength="49" /></td>
<td colspan="2" align="right">Date Of Birth 
<select name="Days"><option value="DD">DD</option>
<script language="javascript">funDate(1,31);</script></select>
<select name="Month">
<option value="MM">MM</option>
<script type="text/javascript">funDate(1,12);</script></select>
<select name="Year">
<option value="YY">YYYY</option>
<script type="text/javascript">funDate(1945,2012);</script></select>
</td></tr>


<tr><td></td><td>Father Name </td><td colspan="1"><input type="text" name="fname" size="70" maxlength="59" /></td><td align="right"> Gender &nbsp; <input type="radio" name="Gender" value="MALE" checked="checked" />Male <input type="radio" name="Gender" value="FEMALE" />Female</td></tr>

<tr><td></td><td>Address </td><td colspan="1"><input type="text" name="ADD1" size="80" maxlength="75" /></td><td align="right">Phone Number <input type="text" name="phno" size="20" maxlength="15"  style="text-align:right;"/></td></tr>

<tr><td></td><td></td><td colspan="1"> <input type="text" name="ADD2" size="80" maxlength="74" /></td><td align="right">Residancial No  <input type="text" name="res_no" size="20" maxlength="15" style="text-align:right;"/></td></tr>

<tr><td></td><td>Email-ID </td><td><input type="text" name="email" size="55" maxlength="49"/></td><td colspan="2"></td></tr>

<tr><td colspan="5"><br /></td></tr>
<tr><td></td><td>College Name</td><td> <input type="text" name="clg" size="80" maxlength="99" /></td><td align="left">Semester <select name="Semester"> 
<option value="SEM">Semesters</option>
<?php
foreach ( $sem as $key => $val )
echo "<option value='$val'> $val </option>";
?>
</select></td></tr>
</td></tr>

<tr><td></td><td>Collage </td><td><input type="text" name="clg_add1" size="80" maxlength="75" /></td><td>Branch &nbsp; 
</td></tr>


<tr><td></td><td>Address</td><td><input type="text" name="clg_add2" size="80" maxlength="74" /></td><td  align="right"><select name="Branch">
<option value="SELECT">SELECT</option>
<? foreach ( $Brnch as $key => $val )
		echo "<option value='$key'>$val</option>  "; ?> </select>
</td></tr>

<tr><td></td><td>Security Q?.</td><td><select name="Que">
<option value="SELECT">SELECT</option>
<? foreach ( $Q as $key => $val )
		echo "<option value='$key'>$val</option>  "; ?> </select>
</td></tr>
<tr><td></td><td>Answer</td><td><input type="text" name="Answer" size="50" maxlength="39" /></td></tr>

<tr><td></td><td colspan="3">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass1" size="20" maxlength="14" /></td></tr>
<tr><td></td><td colspan="3">Confirm Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass2" size="20" maxlength="14" /></td></tr>

<tr><td></td><td><a href="index.php" target="_parent"><img src="images/back.jpg" border="0"></a></td><td colspan="2" align="right"><input type="submit" name="CandidateRegistration" value="Send Request of Registration" onClick="return validateRegForm();"/>&nbsp;&nbsp;<input type="reset" name="reset" value="Re-Set" /></td></tr>
</table>
</form>


</body>
</html>






<script type="text/javascript">

function Generator(){
<?         $AlphaSet1 = array(0=>'A',1=>'B',2=>'C',3=>'D',4=>'E',5=>'F');
			$AlphaSet2 = array(0=>'W',1=>'X',2=>'Y',3=>'Z');
			$Numeric = array(1=>'0',2=>'1',3=>'2',4=>'3',5=>'4',6=>'5',7=>'6',8=>'7',9=>'8',10=>'9');
		
			$flag = 0 ;
			while( $flag == 0 )  {

						  $ch ="";
						for( $j = 0 ; $j < 2; $j++ )	{
							 	$n = rand(0,5);
								$ch = $ch.$AlphaSet1[$n];
							}
							
/*						for( $j = 0 ; $j < 2; $j++ )	{
							 	$n = rand(0,10);
								$ch = $ch.$Numeric[$n];
							}

						for( $j = 0 ; $j < 2; $j++ )	{
							 	$n = rand(0,3);
								$ch = $ch.$AlphaSet2[$n];
							}
*/
						for( $j = 0 ; $j < 4; $j++ )	{
							 	$n = rand(0,10);
								$ch = $ch.$Numeric[$n];
							}
						
						

					$ID = $ch;
				
					  $sql = " SELECT * FROM Registration R, registrationrequest Rq  WHERE R.Reg_No = '$ID' OR Rq.Reg_No = '$ID'";
					  $res = mysql_query( $sql );
					   
					  if( mysql_affected_rows() == 0 )   $flag = 1 ;
					  else 								 $flag = 0 ;
					  
					 
			}


echo "var num = '$ID';";


 ?>

document.form1.regNo.value = num;
document.form1.clg.value = "NONE";
document.form1.clg_add1.value = "NONE";
}
</script>
