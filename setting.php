<body background="images/blue.jpg"	>
<form name="form1" action="setting.php" method="post">

<table cellpadding="5" style="position:absolute; top:380px; left:330px;">
<tr><td><a href="mangfrm.php" target="_parent"><img src="images/back.jpg" border="0"></a></td><td><input type="submit" name="submit" value="Create DataBase"></td><td><input type="submit" name="submit" value="Drop DataBase" onClick="return confirm('Delete the whole DataBase ?\n\n It Removes all information from the Server of Library Managment.\n\n[ DROP DATABASE \'my_lib\'	]');" ></td><td><input type="submit" name="submit" value="Initiate DataBase"></td></tr></table> 



<? 
if( ! isset( $_REQUEST['submit'] ) ) 	$_REQUEST['submit'] = "";
if( $_REQUEST['submit'] == "Create DataBase" ) {
include("Database.php");
}



if( $_REQUEST['submit'] == "Initiate DataBase" ) {
include("initiate.php");
}




if( $_REQUEST['submit'] == "Drop DataBase" ) {
include("drop_DB.php");
}


if( $_REQUEST['submit'] == "Remove Initial Record" ) {
$sql = "SELECT * FROM `book_stack1` LIMIT 0, 30 ";
if( mysql_query($sql) ) {
echo "Sucessfully deleted";
}
else echo "error".mysql_error();
}

?>

</form>

</body>