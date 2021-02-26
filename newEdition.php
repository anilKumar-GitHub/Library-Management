<html>
<body background="images/blue.jpg">


<table cellpadding="4" cellspacing="02" border="01" width="30%" style="position:absolute; top:100px; left:100px;">
<form name="form1" action="newEdition.php" method="get">
<tr><td colspan="3" bgcolor="#0099CC" style="font-family:'Courier New'; color:#333333; font-size:18px; text-align:left; text-shadow:#33FF00; font-size:24px; font:bolder;">Registration of New Edition </td></tr>
<tr bgcolor="FFCCCC" style="font-size:18px; color:#333333; font:bold;"><td width="1%">Edition .No</td><td align="left">Edition Name</td><td align="right"> <a href="NewBookStckEntry.php" style="color:#333333;">BACK</a></td></tr>
<tr bgcolor="#FFE4C4"><td><input type="text" name="num" size="10" tabindex="C" maxlength="5" style="text-align:center;" /></td><td colspan="2"><input type="text" name="alpha" tabindex="N" size="25" maxlength="19" />&nbsp;&nbsp;<input type="submit" name="Reg" value="Register Edition" /></td></tr>
</form>
<? 

$con = mysql_connect( "localhost","root", "" ) or die ("Error : ".mysql_query());

$DB = mysql_select_db ( "my_library", $con ) or die ("Error : ".mysql_query());

if( ! isset( $_REQUEST['action'] ) ) $_REQUEST['action'] = "";
											 
if( $_REQUEST['action'] == "Delete" ) { 

$_num = $_REQUEST["code"];

$cmd = "DELETE FROM Edition WHERE NUM = '$_num'";
//echo $cmd;
$res = mysql_query($cmd);

if( ! $res ) { ?> <script type="text/javascript"> alert(" Error : This Branch Record is Being Refferenced By Some Record. \n\n It's not possible to delete record.\n\n\n <? echo mysql_error(); ?> "); </script> <?  }

}


if( ! isset( $_REQUEST['Reg'] ) )	$_REQUEST['Reg'] = "";
if( $_REQUEST['Reg'] == "Register Edition" ) {

$_num = sqlite_escape_string( $_REQUEST['num'] );
$_alpha = sqlite_escape_string( $_REQUEST['alpha'] ); 
$cmd = "INSERT INTO Edition VALUES ('$_num','$_alpha')";
//echo $cmd;
$res = mysql_query($cmd);

if( ! $res ) { ?> <script type="text/javascript"> alert(" Error : The Record Related About \n\n <? echo "Branch Code = $_num \\nBranch Name = $_alpha\\n\\n Already Exist. No Duplicate Entry Allowed.\\n\\n"; echo mysql_error(); ?> "); </script> <?  }


}

$result = mysql_query( "SELECT * FROM  Edition order by NUM");  

 $i = 1 ; $k = 01 ;
while ( $row = mysql_fetch_array( $result ) ) {

$db_num = $row['NUM']; 
$db_alpha = $row['ALPHA']; 


if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
 echo "<tr bgcolor=\"$clr\"><td align='right'>$db_num</td><td>$db_alpha</td><td align='center'><a href=newEdition.php?action=Delete&code=$db_num >Delete</a></tr> ";

}


?>
</table>

</body>
</html>