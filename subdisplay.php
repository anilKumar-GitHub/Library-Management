<html>
<body>
<pre>
<?php

$database = "my_library";

$con = mysql_connect( "localhost", "root", "" );
if ( !$con ) {
echo " \n ERROR : ".mysql_error();   }

$DB = mysql_select_db ( $database, $con );
if ( !$DB ) {
echo "\n ERROR : ".mysql_error();  }

	if(@$_REQUEST['action']=="del")
	{  
		$ref = mysql_query("DELETE FROM reg WHERE Name = '".round($_REQUEST['Name'])."'");
		if($ref)
		echo" Deleted";
		else 
		echo "Error  : ".mysql_error();
		
		print "\n\nTotal row updated: ".mysql_affected_rows();
	} 


$result = mysql_query( " SELECT * FROM reg");
echo " <table border=\"5\" width=\"100%\"> <tr><td>Name</td><td>Last Name</td><td>Gender</td><td>Date Of Birth</td><td>Address</td><td>Password</td></tr> ";
/*while ( $row = mysql_fetch_array($result) ) {
echo " <tr><td>". htmlspecialchars($row['Name']) ."</td><td>". htmlspecialchars($row['Last_Name']) ."</td><td>". htmlspecialchars($row['Gender']) ."</td> <td>". htmlspecialchars($row['DOB']) ."</td> <td>". htmlspecialchars($row['Address']) ."</td><td>". htmlspecialchars($row['Password']) ."</td><td><a onclick=\"return confirm('Sure to Delete');\" href=subdisplay.php?action=del&Name=".$row['Name'].">DELETE</a></td></tr> ";
}*/


$row = mysql_num_rows($result);
$col = mysql_num_fields($result);


for ( $i = 0 ; $i < $row ; $i++ )  {
  $D = mysql_fetch_array($result);
  echo "<tr>";
	for($k = 0 ; $k < $col ; $k++ )  {
			echo " <td>". htmlspecialchars($D[$k]) ."</td>";
		}
	echo"</tr>";
}
echo "</table> ";

print "\n\nTotal row updated: ".mysql_affected_rows();
?></pre>

</body>
</html>


