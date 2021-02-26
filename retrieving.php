<script type="text/javascript" src="validation.js"></script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="images/blue.jpg"><br><br>
<form name="form2" action="retrieving.php" method="get">
<input type="text" name="book" size="50"  />
<input type="submit" name="submit" value="Search"  />
<hr color="#003366" width="60%" align="left"/>
</form>

<form name="form1" action="retrieveprocess1.php" method="get">
<table id="myTable" cellpadding="5" cellspacing="2" border="0" width="102%" style="position:absolute; top:100px; left:0px;" >
<tr bgcolor="#CCCCFF"><th  align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" >SL.No</th><th align="left" ></th><th align="left" >Book No</th><th>Book Name</th><th >Authour Name</th><th >Register No</th><th>Candidate Name</th><th>Issued Date</th><th>Dept</th><th width="1%">Action</th></tr>


<?


$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );
 
$testBit1 = 0 ;		$testBit2 = 0 ; 



if ( ! isset($_REQUEST['submit']) ) $_REQUEST['submit'] = "";

if( $_REQUEST['submit'] == "Search" ) {
	$bk = $_REQUEST['book'];
	$BID = explode(";",$bk);
				 $k = 01 ; $i = 1 ;
	foreach($BID as $bno ){
		
		$res_by_ID = mysql_query("SELECT * FROM Registration R, Issue I WHERE R.Reg_No = '$bno' AND R.Reg_No = I.Reg_No");
		$z = 1 ;
		if( ! mysql_affected_rows() == 0 && ( $testBit1 == 0 && $testBit2 == 0  ) ) {
			while($firstRow = mysql_fetch_array($res_by_ID))
				 {
 
					 
					$bno = $firstRow['Book_No'];
					$sql = " SELECT  * FROM  book_stack BS, book_List BL, Issue I, Registration Reg WHERE I.Book_No = '$bno'  AND I.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND I.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No";
					
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
				 {

					$db_ID = $row['Book_No'];
					$db_title = $row['Title'];
					$db_author = $row['Author'];
					$db_reg = $row['Reg_No'];
					$db_name = $row['Name'];
					$db_Issued = $row['Date_of_Issue'];
					$db_dept = $row['Course'];

					 if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
								}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
											 }else { $i = 1 ; $clr = "FFCCCC";}
											 
					$testBit2++; 
						echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td width='1%' align='right'>". $k++ ." </td><td width='1%' align='right'><input type=\"checkbox\" name=\"books\" value='$db_ID'></td><td width='6%' align='right'>$db_ID</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td>$db_name</td><td width='7%' align='right'>$db_Issued</td><td align='center'>$db_dept</td><td><a href=retrieveprocess1.php?action=retrieveLink&BNO=$db_ID title=\" Retrieve this $db_title books\" >Retrive</a></td></tr>";
					}
			} break;
		} else {
			
		$sql = " SELECT  * FROM  book_stack BS, book_List BL, Issue I, Registration Reg WHERE I.Book_No = '$bno'  AND I.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND I.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No";			
			
		$res = mysql_query($sql);

		if( mysql_affected_rows() == 0 ) { 
			$testBit1++;	
			echo "<tr><td colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : This Book Is Not Issued [ $bno ]  </td></tr>";
	$testBit1 = 1 ;			}
		else {
		

 
 				while($row = mysql_fetch_array($res))
				 {
 
					 $testBit2++;

					$db_ID = $row['Book_No'];
					$db_title = $row['Title'];
					$db_author = $row['Author'];
					$db_reg = $row['Reg_No'];
					$db_name = $row['Name'];
					$db_Issued = $row['Date_of_Issue'];
					$db_dept = $row['Course'];

					 if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
								}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
											 }else { $i = 1 ; $clr = "FFCCCC";} 
						echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td width='1%' align='right'>". $k++ ." </td><td width='1%' align='right'><input type=\"checkbox\" name=\"books\" value='$db_ID'></td><td width='6%' align='right'>$db_ID</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td>$db_name</td><td width='7%' align='right'>$db_Issued</td><td align='center'>$db_dept</td><td><a href=retrieveprocess1.php?action=retrieveLink&BNO=$db_ID title=\" Retrieve this $db_title books\" >Retrive</a></td></tr>";
					}
			}
		}

	}  
}
else {

$sql = " SELECT  * FROM  book_stack BS, book_List BL, Issue I, Registration Reg WHERE I.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND I.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No";

$res = mysql_query($sql);
 
 $k = 01 ; $i = 1 ;
 

 
 while($row = mysql_fetch_array($res))
 {
 
 $testBit2++;

$db_ID = $row['Book_No'];
$db_title = $row['Title'];
$db_author = $row['Author'];
$db_reg = $row['Reg_No'];
$db_name = $row['Name'];
$db_Issued = $row['Date_of_Issue'];
$db_dept = $row['Course'];

 if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 
										 

	echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td width='1%' align='right'>". $k++ ." </td><td width='1%' align='right'><input type=\"checkbox\" name=\"books\" value='$db_ID'></td><td width='6%' align='right'>$db_ID</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td>$db_name</td><td width='8%' align='right'>$db_Issued</td><td align='center'>$db_dept</td><td><a href=retrieveprocess1.php?action=retrieveLink&BNO=$db_ID title=\" Retrieve this $db_title books\" >Retrive</a></td></tr>";
	
}


}
?>

<tr><td colspan="11"><input type="hidden" name="hideBook" size="500">
<input type="submit" name="Retrieve" value="Retrive Selected Book" onClick="return validation()" <? if(( $testBit1 == 0 && $testBit2 < 2 ) || ( $testBit1 > 0 && $testBit2 < 2 ) ) echo "disabled=\"disabled\""; ?> > <a style="font:'Courier New'; color:#666666; text-decoration:none;  font-size:18px;" href="retrieving.php" > BACK </a></td></tr>

</table>
</form>

</body>
</html>