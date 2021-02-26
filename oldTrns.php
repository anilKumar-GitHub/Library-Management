<body link="#0000FF" alink="#00FF00" vlink="#0000FF" background="images/blue.jpg"><br><br>
<form name="form" action="oldTrns.php" method="post">
<input type="text" name="book" size="70" >&nbsp;&nbsp; <input type="submit" name="submit" value="Search History" >
<br />
<hr size="2" color="#FF0000" width="60%" align="left" />
</form>
<table id="myTable" cellpadding="5" cellspacing="2" border="0" width="102%" style="position:absolute; top:100px; left:0px;" >
<tr bgcolor="#CCCCFF"><th  align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" >SL.No</th><th align="left" >Book No</th><th>Book Name</th><th >Authour Name</th><th >Register No</th><th>Candidate Name</th><th>Issued Date</th><th>Retrieved Date<th>Action</th></tr>


<?


$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

$k = 01 ; $i = 0 ;

$testBit1 = 0; $testBit2 = 0;

if(! isset( $_REQUEST['submit'] ) ) $_REQUEST['submit'] = "";
if( $_REQUEST['submit'] == "Search History" ) {
	$bk = $_REQUEST['book'];
	$BID = explode(";",$bk);

	foreach($BID as $bno ){
		
		$res_by_ID = mysql_query("SELECT * FROM Registration R, old_transaction O WHERE R.Reg_No = '$bno' AND R.Reg_No = O.Reg_No");
		$z = 1 ;
		$singleEntryControl = "";
		if( ! mysql_affected_rows() == 0 && ( $testBit1 == 0 && $testBit2 == 0  ) ) {
			while($firstRow = mysql_fetch_array($res_by_ID))
				 {
					if( $singleEntryControl == $firstRow['Book_No'] ) continue; 
					$singleEntryControl = $firstRow['Book_No'];
					 
					$No = $firstRow['Book_No'];
					$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O, Registration Reg WHERE O.Book_No = '$No' AND O.Reg_No = '$bno'  AND O.Book_No = BL.Book_No AND BL.Book_ID = BS.Book_ID AND O.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No, Issued_Date";
					
			$res = mysql_query($sql);
			while($row = mysql_fetch_array($res))
				 {

					$db_Bno = $row['Book_No'];
					$db_title = $row['Title'];
					$db_author = $row['Author'];
					$db_reg = $row['Reg_No'];
					$db_name = $row['Name'];
					$db_IS_date = $row['Issued_Date'];
					$db_Ret_date = $row['Return_Date'];

					if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
										}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
														 }else { $i = 1 ; $clr = "FFCCCC";} 
														 
												 
					echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=FullView.php? title=\" Hello Open the list of $db_Bno books\" >View</a></td></tr> ";

		} 
	}
} else {
			
		$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O, Registration Reg WHERE O.Book_No = '$bno' AND O.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND O.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No, Issued_Date";

		$res = mysql_query($sql);

		if( mysql_affected_rows() == 0 ) { 
			$testBit1++;	
			echo "<tr><td colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : This Book Is Not Issued [ $bno ]  </td></tr>";
	$testBit1 = 1 ;			}
		else {
		

 
 				while($row = mysql_fetch_array($res))
				 {
 
					 $testBit2++;

					$db_Bno = $row['Book_No'];
					$db_title = $row['Title'];
					$db_author = $row['Author'];
					$db_reg = $row['Reg_No'];
					$db_name = $row['Name'];
					$db_IS_date = $row['Issued_Date'];
					$db_Ret_date = $row['Return_Date'];

					if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
										}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
																 }else {	$i = 1 ; $clr = "FFCCCC";	} 

							echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=FullView.php?action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >View</a></td></tr> ";
					}
			}
		}

	}  
}

else {

$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O, Registration R WHERE O.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND O.Reg_No = R.Reg_No ";

$res = mysql_query($sql);
 while($row = mysql_fetch_array($res))
 {
$db_Bno = $row['Book_No'];
$db_title = $row['Title'];
$db_author = $row['Author'];
$db_reg = $row['Reg_No'];
$db_name = $row['Name'];
$db_IS_date = $row['Issued_Date'];
$db_Ret_date = $row['Return_Date'];

if( $i == 1 ){  $i = 2 ;  $clr = "FAEBD7";
				}else if($i == 2 ) {  $i = 3 ;  $clr = "#FFE4C4";
										 }else { $i = 1 ; $clr = "FFCCCC";} 

	
echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=FullView2.php?action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >View</a></td></tr> ";

	// action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&$RD=$db_Ret_date		

}
 
 
 }
?>