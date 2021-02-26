<? 

		session_start();
		$t = $_SESSION['S_BookID'];
		
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body text="#0000FF" background="images/blue.jpg">

<?

$userReg = $_REQUEST['user_reg'];
$userPass = $_REQUEST['user_pass'];  // Read the all fields from the form 
$lib = $_REQUEST['lib'];


$DD1 = $_REQUEST['Days'];
$MM1 = $_REQUEST['Month'];
$YY1 = $_REQUEST['Year'];
$Date = $YY1."-".$MM1."-".$DD1;


  $con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
  $db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );
  
  $sql = " SELECT Password FROM registration WHERE Reg_No = '$userReg'";  //select the password of given register no using this statement
  
  $res = mysql_query($sql);
	if(mysql_affected_rows() == 0) {     				// if  mysql_affected_rows() == 0 means no row is selected for given register number
// 		echo "You Have Enterd wrong Register Number";
	 	echo " <script type='text/javascript'> alert('You Have Enterd wrong Register Number'); </script>  ";
		exit(0);
	}

   while($row = mysql_fetch_array($res))
 		{  
 				$db_pass_user = $row['Password'] ;      // read the password
		 }


	if( $db_pass_user != $userPass ) {   				// check the DataBase password with enterd password
//			echo " You Have Entered Wrong Password ";
		 	echo " <script type='text/javascript'> alert('You Have Entered Wrong Password'); </script>  ";
			exit(0);
		}


  $sql = " SELECT Password FROM lib_mnger";     // once again read the librarian password from DataBase 
   
  $res = mysql_query($sql);	
   while($row = mysql_fetch_array($res))
 		{  
 				$db_pass_lib = $row['Password'] ;     // store pass in one variable
		 }
		 
		 
   if($lib != $db_pass_lib) {							// check entered pass with DB pass
//  	echo " UnAuthorized Entry of Librarian";
	 	echo " <script type='text/javascript'> alert(' UnAuthorized Entry of Librarian'); </script>  ";
		exit(0);
	}

$BID = explode(",",$_SESSION['S_BookID']);
foreach ( $BID as $book){

	$sql = "SELECT * FROM issue WHERE Book_No = '$book'";
   
   $res = mysql_query($sql);
   	
   while($row = mysql_fetch_array($res))
	 		{  
 				$BNo = $row['Book_No'] ;
				$RegNo = $row['Reg_No'];
				$Issue = $row['Date_of_Issue'];
				$Return = $row['Return_Date'];
		 }
//	echo "$BNo    $RegNo    $Issue    $Return ";
		 
		 
	$sql = "INSERT INTO Old_Transaction values ('$BNo','$RegNo','$Issue','$Date')";
	if(! mysql_query($sql ) )
	{  
	 	echo " <script type='text/javascript'> alert(' Book is Already Retrieved By Library... '); </script>  ";
		include("retrieving.php");
		exit(0);
	}
	mysql_query("DELETE FROM ISSUE WHERE Book_No = '$BNo'");
	if(! mysql_query( " UPDATE book_list SET Status = 0 WHERE Book_No = '$book'"))
	{
			echo "Error : ".mysql_error() ;
			exit(0);
		}
		 $sql2 = "UPDATE book_stack BS SET Issued_Books = Issued_Books -1, Available_Books = Available_Books + 1 WHERE  BS.Book_ID = (SELECT Book_ID FROM Book_List BL WHERE BL.Book_No = '$book')";   // update the stack detail two fields by using nested select statement 
		 $res = mysql_query($sql2);										// first select book id then using book id update the stack

}
?>

<script type="text/javascript">  alert("Book Retrived");
</script>
<?  include("retrieving.php");  ?>

</body>
</html>
