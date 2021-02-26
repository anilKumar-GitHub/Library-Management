<link rel="stylesheet" type="text/css" href="test.css">
<?php 
$user = $_POST["user"];
$pass = $_POST["pass"];

$_SESSION["S_user"] = $user ;
$_SESSION["S_pass"] = "161101" ;
#echo " Initialized ";
?>


<?php

$database = "my_library";

$con = mysql_connect( "localhost", "root", "" );
if ( !$con ) {
echo " \n ERROR : ".mysql_error();   }

$DB = mysql_select_db ( $database, $con );
if ( !$DB ) {
echo "\n ERROR : ".mysql_error();  }

$result = mysql_query( " SELECT * FROM Lib_mnger ");
while ( $row = mysql_fetch_array($result) ) {
$db_user = $row['SSN'];
$db_pass = $row['Password'];
}

mysql_close($con);
if( !($user == $db_user && $pass == $db_pass) )  { include("wrongpass.php");  }  
         								 else  {   include("frame.php"); 	}

?>
