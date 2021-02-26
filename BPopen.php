<script type="text/javascript" src="validation.js"></script>

<body background="images/blue.jpg"><br />
<form name="form2" action="BPopen.php" method="get">
<input type="text" name="ID" size="50" >
<input type="submit" name="submit" value="Search Book">
<hr color="#00FF00" width="70%" align="left">
</form>


<table id="myTable" cellpadding="5" cellspacing="2" border="0" width="100%" >
<tr bgcolor="#CCCCFF"><th  align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" >SL.No</th><th align="left" ></th><th align="left" >Book No</th><th >Book Name </th><th >Authour Name</th><th >Publisher </th><th>Department</th><th>Edition</th><th> Price</th></tr>




<?
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );

$BID = array();
$k = 01 ; $i = 1 ; 
if( ! isset( $_REQUEST['action'] ) ) 	$_REQUEST['action'] = "";
if( ! isset( $_REQUEST['Search'] ) ) 	$_REQUEST['Search'] = "";
if( ! isset( $_REQUEST['submit'] ) )	$_REQUEST['submit'] = "";

if( $_REQUEST['action'] == "Open Book" ) {
$BID[] = $_REQUEST['ID']; 
}  

if( $_REQUEST['Search'] == "Open Book" ) {

		$bk = sqlite_escape_string( $_REQUEST['hideBook'] );
		$BID = explode(",",$bk);
}  


if( $_REQUEST['submit'] == "Search Book" ) {
		$bk = sqlite_escape_string( $_REQUEST['ID'] );
		$BID = explode(";",$bk);
}
$testBit1 = 0 ;		$testBit2 = 0 ;

foreach( $BID as $book ) 	{

/* // Alternative Logic to find books
f( $_REQUEST['Search'] == "Open Book" ) {
$result = mysql_query(" SELECT * FROM book_stack BS, book_List BL WHERE BL.Book_ID ='$book' AND BS.Book_ID = BL.Book_ID AND BL.Status = 0 order by Title");
}
if( $_REQUEST['submit'] == "Search Book" ) {
  $result = mysql_query(" SELECT * FROM book_stack BS, book_List BL WHERE BL.Book_No ='$book' AND BL.Book_ID = BS.Book_ID AND BL.Status = 0 order by Title");
}
if(mysql_affected_rows() == 0 ) 	{  
	echo "<tr><td colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : Currently No Books Are Available for This Catagory [ These Books Are Issued ]  </td></tr>";
	$testBit1++;
}

*/

$result = mysql_query(" SELECT * FROM book_stack BS, book_List BL WHERE BL.Book_ID ='$book' AND BS.Book_ID = BL.Book_ID AND BL.Status = 0 order by Title");

$prevResult = mysql_affected_rows();

if( $prevResult == 0 ) {
  $result = mysql_query(" SELECT * FROM book_stack BS, book_List BL WHERE BL.Book_No ='$book' AND BL.Book_ID = BS.Book_ID AND BL.Status = 0 order by Title");
 }
if(mysql_affected_rows() == 0  &&  $prevResult == 0 ) 	{  
	echo "<tr><td colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : Currently No Books Are Available for This Catagory [ These Books Are Issued ]  </td></tr>";
	$testBit1++;
}

while ( $row = mysql_fetch_array($result) ) {
$db_ID = $row['Book_No'];
$db_book = $row['Title'];
$db_author = $row['Author'];
$db_publish = $row['Publisher'];
$db_price = $row['Price'];
$db_dept = $row['Department']; 
$db_edition = $row['Edition'];
$T_Books = $row['Total_Books'];


$res = mysql_query("SELECT  Branch_Name, ALPHA FROM branch, edition WHERE Branch_Code = '$db_dept' AND NUM = '$db_edition'");   
while ( $row = mysql_fetch_array($res) ) 	{  	
		$branch = $row['Branch_Name'];  
		$edt = $row['ALPHA'];			}

$testBit2++;

if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='$db_ID'></td><td>$db_ID</td><td>$db_book</td><td>$db_author</td><td>$db_publish</td><td >$branch</td><td>$edt</td><td>$db_price</td></tr> ";

}

}
?>
<tr><td colspan="8" ><a href="BookPortal1.php"> <img src="images/back.jpg" border="0"></a></td></tr>
</table>




</body>