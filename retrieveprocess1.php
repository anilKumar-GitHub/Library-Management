		`<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body background="images/blue.jpg">
<br />
<form name="form1" action="retrieving.php" method="get">
<input type="text" name="book" size="50"  />
<input type="submit" name="submit" value="Search"  />
<hr color="#003366" width="60%" align="left"/>
</form>


<table cellpadding="5" border="0" width="100%" bgcolor="#FFFFFF" style="position:absolute; top:100px; left:0px; color:#0000CC; font-family:'Courier New'; font-size:22px;">

<?
		session_start();


  $con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
  $db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

		if( ! isset( $_REQUEST['action'] ) ) $_REQUEST['action'] =  "";
		if( $_REQUEST['action'] == "retrieveLink") {
		$_SESSION['S_BookID'] = $_REQUEST['BNO'];
		$BID[] = $_REQUEST['BNO'];
		}

		
		if ( ! isset($_REQUEST['Retrieve'] ) ) $_REQUEST['Retrieve'] = "";
		if ( $_REQUEST['Retrieve'] == "Retrive Selected Book" ) {
			$_SESSION['S_BookID'] = $_REQUEST['hideBook'];
			//echo $_REQUEST['hideBook'];
				$bk = $_REQUEST['hideBook'];
				$BID = explode(",",$bk);
				
				$testReg = ""; $z = 0 ; $testRegStatus = 1 ; $Reg_No = "";
				foreach($BID as $bno ){
				
					$sql = "SELECT Reg_No FROM Issue Where Book_No = '$bno'";
					
					$res = mysql_query($sql);
					while( $row = mysql_fetch_array($res) ){
					
						$Reg_No = $row['Reg_No'];
						
						if( $z == 0 ) 	{	$testReg = $Reg_No;	$z = 100;	}
											
					}
					
					if( $testReg != $Reg_No ) {	$testRegStatus = 0 ;	}
					

				}
				if( $testRegStatus == 0 ) {
					?> <script type="text/javascript"> alert("Error : The Selection is maid with different Candidates.\n Selection must be maid with same Candidate to Retrieve Book. "); </script>
					<h3 style="font:'Courier New'; color:#666666;"> Notification : Selection must be maid  for single user. Because we process to user account management for Retrieving the Book . </h3><a style="font:'Courier New'; color:#666666;" href="retrieving.php" > BACK </a> 
					 <?
			
				//include("retrieving.php");				
				
					exit(0);
				}

		}
		
				foreach($BID as $book ){ 	


$status = 0;   
  

		  
$sql = "SELECT * FROM issue WHERE Book_No = '$book'";
   
   $res = mysql_query($sql);
   	
if(mysql_affected_rows() == 0 )		{
		
		
		echo "<script type='text/javascript'> alert(' This Book ( ".$book." ) is not Issued '); </script> ";
		include("retrieving.php");
		exit(0);	
	}


$sql = " SELECT  * FROM  book_stack BS, book_List BL, issue I WHERE I.Book_No = '$book' AND I.Book_No =  BL.Book_No AND BL.Book_ID = BS.Book_ID ";

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
echo "<tr><td> Issued Date  : ".$row['Date_of_Issue']."</td><td>Return Date : ". $row['Return_Date']."</td></tr>";
echo "<tr><td colspan='2'><hr></td></tr>";
echo "<tr><td colspan='2'><br></td></tr>";
}

}

echo "<tr><td><br></td></tr>";
echo "<tr><td  colspan='2' style='color:#666666; font-family:Algerian, 'Arial Black'; font-size:40px;'><u>Candidate Inforamtion</u></td></tr>";
$sql = "SELECT  * FROM  registration Reg, issue I, branch B WHERE Book_No = '$book' AND I.Reg_No = Reg.Reg_No AND Reg.Course  = B.Branch_Code ";
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

?>


<form name="form1" action="retrieveprocess2.php" method="get">
<tr><td><br /><br /></td></tr>
<tr><td>Candidate Registration Number&nbsp;&nbsp;<input type="text" name="user_reg" size="20" maxlength="15" /> </td></tr>
<tr><td>Today Returing Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="Days">
<option value="DD">DD</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 31 ; i++ ){
if( i < 10 )  i = '0' + i ;
document.write("<option value="+i+">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Month">
<option value="MM">MM</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 12 ; i++ ) {
if( i < 10 )  i = '0' + i ;
document.write("<option value=\""+i+"\">"+i+"</option>");
}
</script>
</select>&nbsp;<select name="Year">
<option value="YYYY">YYYY</option>
<script type="text/javascript">
var i; 
for ( i = 1990 ; i <= 2050 ; i++ )
document.write("<option value="+i+">"+i+"</option>");
</script>
</select><br /><br /> 
If book is returning after return date. Fine is   <br /><br />  </td></tr>
<tr><td>Candidate Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="user_pass" size="20" maxlength="10" /></td></tr>
<tr><td>Librarian Password&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="lib" size="20" maxlength="10" /></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="I Accepted Book" />
<input type="reset" name="reset" value="Reset" /></td></tr>
</form>
</table>
<h1 style="color:#666666; font-family:Algerian, 'Arial Black'; font-size:36px;">hello</h1>

</body>
</html>
