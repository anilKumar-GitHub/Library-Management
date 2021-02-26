<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="validation.js"></script>
</head>
<body background="images/blue.jpg">
<br /><br />

<form name="form2" action="issueprocess.php" method="get">
<input type="text" name="book" size="70" >
<input type="submit" name="submit" value="Search Book">
<hr color="#00FF00" width="70%" align="left">
</form>

<table border='0' cellpadding="5" width="100%" style="position:absolute; top:100px; left:0px;">
<form name="form1" action="issueprocess2.php" method="get">
<?
	$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
	$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );
?>
<tr bgcolor="#CCCCFF"><th width="01%" align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" width="1%">SL.No</th><th align="left" width="1%">Select</th><th align="left" >Book No</th><th >Book ISSN</th><th >Book Name </th><th>Authour Name</th><th>Publisher </th><th>Dept</th><th>Edition</th><th>Price</th><th>Action</th></tr> 
<? 

	$book_list = array();	

	$testBit1 = 0 ;		$testBit2 = 0 ; $singleEntryControl1 = ""; $singleEntryControl2 = "";

 $k = 01 ;

 if( !isset($_REQUEST['submit']) ) $_REQUEST['submit'] = "";

 if( $_REQUEST['submit'] == "Search Book" )
 		{ 
			$bk = $_REQUEST['book'];
			$book_list = explode(";",$bk); 
			foreach( $book_list as $book ) { 
			$sql="SELECT  *  FROM book_stack BS, book_List BL WHERE BL.Book_No = '$book' AND BL.Book_ID = BS.Book_ID AND BL.Status = 0 ";
			 $i = 0 ; 
			$result = mysql_query($sql);  
 			if( mysql_affected_rows() == 0 ) {
			if( strcmp($singleEntryControl1,$book) == 0 ) { continue; }
 			echo "<tr><th colspan= '13' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;' align='left'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : Book No - $book Not Available [ OR Isuued to someone else ] </th></tr>";
				$testBit1 = 1 ;	
			continue;
			}
 			while($row = mysql_fetch_array($result))		
					{
 						if( $i == 1 ){  $i = 2 ;  $clr = "#FFE4C4";
									}else if($i == 2 ) {  $i = 3 ;  $clr = "FAEBD7";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
							$res = mysql_query("SELECT  Branch_Name, ALPHA FROM branch, edition WHERE Branch_Code = '".$row['Department']."' AND NUM = '".$row['Edition']."'");   
							while ( $row1 = mysql_fetch_array($res) ) 	{  	
								$branch = $row1['Branch_Name'];  	
								$edt = $row1['ALPHA'];			}
								if( $singleEntryControl2 == $row['Book_No'] )	{	continue;	}
								$singleEntryControl2 = $row['Book_No'];			$testBit2++;								
						 echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>".$k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='". $row['Book_No']."'></td><td>". $row['Book_No']."</td><td>".$row['ISBN']."</td><td>". $row['Title'] . "</td><td>".$row['Author']."</td><td>".$row['Publisher']."</td><td align='right'>".$row['Department']."</td><td align='right'>$edt</td><td align='right'>".$row['Price']."</td><td align='center'> <a href='issueprocess2.php?action=issueLink&BNO=".$row['Book_No']."'> issue </a> </td></tr>";	
 }

		}
	}else  {
				$singleEntryControl = "";	
			$sql = "SELECT ISBN, Book_No, Title, Author, Publisher, Department, Edition, Price FROM book_list BL, book_stack BS WHERE BL.Book_ID = BS.Book_ID  AND BL.Status = 0  order by BS.title";
				echo "<pre>"; $i = 0 ;
				$result = mysql_query($sql); 
				if(mysql_affected_rows() == 0 ) 	{  
	echo "<tr><th colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : Currently No Books Are Available for In Library [ All Books Are Issued ]  </th></tr>";
		$testBit1++;
}
 				while($row = mysql_fetch_array($result))		
					{										 
					$res = mysql_query("SELECT  Branch_Name, ALPHA FROM branch, edition WHERE Branch_Code = '".$row['Department']."' AND NUM = '".$row['Edition']."'");   
							while ( $row1 = mysql_fetch_array($res) ) 	{  	
								$branch = $row1['Branch_Name'];  	
								$edt = $row1['ALPHA'];			}					

					if( $singleEntryControl == $row['Title'] )   	{	continue;	}
 						if( $i == 1 ){  $i = 2 ;  $clr = "#FFE4C4";
								}else if($i == 2 ) {  $i = 3 ;  $clr = "FAEBD7";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
								$testBit2++;
					 echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>".$k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='". $row['Book_No']."'></td><td>". $row['Book_No']."</td><td>".$row['ISBN']."</td><td>". $row['Title'] . "</td><td>".$row['Author']."</td><td>".$row['Publisher']."</td><td align='right'>".$row['Department']."</td><td align='right'>$edt</td><td align='right'>".$row['Price']."</td><td align='center'> <a href='issueprocess2.php?action=issueLink&BNO=".$row['Book_No']."'> issue </a> </td></tr>";
		$singleEntryControl = $row['Title'];
 }
} 
?>
<tr><td colspan="12"><input type="hidden" name="hideBook" size="500">
<input type="submit" name="Isuue" value="Isuuse Selected Book" onClick="return validation()"  <?	if( $testBit1 == 1 && $testBit2 < 2 ) echo "disabled='disabled'";  ?> >&nbsp;&nbsp;&nbsp;<a href="issueprocess.php" style="font:'Courier New'; color:#666666; text-decoration:none; font-size:18px;"> Back </a></td></tr>
</form>
</table>

</body>
</html>
