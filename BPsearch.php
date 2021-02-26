<script type="text/javascript" src="validation.js"></script>


<body link="#0000FF" alink="#00FF00" vlink="#0000FF" background="images/blue.jpg"><br><br>
<form name="form" action="BPsearch.php" method="post">
<input type="text" name="book" size="70" >&nbsp;&nbsp; <input type="submit" name="submit" value=" Search Book " >
<br />
<hr size="2" color="#FF0000" width="60%" align="left" />
</form>



<form name="form1" action="BPopen.php" method="post">
<table id="myTable" cellpadding="03" cellspacing="1" border="0" width="100%" >
<tr bgcolor="#CCCCFF"><th width="1%" align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" width="1%">SL.No</th><th align="left" width="1%">Select</th><th>Book Name </th><th>Authour Name</th><th>Publisher </th><th>Department</th><th>Edition</th><th>Price</th><th>T.B</th><th>A.B</th><th>I.B</th><th>Action</th></tr>

<?

		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

if( !isset($_REQUEST["book"]))			  $_REQUEST["book"] = "";

$book = sqlite_escape_string( $_REQUEST["book"] );			
$prc = (int)$book;		
$sql =" SELECT * FROM book_stack where Title LIKE \"%$book%\" OR Publisher LIKE \"$book%\"  OR  Author LIKE \"$book%\" OR Price LIKE $prc OR  Department = (SELECT Branch_Code FROM Branch WHERE Branch_Name LIKE '$book%') OR Edition = (SELECT NUM FROM Edition WHERE ALPHA LIKE '$book%')";			
$result = mysql_query( $sql );
//echo $sql ;

$n = mysql_affected_rows();
if( $n == 0 || $book =="") 
	{ 
		echo "<tr><td><br></td></tr><tr bgcolor=\"#CCCCFF\"><td align='center' colspan='13'> <b>No Such Book is Available In Library</b> </td></tr>";
		echo "<tr><td colspan='9'><a href=\"BookPortal1.php\"> <img src='images/back.jpg' border='0' ></a></td></tr>";
		exit(0);
	}


$testBit1 = 0 ;

$i = 1 ; $k = 01 ;
while ( $row = mysql_fetch_array($result) ) {
$db_ID = $row['Book_ID'];
$db_book = $row['Title'];
$db_author = $row['Author'];
$db_publish = $row['Publisher'];
$db_price = $row['Price'];
$db_edition = $row['Edition'];
$T_Books = $row['Total_Books'];   
$db_dept = $row['Department']; 
$IB = $row['Issued_Books']; 	
$AB = $row['Available_Books'];

$testBit1++;

$res = mysql_query("SELECT  Branch_Name, ALPHA FROM branch, edition WHERE Branch_Code = '$db_dept' AND NUM = '$db_edition'");   
while ( $row = mysql_fetch_array($res) ) 	{  	
		$branch = $row['Branch_Name'];  
		$edt = $row['ALPHA'];			}

if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 

 echo "<tr bgcolor=\"$clr\"><td  width=\"1%\" align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align=\"right\">". $k++ ." </td><td align=\"center\"><input type=\"checkbox\" name=\"books\" value=\"$db_ID\"></td><td>$db_book</td><td>$db_author</td><td>$db_publish</td><td  align=\"left\">$branch</td><td  align=\"left\">$edt</td><td  align=\"right\">$db_price</td><td align='right'>$T_Books</td><td align='right'>$AB</td><td align='right'>$IB</td><td><a href=BPopen.php?ID=".$row['Book_ID']." title=\" Open the list of $db_book books\" >open</a></tr>";

}
echo " <tr><td colspan='13' bgcolor=\"#CCCCFF\"><center>".mysql_affected_rows()."  books are Available of &nbsp; \" ".$book." \" &nbsp; in Search.</center></td></tr>";
?><tr><td colspan="5"><input type="hidden" name="hideBook" size="500"><input type="submit" name="Search" value="Open Book" <? if( $testBit1 < 2 ) echo "disabled=\"disabled\""; ?>   onClick="return validation()">&nbsp;&nbsp;&nbsp;<a href="searchEngin.php"><img src="images/back.jpg" border="0"></a></td></tr>
</table>

</form>

<? 

mysql_close($con);
?>
</pre>

</body>
</html>