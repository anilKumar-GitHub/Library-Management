<script type="text/javascript" src="validation.js"></script>

<body background="images/blue.jpg"><br /><br><br>
<?
$Error_msg = "";

		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );


$result = mysql_query(" SELECT  DISTINCT Title FROM book_stack");   
while ( $row = mysql_fetch_array($result) ) 	{  	
		$db_book[] = $row['Title'];  }

$result = mysql_query(" SELECT  DISTINCT Author FROM book_stack");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$db_author[] = $row['Author'];  }
		
		
		
$result = mysql_query(" SELECT  * FROM edition");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$EDTN[$row['NUM']] = $row['ALPHA'] ;  }


$result = mysql_query(" SELECT  DISTINCT Price FROM book_stack");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$db_price[] = $row['Price'];  }


$result = mysql_query(" SELECT  DISTINCT   Publisher FROM book_stack");   
while ( $row = mysql_fetch_array($result) ) {
		$db_publish[] = $row['Publisher'];	}


$result = mysql_query(" SELECT * FROM branch");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$Brnch[$row['Branch_Code']] = $row['Branch_Name'] ;  }
 
?>



<?
	if( !isset( $_REQUEST["Register"] ) ) $_REQUEST["Register"] = " ";
	
	if( $_REQUEST["Register"] == "Register This Book" ) {
			$_book = htmlspecialchars($_REQUEST['book_no']);
			$_ISBN = htmlspecialchars($_REQUEST['ISBN']);
			$_title = $_REQUEST['Title'];
			$_author = $_REQUEST['Author'];
			$_edit = $_REQUEST['EDITION'];
			$_dept = $_REQUEST['branch'];
			$_pub = $_REQUEST['Publish'];
			$_prc = $_REQUEST['Price'];
		
		}else {
		
			$_book = "";
			$_ISBN = "";
			$_title = "SELECT";
			$_author = "SELECT";
			$_edit = "SELECT";
			$_dept = "SELECT";
			$_pub = "SELECT";
			$_prc = "SELECT";
			$def = " "; 
		}


if( $_REQUEST["Register"] == "Register This Book" ) {    # Confirm user is pressed the this button "Register This Book"

			# check for the book is available in book_stack or not 
		$sql = "SELECT * FROM book_stack WHERE Title = '$_title' AND Author = '$_author' AND Edition = '$_edit' AND Department = '$_dept' AND Publisher = '$_pub' AND Price = '$_prc'";      			

		$res = mysql_query( $sql );    # run the command 

	if( mysql_affected_rows() == 0 ) {   # test if there is no book is available for given set of inputs then no row is selecte i,e 						 											mysql_affected_rows() == 0. Then print below message 
			echo" <script type='text/javascript'> alert('\\nThis book record is not Available \\n\\n Title : $_title \\n Author : $_author \\n Edition : $_edit \\n Department : $_dept \\n Publisher : $_pub \\n Price : $_prc \\n\\n Try for existing book or Create new Category for this book.'); </script>  ";
	
		}	else {   # if book is available for given set of inputs then mysql_affected_rows() > 0, So perform purther operations
 		
			while ( $row = mysql_fetch_array($res) ) 	{   # Read the book id for linking book_stack and book_list table. Also to insert record in 
						$id = $row['Book_ID']; 				# book_list for this we need book_id from book_stack
	 			}
 					$sql1 = "INSERT INTO Book_list VALUES ('$_ISBN','$id','$_book',0)";  # Insert all details and initial value of status is Zero
 					
					if( mysql_query( $sql1 ) )	{   # In this section test for primary key evalution. 
						 echo" <script type='text/javascript'> alert('\\nThe book details \\n\\n Book No : $_book \\n ISBN : $_ISBN\\n Title : $_title \\n Author : $_author \\n Edition : $_edit \\n Department : $_dept \\n Publisher : $_pub \\n Price : $_prc \\n\\n This Record is Successfully Inserted .'); </script>  ";

							# Increament the total book size of respective book [book id]  every time a new book inserted 
					 	 if(! mysql_query("UPDATE book_stack SET Total_Books = Total_Books + 1, Available_Books = Available_Books + 1 WHERE  Book_ID = '$id'")) {  
						 echo "Error : ".mysql_error(); 
						 }
						 
			}	 else {					# If book no already exist with another book details then book can't be inserted and display message 
 							echo  "<script type='text/javascript'>   alert('Error : This Book Entry Already Exist.\\n\\n Book No : $_book \\n\\n This code already asigned to other book. \\n\\n Note : Give Unique No. to Book'); </script>  ";

						}
		}
}
?>
</table>
<form name="form1" action="BookEntry.php" method="post">
<table cellpadding="0" cellpadding="5" border="0" bordercolor="#000000" width="100%" style="font-size:20px; color:#0000FF;"  >
<!--<tr><td>&nbsp;</td><td>First</td><td>second</td><td>Third</td><td>Fifth</td></tr>
-->

