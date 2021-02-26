<html>
<body background="images/blue.jpg">


<table cellpadding="4" border="01" style="position:absolute; top:80px; left:100px;">
<form name="form1" action="newBranch.php" method="get">

<tr><td colspan="3" bgcolor="#0099CC" style="font-family:'Courier New'; color:#333333; font-size:18px; text-align:left; text-shadow:#33FF00; font-size:24px; font:bolder;">Registration of New Branch </td></tr>
<tr bgcolor="FFCCCC" style="font-size:18px; color:#333333; text-align:center; font:bold;" ><td>Branch Code</td><td align="left">Branch Name</td><td align="right"> <a href="NewBookStckEntry.php" style="color:#333333;">BACK</a></td></tr>
<tr bgcolor="#FFE4C4"><td><input type="text" name="code" size="10" tabindex="C" maxlength="5" style="text-align:center;" /></td><td colspan="2"><input type="text" name="name" tabindex="N" size="60" maxlength="50" />&nbsp;&nbsp;<input type="submit" name="Reg" value="Register Branch" /></td></tr>
</form>
<? 

$con = mysql_connect( "localhost","root", "" ) or die ("Error : ".mysql_query());

$DB = mysql_select_db ( "my_library", $con ) or die ("Error : ".mysql_query());

if( ! isset( $_REQUEST['action'] ) ) $_REQUEST['action'] = "";
											 
if( $_REQUEST['action'] == "Delete" ) { 

$_code = $_REQUEST["code"];

$cmd = "DELETE FROM Branch WHERE Branch_Code = '$_code'";
//echo $cmd;
$res = mysql_query($cmd);

if( ! $res ) { ?> <script type="text/javascript"> alert(" Error : This Branch Record is Being Refferenced By Some Record. \n\n It's not possible to delete record.\n\n\n <? echo mysql_error(); ?> "); </script> <?  }

}


if( ! isset( $_REQUEST['Reg'] ) )	$_REQUEST['Reg'] = "";
if( $_REQUEST['Reg'] == "Register Branch" ) {

$_code = sqlite_escape_string( $_REQUEST['code'] );
$_name = sqlite_escape_string( $_REQUEST['name'] );
$cmd = "INSERT INTO Branch VALUES ('$_code','$_name')";
//echo $cmd;
$res = mysql_query($cmd);

if( ! $res ) { ?> <script type="text/javascript"> alert(" Error : The Record Related About \n\n <? echo "Branch Code = $_code \\nBranch Name = $_name\\n\\n Already Exist. No Duplicate Entry Allowed.\\n\\n"; echo mysql_error(); ?> "); </script> <?  }


}

$result = mysql_query( "SELECT * FROM  branch order by Branch_Name");  

 $i = 1 ; $k = 01 ;
while ( $row = mysql_fetch_array( $result ) ) {

$db_code = $row['Branch_Code']; 
$db_dept = $row['Branch_Name']; 


if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
 echo "<tr bgcolor=\"$clr\"><td align='center'>$db_code</td><td>$db_dept</td><td align='center'><a href=newBranch.php?action=Delete&code=$db_code >Delete</a></tr> ";

}


?>
</table>

</body>
</html>