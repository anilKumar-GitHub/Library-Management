<script type="text/javascript" src="validation.js"></script>
<body link="#0000FF" alink="#00FF00" vlink="#0000FF" background="images/blue.jpg">
<?
$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

if( ! isset( $_REQUEST['action'] ) ) $_REQUEST['action'] = "";
if( $_REQUEST['action'] == "Fullview" ) {
?>
<table cellpadding="5" border="0" width="100%" bgcolor="#FFFFFF" style="position:absolute; top:100px; left:0px; color:#0000CC; font-family:'Courier New'; font-size:22px;">
<?

$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O WHERE O.Book_No = '".$_REQUEST['BNO']."' AND O.Reg_No = '".$_REQUEST['Reg']."' AND O.Issued_Date = '".$_REQUEST['ISD']."' AND O.Return_Date = '".$_REQUEST['RD']."' AND O.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID ";
echo "<tr style='color:#666666; font-family:Algerian, 'Arial Black'; font-size:40px;'><td><u>Old Transaction Detail</u></td><td align='right'><a href='freeUptrnsct.php'>BACK</a></td></tr>";
echo "<tr><td><br></td</tr>";
$res = mysql_query($sql);
 while($row = mysql_fetch_array($res))
 {
 
 
$res = mysql_query("SELECT  Branch_Name, ALPHA FROM branch, edition WHERE Branch_Code = '".$row['Department']."' AND NUM = '".$row['Edition']."'");   
			while ( $row1 = mysql_fetch_array($res) ) 	{  	
				$branch = $row1['Branch_Name'];  	
				$edt = $row1['ALPHA'];			}
				
echo "<tr><td> Book Number : ".$row['Book_No']."</td><td> Book ISSN : ". $row['ISBN']."</td></tr>";
echo "<tr><td colspan='2'> Title : ". $row['Title']."</td></tr>";
echo "<tr><td colspan='2'> Depatment : $branch</td></tr>";
echo "<tr><td> Author : ".$row['Author']."</td><td>Publisher : ".$row['Publisher']."</td></tr>";
echo "<tr><td> Edition : $edt</td><td>Price  Rs.: ". $row['Price']." Only</td></tr>";
echo "<tr><td> Issued Date  : ".$row['Issued_Date']."</td><td>Return Date : ". $row['Return_Date']."</td></tr>";
echo "<tr><td colspan='2'><hr></td></tr>";
echo "<tr><td colspan='2'><br></td></tr>";
}

echo "<tr><td  colspan='2' style='color:#666666; font-family:Algerian, 'Arial Black'; font-size:40px;'><u>Candidate Inforamtion</u></td></tr>";
$sql = "SELECT  * FROM  registration Reg, old_transaction O, branch B WHERE O.Book_No = '".$_REQUEST['BNO']."' AND O.Reg_No = '".$_REQUEST['Reg']."' AND O.Issued_Date = '".$_REQUEST['ISD']."' AND O.Return_Date = '".$_REQUEST['RD']."' AND O.Reg_No = Reg.Reg_No AND Reg.Course  = B.Branch_Code ";
$res = mysql_query($sql);
 while($row = mysql_fetch_array($res))
 {
echo"<tr><td> Issued To : Mr/Miss  ".$row['Name'].".</td><td>Register No : ". $row['Reg_No']."</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td colspan='2'> Father Name : ". $row['Fname']."</td></tr>";
echo "<tr><td colspan='2'> Address : ".$row['Address']."</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td> Department : ".$row['Branch_Name']."</td><td>Semester : ". $row['Sem']."</td></tr>";
echo "<tr><td><br></td></tr>";
echo "<tr><td colspan='2'>College : ". $row['Clg_Name']."</td></tr>";
echo "<tr><td colspan='2'>College Address: ". $row['Clg_Add']."</td></tr>";
} 
exit(0);
}

?>


<form name="form" action="freeUptrnsct.php" method="post">
<input type="text" name="book" size="70" >&nbsp;&nbsp; <input type="submit" name="submit" value="Search History" >
<br />
<hr size="2" color="#FF0000" width="60%" align="left" />
</form>

<form name="form1" action="freeUptrnsct.php" method="post">
<table  cellpadding="5" cellspacing="2" border="0" width="100%" style="position:absolute; top:100px; left:0px;">
<tr bgcolor="#CCCCFF"><th  align="right"><img src="images/serial.jpg" width="20" height="20"></th><th align="left" >SL.No</th><th align="left" ></th><th align="left" >Book No</th><th>Book Name</th><th >Authour Name</th><th >Register No</th><th>Candidate Name</th><th>Issued Date</th><th>Retrieved Date<th>Action</th></tr>


