<?		 session_start();		?>

<body background="images/blue.jpg">
<br /><br />
<form name="form" action="StudentProfile.php" method="get">
<input type="text" name="reg" size="50" >
<input type="submit" name="submit" value="Search Record">
<hr color="#00FF00" width="70%" align="left">
</form>
<form name="form1" method="get">
<table id="myTable" cellpadding="5" cellspacing="2" border="0"  width="3469" >
<tr bgcolor="#CCCCFF">
<th width="28"  align="right"><img src="images/serial.jpg" width="20" height="20"></th>
<th align="left" width="44">SL.No</th><th align="left" width="128">Register No</th><th width="236">Candidate Name </th><th width="253">Father Name</th><th width="104">Date of Birth</th><th width="83">Gender</th><th width="249">Email ID</th><th width="164">Phone No</th><th width="194">Residancial No</th><th width="391">Address</th><th width="319">Collage Name</th><th width="377">Collage Address</th><th width="130">Semester</th><th width="247">Department</th><th width="172">Action</th></tr>

<? 
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );


if( ! isset( $_REQUEST['submit'] ) )		$_REQUEST['submit'] = "";
if( ! isset( $_REQUEST['action'] ) )		$_REQUEST['action'] = "";
if( $_REQUEST['action'] == "DELETE" ) {
if(!mysql_query("DELETE FROM registration WHERE Reg_No = '".$_REQUEST['Reg']."'"))
echo "<script type='text/javascript'> alert('This student Record still used somewhere else\\n So Deletion is not possible\\n\\n".mysql_error()."'); </script>";

}

if( $_REQUEST['submit'] == "Save Update" ) {
//echo $_SESSION['Reg'];

		$Date = $_REQUEST['Year']."-".$_REQUEST['Month']."-".$_REQUEST['Days'];
	
		 $sql = "UPDATE registration SET Name = '".$_REQUEST['cname']."', Fname = '".$_REQUEST['fname']."', Gender = '".$_REQUEST['Gen']."', DOB = '$Date', Address = '".$_REQUEST['add']."', email = '".$_REQUEST['email']."', Ph_No = '".$_REQUEST['phno']."', 	Residancial_No = '".$_REQUEST['res_no']."',  Clg_Name = '".$_REQUEST['clg']."',  Course = '".$_REQUEST['Branch']."', Clg_Add = '".$_REQUEST['clg_add']."',  Sem = '".$_REQUEST['Semester']."', Security_Q = ".$_REQUEST['Que'].", Ans = '".$_REQUEST['Answer']."', Password = '".$_REQUEST['pass1']."' WHERE  Reg_No = '".$_SESSION['Reg']."'";

		 if(mysql_query($sql))	{
		 echo "<script type='text/javascript'> alert(' Record Updated Successfully '); </script>";		
		}else echo "<br><br> Error : ".mysql_error();
		



}

if( $_REQUEST['submit'] == "Search Record" ) {
$data = $_REQUEST['reg'];
$sql = "SELECT * FROM registration WHERE Reg_No LIKE  '$data%' OR Name LIKE  '$data%' OR Fname LIKE  '$data%' OR email LIKE  '$data%' OR Ph_No LIKE  '$data%' OR Clg_Name LIKE  '$data%' OR Sem LIKE  '$data%' OR Course = ( SELECT Branch_Code FROM Branch WHERE Branch_Name LIKE '$data%') ORDER BY Reg_No";

}else {

$sql = "SELECT * FROM registration, branch  WHERE Course = Branch_Code ORDER BY Reg_No";

}

$i = 01; $k = 1;

$result = mysql_query($sql);
while( $row = mysql_fetch_array($result) ) {
$db_reg = $row['Reg_No'];
$db_name = $row['Name'];
$db_fname = $row['Fname'];
$db_gen = $row['Gender'];
$db_date = $row['DOB'];
$db_add = $row['Address']; 
$db_email = $row['email'];
$db_phno = $row['Ph_No'];
$db_res = $row['Residancial_No'];
$db_cName = $row['Clg_Name'];
$db_cAdd = $row['Clg_Add'];
$db_sem = $row['Sem'];
$db_dept = $row['Course'];



$res = mysql_query("SELECT  Branch_Name FROM branch WHERE Branch_Code = '$db_dept'");   
while ( $row = mysql_fetch_array($res) ) 	{  	
		$branch = $row['Branch_Name'];  
		}



if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
										 
echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td>$db_reg</td><td>$db_name</td><td>$db_fname</td><td align='center' >$db_date</td><td align='center' >$db_gen</td><td>$db_email</td><td align='right' >$db_phno</td><td align='right' >$db_res</td><td>$db_add</td><td>$db_cName</td><td>$db_cAdd</td><td align='right' >$db_sem</td><td>$branch</td><td align='center' ><a href=EditStdProfil.php?action=Edit&Reg=$db_reg>EDIT</a>&nbsp;<a onclick=\"return confirm('Are you Sure to Delete this Candidate record? ');\" href=StudentProfile.php?action=DELETE&Reg=$db_reg>DELETE</a></td></tr> ";

}


?>








</body>