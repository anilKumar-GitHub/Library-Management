<script type="text/javascript" src="validation.js"></script>
<body link="#0000FF" alink="#00FF00" vlink="#0000FF" background="images/blue.jpg">
<?
$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
$db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );


if( $_REQUEST['action'] == "Fullview" ) {
?>
<table cellpadding="5" border="0" width="100%" bgcolor="#FFFFFF" style="position:absolute; top:100px; left:0px; color:#0000CC; font-family:'Courier New'; font-size:22px;">
<?

$sql = " SELECT  * FROM  book_stack BS, book_List BL, old_transaction O WHERE O.Book_No = '".$_REQUEST['BNO']."' AND O.Reg_No = '".$_REQUEST['Reg']."' AND O.Issued_Date = '".$_REQUEST['ISD']."' AND O.Return_Date = '".$_REQUEST['RD']."' AND O.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID ";
echo "<tr style='color:#666666; font-family:Algerian, 'Arial Black'; font-size:40px;'><td><u>Old Transaction Detail</u></td><td align='right'><a href='oldTrns.php'>BACK</a></td></tr>";
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
</table>

</body>