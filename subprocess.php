<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<?php 

$name = sqlite_escape_string(@$_REQUEST['Fname']);
$lname = sqlite_escape_string(@$_REQUEST['Lname']);
$gen = @$_REQUEST['RD'];
$DD = @$_REQUEST['Days'];
$MM = @$_REQUEST['Month'];
$YY = @$_REQUEST['Year'];
$add = sqlite_escape_string(@$_REQUEST['add']);
$pass = sqlite_escape_string(@$_REQUEST['pass']);
$chBox = sqlite_escape_string(@$_REQUEST['cbox']);

$H = $_REQUEST['hobbi'];
$arrHobby = explode(',',$H);

echo " <center> <h1> Form Submitted </h1></center> ";
		
		
	
$date = $YY."-".$MM."-".$DD;
$database = "my_library";

$con = mysql_connect( "localhost", "root", "" );
if ( !$con ) {
echo " \n ERROR : ".mysql_error();   }

$DB = mysql_select_db ( $database, $con );
if ( !$DB ) {
echo "\n ERROR : ".mysql_error();  }

	if(@$_REQUEST['action']=="del")
	{  
		$ref = mysql_query("DELETE FROM reg WHERE Name = '".sqlite_escape_string($_REQUEST['Name'])."'");
		if($ref)
		echo" Deleted";
		else 
		echo "Error  : ".mysql_error();
		
		print "\n\nTotal row updated: ".mysql_affected_rows();
	} 

$update = mysql_query("INSERT INTO reg VALUES('$name','$lname','$gen','$date','$add','$pass')");
if(!$update)
{echo " Error : ".mysql_error(); exit(0);  }
echo "\n\n<h2> Row inserted </h2> \n\n";  
$result = mysql_query( " SELECT * FROM reg");
echo " <table border=\"5\" width=\"100%\"> <tr><td>Name</td><td>Last Name</td><td>Gender</td><td>Date Of Birth</td><td>Address</td><td>Password</td></tr> ";
while ( $row = mysql_fetch_array($result) ) {
echo " <tr><td>". htmlspecialchars($row['Name']) ."</td><td>". htmlspecialchars($row['Last_Name']) ."</td><td>". htmlspecialchars($row['Gender']) ."</td> <td>". htmlspecialchars($row['DOB']) ."</td> <td>". htmlspecialchars($row['Address']) ."</td><td>". htmlspecialchars($row['Password']) ."</td><td><a onclick=\"return confirm('Sure to Delete');\" href=subprocess.php?action=del&Name=".$row['Name'].">DELETE</a></td></tr> ";
}

echo "</table> ";
?>

</body>
</html>