<?
if( ! isset( $_REQUEST['multi_Deletion'] ) ) $_REQUEST['multi_Deletion'] = "";
if( $_REQUEST['multi_Deletion'] == "Delete Selected Book" ) {
$bk = $_REQUEST['hideBook'];
$ID = explode(",",$bk);
/*foreach( $ID as $BID ) { 
echo "<br>".$book; 

$BID = explode(";",$book);
//foreach($BID as $var )
//echo "<br>".$var;
$o = $BID[0];
$t = $BID[1];
$tr = $BID[2];
$f = $BID[3];
}  */

}

if( ! isset( $_REQUEST['action'] ) ) $_REQUEST['action'] = "";
if( $_REQUEST['action'] == "DELETE" ) {
$ID[] = $_REQUEST['BNO'].";".$_REQUEST['Reg'].";".$_REQUEST['ISD'].";".$_REQUEST['RD'];
}



if( $_REQUEST['multi_Deletion'] == "Delete Selected Book"  ||  $_REQUEST['action'] == "DELETE" ) {

foreach( $ID as $BID ) {
$book = explode(";",$BID);
$sql = "DELETE FROM old_transaction WHERE Book_No = '".$book[0]."' AND Reg_No = '".$book[1]."' AND Issued_Date = '".$book[2]."' AND Return_Date = '".$book[3]."'"; 
mysql_query($sql);
}
/*echo "<script type='text/javascript'> alert('The Book Deleted...\\n\\n ');  </script>";*/
}
?>







<?

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
														 }else { $i = 1 ; $clr = "FFCCCC";} 
														 
					$ch_value = $db_Bno.";".$db_reg.";".$db_IS_date.";".$db_Ret_date;												 
					echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='$ch_value'></td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=freeUptrnsct.php?action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the  $db_reg Detail\" >View</a>&nbsp;<a href=freeUptrnsct.php?action=DELETE&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Delete the  $db_reg Detail\" >DELETE</a></td></tr> ";
				}
			} 
		} else {
			
		$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O, Registration Reg WHERE O.Book_No = '$bno' AND O.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID AND O.Reg_No = Reg.Reg_No ORDER BY Reg.Name, BS.Title, BL.Book_No, Issued_Date";

		$res = mysql_query($sql);

		if( mysql_affected_rows() == 0 ) { 
			$testBit1++;	
			echo "<tr><td colspan= '11' bgcolor='#999999' style='color:#FFFFFF; font-size:20px;'><img src=\"images/serial.jpg\" width=\"20\" height=\"20\">   Error : This Book Is Not Issued [ $bno ]  </td></tr>";
	$testBit1++ ;			}
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
																 }else { $i = 1 ; $clr = "FFCCCC";} 
							$ch_value = $db_Bno.";".$db_reg.";".$db_IS_date.";".$db_Ret_date;

							echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='$ch_value'></td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=freeUptrnsct.php?action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >View</a>&nbsp;<a href=freeUptrnsct.php?action=DELETE&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >DELETE</a></td></tr> ";
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

			$testBit2++;
	
	$ch_value = $db_Bno.";".$db_reg.";".$db_IS_date.";".$db_Ret_date;
	
echo "<tr bgcolor=\"$clr\"><td align=\"right\"><img src=\"images/serial.jpg\" width=\"20\" height=\"20\"></td><td align='right'>". $k++ ." </td><td align='right'><input type=\"checkbox\" name=\"books\" value='$ch_value'></td><td>$db_Bno</td><td>$db_title</td><td>$db_author</td><td>$db_reg</td><td >$db_name</td><td>$db_IS_date</td><td>$db_Ret_date</td><td align='center'><a href=freeUptrnsct.php?action=Fullview&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >View</a>&nbsp;<a href=freeUptrnsct.php?action=DELETE&BNO=$db_Bno&Reg=$db_reg&ISD=$db_IS_date&RD=$db_Ret_date title=\" Open the list of $db_Bno books\" >DELETE</a></td></tr> ";



}
 
 
 }
?>

<tr><td></td><td><br></td></tr>

<tr><td colspan="10"><input type="hidden" name="hideBook" size="500">
<input type="submit" name="multi_Deletion" value="Delete Selected Book" onClick="return validation()"  <? if(( $testBit1 == 0 && $testBit2 < 2 ) || ( $testBit1 > 0 && $testBit2 < 2 ) ) echo "disabled=\"disabled\""; ?> >&nbsp;&nbsp;<a href="freeUptrnsct.php"><img src="images/back.jpg" border="0"></a></td></tr>


</form>

</body>