<tr><td><? for($i = 0 ; $i < 10 ; $i++ ) echo "&nbsp;"; ?></td><td>Book Number <input type="text" name="book_no" value="<?=$_book;?>" size="20" maxlength="14" tabindex="N"></td><td>Book ISBN <input type="text" name="ISBN" value="<?=$_ISBN;?>" size="30" maxlength="19" tabindex="I"></td><td align="right"><script type="text/javascript" > date(); </script></td><td></td></tr>

<tr><td><br></td></tr>

<tr><td></td><td colspan="4">Book Name  <select name="Title"><option value="SELECT">SELECT</option><? asort($db_book); foreach($db_book as $var ) {  if (!strcmp($var,$_title) ) $def = "SELECTED"; echo "<option value='$var' $def>  $var  </option>";  $def=" "; }?> </select></td></tr>

<tr><td><br></td></tr>

<tr><td></td><td>Author Name&nbsp;&nbsp;<select name="Author"><option value="SELECT">SELECT</option><? asort($db_author); foreach($db_author as $var ){ if(!strcmp($var,$_author) )  $def = "SELECTED"; echo "<option value='$var' $def>  $var  </option>";  $def=" ";  }  ?></select></td><td>Edition&nbsp;&nbsp;<select name="EDITION" ><option value="SELECT">SELECT</option><? ksort($EDTN); foreach($EDTN as $key => $var ){	if (!strcmp($key,$_edit) ) $def = "SELECTED"; echo "<option value='$key' $def>  $var  </option>";  $def=" ";  } ?></select></td></tr>

<tr><td><br></td></tr><tr><td><br></td></tr>

<tr><td></td><td>Department &nbsp;&nbsp;<select name="branch" ><option value="SELECT">SELECT</option><? asort($Brnch); foreach($Brnch as $key => $var ){  if (!strcmp($key,$_dept) )$def = "SELECTED"; echo "<option value='$key' $def>  $var  </option>";  $def=" ";  } ?></select></td><td>Publisher&nbsp;&nbsp;<select name="Publish" ><option value="SELECT">SELECT</option><? asort($db_publish); foreach($db_publish as $var ) {  if (!strcmp($var,$_pub) ) $def = "SELECTED"; echo "<option value='$var' $def>  $var  </option>";  $def=" ";  } ?></select></td>
<td>Price Rs.&nbsp;&nbsp;<select name="Price" ><option value="SELECT" >SELECT</option><? asort($db_price); foreach($db_price as $var ){  if (!strcmp($var,$_prc) ) $def = "SELECTED"; echo "<option value='$var' $def>  $var  </option>";  $def=" ";  } ?></select>  Only/-</td></tr>

<tr><td><br></td></tr>
<tr><td><br></td> <td colspan="3"><? echo " $Error_msg "; ?></td></tr><tr><td colspan="2"><br></td><td align="right"><input type="submit" name="Register" value="Register This Book"></td><td align=x"left"><a href="NewBookStckEntry.php"><img align="absbottom" src="images/newEntryBtn.jpg" border="0"></a><input type="reset" name="reset" value="Re-Set" ></td></tr>

<tr><td colspan="4" background="images/blue.jpg"><h4><font color="#FF0000"> <b>Note </b>:</font> <font color="#0000FF" face="Courier New"> If the book is not having same matches to corresponding fields or if it is new entry then register the book in DataBase first.</font></h4></td></tr>

</table></form>

<? 
#Edition&nbsp;&nbsp;<select name="EDITION" ><option value="SELECT">SELECT</option><? ksort($EDTN); foreach( $EDTN as $key => $var ) echo "<option value='$key'>$var &nbsp;Edition&nbsp;</option>"; ?</select>
# echo "Swaroopa I Love You ";
 
?>


</body>