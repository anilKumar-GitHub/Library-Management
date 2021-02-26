<? session_start();	?>
<script type="text/javascript" src="mngAuth.js"></script> 



<?
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error());


		if( ! isset( $_REQUEST['submit'] ) )	$_REQUEST['submit'] = "";
		if( $_REQUEST['submit'] == "Save Upadate" ) {
		$Date = $_REQUEST['Year']."-".$_REQUEST['Month']."-".$_REQUEST['Days'];
	
		 $sql = "UPDATE lib_mnger SET SSN = '".$_REQUEST['ssn']."', Name = '".$_REQUEST['name']."', Fname = '".$_REQUEST['fname']."', Gender = '".$_REQUEST['Gen']."', DOB = '$Date', Address = '".$_REQUEST['add']."', email = '".$_REQUEST['email']."', Ph_No = '".$_REQUEST['ph_no']."', 	Residancial_No = '".$_REQUEST['res_no']."', Security_Q = ".$_REQUEST['SQ'].", Ans = '".$_REQUEST['ans']."', Password = '".$_REQUEST['pass1']."' WHERE  SSN = '".$_SESSION['ID']."'";

		 if(mysql_query($sql))	{
		 echo "<script type='text/javascript'> alert(' Librarian Record Updated Successfully '); </script>";		
		}else echo "<br><br> Error : ".mysql_error();
		
		}




		$sql = "SELECT * FROM  lib_mnger ";
		$res = mysql_query($sql);
		$row = mysql_fetch_array($res);


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

<form name="form1" action="EditProfile.php" method="get">
<table cellpadding="3" cellspacing="8" border="0" width="100%" style="position:absolute; top:40px; left:0px; font:italic; font-family:'Courier New';  color:#333333; font-size:20px;">
<tr><td>&nbsp;</td><td colspan="3"><br /></td></tr>

<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><script language="javascript"> date();</script></td></tr>

<tr><td></td><td>Librarian</td><td colspan="2">:  <?=$row['Name'];?></td><td colspan="2" align="right">Librarian UID :  <?=$row['SSN'];?></tr>

<tr><td></td><td>Father Name </td><td colspan="4">:  <?=$row['Fname'];?></td></tr>

<tr><td></td><td>Date Of Birth </td><td colspan="2">:  <?=$row['DOB'];?></td><td>Gender  :  <?=$row['Gender'];?></tr>

<tr><td></td><td>Phone Number </td><td colspan="2">:  <?=$row['Ph_No'];?></td><td>Residancial No  :  <?=$row['Residancial_No'];?></td></tr>

<tr><td></td><td>Email-ID </td><td colspan="4">:  <?=$row['email'];?></td></tr>

<tr><td></td><td>Address </td><td colspan="4">:  <?=$row['Address'];?></td></tr>
<tr><td colspan="5" align="right"><br /><br /><input type="submit" name="submit" value="	Edit Profile	"  />
</table>
</form>

</body>
</html>