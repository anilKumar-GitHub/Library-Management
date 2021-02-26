
<? 


		$con = mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		



	$sql = "DROP DATABASE my_library";

if( mysql_query($sql) ) 
echo "<script type='text/javascript'>alert('DataBase[ Library Management ] Droped Successfully.\\n\\nDROP DATABASE \'my_lib\'');</script>";
else 
echo "<script type='text/javascript'>alert('DataBase[ Library Management ] does not exist.');</script>";



/*
$sql = "DROP TABLE `registrationrequest1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>registrationrequest1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>registrationrequest1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 



$sql = "DROP TABLE `registration1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>registration1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>registration1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 



$sql = "DROP TABLE `old_transaction1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>old_transaction1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>old_transaction1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 




$sql = "DROP TABLE `lib_mnger1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>lib_mnger1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>lib_mnger1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 





$sql = "DROP TABLE `issue1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>issue1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>issue1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 




$sql = "DROP TABLE `book_list1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>book_list1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>book_list1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 





$sql = "DROP TABLE `book_stack1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>book_stack1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>book_stack1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 




$sql = "DROP TABLE `branch1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>branch1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>branch1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 



$sql = "DROP TABLE `edition1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>edition1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>edition1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 



$sql = "DROP TABLE `questions1`";

if( mysql_query($sql) ) {
echo "<tr><td>01</td><td>questions1</td><td>Successfully droped</td></tr>";
}
else{ echo "<tr><td>01</td><td>questions1</td><td>Failed</td></tr>";
echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 
*/
?>