<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Library Management</title>
</head>
<body alink="#FF0000" vlink="#0000FF">
<?php

include("optionHorizatel.html");
include("optionVrtical.html");
?>
<form name="form1" action="Base2.php" method="post">
<table border="0"  width="75%" style="position:absolute; top:200px; left:215px;" >
<tr><td><input type="text" name="book" size="50" >&nbsp;&nbsp; <input type="submit" name="submit" value=" Search Book " ></td></tr>
</table>
<?php 


$database = "my_library";

$con = mysql_connect( "localhost", "root", "" );
if ( !$con ) {
echo " \n ERROR : ".mysql_error();   }

$DB = mysql_select_db ( $database, $con );
if ( !$DB ) {
echo "\n ERROR : ".mysql_error();  }

$result = mysql_query( " SELECT * FROM book_stack order by Book_Title");
?>
<table id="myTable" cellpadding="5" cellspacing="2" border="0" style="position:absolute; top:230px; left:215px;" width="80%" >
<tr bgcolor="#CCCCFF"><th width="0%" align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" width="2%">SL.No</th><th align="left" width="2%">Select</th><th width="30%">Book Name </th><th width="25%">Authour Name</th><th width="20%">Publisher </th><th width="8%">Price</th><th width="1%">Action</th></tr>
<?php $i = 1 ; $k = 01 ;
while ( $row = mysql_fetch_array($result) ) {
$db_book = $row['Book_Title'];
$db_author = $row['Author_Name'];
$db_publish = $row['Publisher'];
$db_price = $row['Price'];
if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
 echo "<tr class=\"tab\" bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td>". $k++ ." </td><td><input type=\"checkbox\" name=\"books\" value=\"$db_book\"></td><td>$db_book</td><td>$db_author</td><td>$db_publish</td><td>$db_price</td><td><a href=\"#\" title=\" Open the list of $db_book books\" >open</a></tr> ";

}

?>
<tr><td><input type="button" value="check" onClick="validation()"></td></tr>
</table>


</form>

</body>
</html>
