<? 

		session_start();
		
  $con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
  $db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/blue.jpg">
<br /><br /><br />
<form name="form1" action="issueprocess3.php" method="get">

<?
	$b_no = array();
	if( !isset($_REQUEST['Isuue']) )		$_REQUEST['Isuue'] = "";
	if( $_REQUEST['Isuue'] == "Isuuse Selected Book") { 
			$_SESSION['S_BookID'] = $_REQUEST["hideBook"]; 
			$bk = $_REQUEST["hideBook"];
			$b_no = explode(",",$bk);			
	}

	if( !isset($_REQUEST['action']) )		$_REQUEST['action'] = "";
	
	if( $_REQUEST['action'] == "issueLink") { $_SESSION['S_BookID'] = $_REQUEST['BNO']; $b_no[] = $_REQUEST['BNO']; }
?>

<table cellpadding="6" border='0' width='100%' style="font-size:20px; font-weight:normal; color:#0000CC;" bgcolor="#FFFFFF">

<?		foreach( $b_no as $book )  {


 $sql="SELECT  * FROM  book_stack BS, book_List BL WHERE BL.Book_No = '$book' AND BL.Book_ID = BS.Book_ID";
$res = mysql_query($sql);
 
 while($row = mysql_fetch_array($res))
 {

 echo "<tr><td>Book Number : ".$row['Book_No']."</td><td>Book ISBN : ".$row['ISBN']."</td></tr>";
 echo "<tr><td colspan='2'>Title :  ".$row['Title']."</td></tr>";
 echo "<tr><td>Author : ".$row['Author']."</td><td>Publisher : ".$row['Publisher']."</td></tr>";
 echo "<tr><td>Edition : ". $row['Edition']."</td><td>Price  Rs.: ". $row['Price']." Only</td></tr>";
 echo "<tr><td colspan='2'><br><hr align='left' width='80%' color='Black'></td></tr>";
   
 }
}
  echo "</table>";


?>
<br />

<table cellpadding="6" border='0' width='100%' style="font-size:20px; font-weight:bold; color:#666666;">
<tr><td>Candidate Registration Number&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="user_reg" size="20" maxlength="10" /> </td></tr>
<tr><td>Date Of Issue &nbsp;<select name="Days1">
<option value="DD">DD</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 31 ; i++ ){
if( i < 10 )  i = '0' + i ;
document.write("<option value="+i+">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Month1">
<option value="MM">MM</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 12 ; i++ ) {
if( i < 10 )  i = '0' + i ;
document.write("<option value=\""+i+"\">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Year1">
<option value="YYYY">YYYY</option>
<script type="text/javascript">
var i; 
for ( i = 1980 ; i <= 2012 ; i++ )
document.write("<option value="+i+">"+i+"</option>");
</script>
</select> </td></tr>

<tr><td>Return Date  &nbsp;<select name="Days2">
<option value="DD">DD</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 31 ; i++ ){
if( i < 10 )  i = '0' + i ;
document.write("<option value="+i+">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Month2">
<option value="MM">MM</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 12 ; i++ ) {
if( i < 10 )  i = '0' + i ;
document.write("<option value=\""+i+"\">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Year2">
<option value="YYYY">YYYY</option>
<script type="text/javascript">
var i; 
for ( i = 1990 ; i <= 2050 ; i++ )
document.write("<option value="+i+">"+i+"</option>");
</script>
</select></td></tr>
<tr><td>Candidate Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="user_pass" size="20" maxlength="10" /> </td></tr>
<tr><td>Librarian Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="lib" size="20" maxlength="10" /> </td></tr>
<tr><td><input type="submit" name="submit" value="Issue Book" /></td></tr>
</table>
 </form>

 

</body>
</html>
