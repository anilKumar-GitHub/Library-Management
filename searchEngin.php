<script type="text/javascript" src="validation.js"></script>


<body link="#0000FF" alink="#00FF00" vlink="#0000FF" background="images/blue.jpg"><br><br>
<form name="form" action="search.php" method="post">
<input type="text" name="book" size="70" >&nbsp;&nbsp; <input type="submit" name="submit" value=" Search Book " >
<br />
<hr size="2" color="#00FF00" width="60%" align="left" />
</form>


<form name="form1" action="open.php" method="post">
<table id="myTable" cellpadding="03" cellspacing="1" border="0" width="100%" >
<tr bgcolor="#CCCCFF"><th width="01%" align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" width="1%">SL.No</th><th align="left" width="1%">Select</th><th>Book Name </th><th>Authour Name</th><th>Publisher </th><th>Department</th><th>Edition</th><th>Price</th><th>T.B</th><th>A.B</th><th>I.B</th><th>Action</th></tr>

<?php 


		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );

$result = mysql_query( " SELECT * FROM book_stack, branch, edition WHERE Department = Branch_Code AND Edition = NUM order by Title");

$testBit1 = 0 ;
 $i = 1 ; $k = 01 ;
while ( $row = mysql_fetch_array($result) ) {
$db_ID = $row['Book_ID'];
$db_book = $row['Title'];
$db_author = $row['Author'];
$db_publish = $row['Publisher'];
$db_price = $row['Price'];
$db_edition = $row['ALPHA'];
$T_Books = $row['Total_Books'];   
$db_dept = $row['Branch_Name']; 
$IB = $row['Issued_Books']; 	
$AB = $row['Available_Books'];

$testBit1++;

if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
 echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>".$k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value=\"$db_ID\"></td><td>$db_book</td><td>$db_author</td><td>$db_publish</td><td align='left'>$db_dept<td>$db_edition</td><td align='right'>$db_price</td><td align='right'>$T_Books</td><td align='right'>$AB</td><td align='right'>$IB</td><td align='center'><a href=open.php?action=Open+Book&ID=".$row['Book_ID']." title=\" Open the list of $db_book books\" >open</a></tr> ";

}

?>
</table>
<input type="hidden" name="hideBook" size="500">
<input type="submit" name="Search" value="Open Book"  <? if( $testBit1 < 2 ) echo "disabled=\"disabled\""; ?>  onClick="return validation()">

</form>


</body>