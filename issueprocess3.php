<?

			session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<? 
$bk = $_SESSION['S_BookID'];
$BNo = explode(",",$bk);
//foreach ( $BNo as $var) echo "<br>$var";

$userReg = $_REQUEST['user_reg'];
$userPass = $_REQUEST['user_pass'];  // Read the all fields from the form 
$lib = $_REQUEST['lib'];


$DD1 = $_REQUEST['Days1'];
$MM1 = $_REQUEST['Month1'];
$YY1 = $_REQUEST['Year1'];

$DD2 = $_REQUEST['Days2'];
$MM2 = $_REQUEST['Month2'];
$YY2 = $_REQUEST['Year2'];


  $con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());

  $db=mysql_select_db("my_library")or die (" Error : ".mysql_error() );

  $sql = " SELECT Name, Password FROM registration WHERE Reg_No = '$userReg'";  //select the password of given register no using this statement

  $res = mysql_query($sql);
	if(mysql_affected_rows() == 0) {     				// if  mysql_affected_rows() == 0 means no row is selected for given register number
  		echo " You Have Enterd wrong Register Number";
		exit(0);
	}

   while($row = mysql_fetch_array($res))
 		{  
 				$db_pass_user = $row['Password'] ;
				$db_user = $row['Name'] ;
				      // read the password
		 }

	if( $db_pass_user != $userPass ) {   				// check the DataBase password with enterd password
			echo " You Have Entered Wrong Password of Candidate ";
			exit(0);
		}

  $sql = " SELECT Password FROM lib_mnger";     // once again read the librarian password from DataBase 
   
  $res = mysql_query($sql);	
   while($row = mysql_fetch_array($res))
 		{  
 				$db_pass_lib = $row['Password'] ;     // store pass in one variable
		 }
		 
		 
   if($lib != $db_pass_lib) {							// check entered pass with DB pass
  		echo " UnAuthorized Entry of Librarian";
		exit(0);
	}
	
	$list = array();
	



foreach ( $BNo as $_S_BNO)  {
		 
	$sql = "SELECT * FROM book_list WHERE Book_No = '$_S_BNO'";
   
   $res = mysql_query($sql);
   		
   while($row = mysql_fetch_array($res))
 		{  
 				$status = $row['Status'] ;
				$BNO = $row['Book_No'];
				$BID = $row['Book_ID'];
		 }
			
		
		if(  $status == 1 )
		 { 
		   echo " Already Book is Issued to some one else ";
		   exit(0);
		  }

		 
	 $sql2 = "UPDATE book_list SET Status = 1 WHERE Book_No = '$_S_BNO'";   //update the book status to 1
	 $res = mysql_query($sql2);

		 
	 if( ! $res ) {
	 		echo " Error : ".mysql_error();
			exit(0);
		}
		 

	 $sql3 = "UPDATE book_stack BS SET Issued_Books = Issued_Books + 1, Available_Books = Available_Books - 1 WHERE  BS.Book_ID = (SELECT Book_ID FROM Book_List BL WHERE BL.Book_No = '$_S_BNO')";   // update the stack detail two fields by using nested select statement 
		 $res = mysql_query($sql2);										// first select book id then using book id update the stack
		 											// please set the totla book num to number of book avalable in book list
	 if( ! mysql_query ( $sql3 ) ) {
	 		echo " Error : ".mysql_error();
			exit(0);
		}
			
		$DMY1 = $YY1."-".$MM1."-".$DD1;
		$DMY2 = $YY2."-".$MM2."-".$DD2;
		$sql3 = "INSERT INTO issue values ('$BNO','$userReg','$DMY1','$DMY2')";				//insert the neccessary data to issue details

		if( ! mysql_query( $sql3 )	)
		{
			echo " Error : ".mysql_error();
			exit(0);
		}
		$list[] = $BNO;	
	}		
	$str = "";
	foreach($list as $var ) 
	$str = $str." ".$var;
	echo "<script type='text/javascript'> alert( ' Book Issued Successfully.. To $db_user \\n $str\\n'); </script>";
	include("issueprocess.php");
		
?>


</body>
</html>
