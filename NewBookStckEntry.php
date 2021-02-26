<script type="text/javascript">
function date()  {
mydate = new Date();
document.write("<font color='#999999' size='+2'>"+mydate.getDate()+" / "+mydate.getMonth()+" / "+mydate.getYear()+"</font>");
}



function validate()  {

var dom = document.form1;

	if( dom.Title.value == "" )   {
		alert(" Enter the Book Name : ");
		return false;  
	}else if(dom.Author.value == "" ) {
		alert(" Enter the Author Name : ");
		return false;  
	}else if(dom.Publisher.value == "" ) {
		alert(" Enter the Publisher Detail : ");
		return false;  
	}else if(dom.EDITION.value == "SELECT" ) {
		alert(" Select Edition of Book : ");
		return false;  
	}else if(dom.branch.value == "SELECT" ) {
		alert(" Select to which Department book belongs  : ");
		return false;  
	}else if(dom.Price.value == "" ) {
		alert(" Enter the price in Rupees...  : ");
		return false;  
	}

	return true;
}
</script>


<body background="images/blue.jpg" onLoad="fun();"><br /><br><br>


<?

$con = mysql_connect( "localhost","root", "" );
if ( !$con ) {
echo " \n ERROR : ".mysql_error();   }

$DB = mysql_select_db ( "my_library", $con );
if ( !$DB ) {
echo "\n ERROR : ".mysql_error();  }
		
$result = mysql_query(" SELECT  * FROM edition");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$EDTN[$row['NUM']] = $row['ALPHA'] ;  }

$result = mysql_query(" SELECT * FROM branch");   
while ( $row = mysql_fetch_array($result) ) 	{ 
		$Brnch[$row['Branch_Code']] = $row['Branch_Name'] ;  }
 
?>


<?
if ( !isset($_REQUEST['New_Catagory']))   $_REQUEST['New_Catagory'] = "";
if( $_REQUEST['New_Catagory'] == "Create New Group" ) {

			$_title = sqlite_escape_string($_REQUEST['Title']);
			$_author = sqlite_escape_string($_REQUEST['Author']);
			$_pub = sqlite_escape_string($_REQUEST['Publisher']);
			$_prc = sqlite_escape_string($_REQUEST['Price']);
			$_dept = $_REQUEST['branch'];
			$_edit = $_REQUEST['EDITION'];
			
#			echo "$_title $_author $_pub $_prc $_dept $_edit";
			
			$sql = "SELECT * FROM book_stack WHERE Title = '$_title' AND Author = '$_author' AND Edition = '$_edit' AND Department = '$_dept' AND Publisher = '$_pub' AND Price = '$_prc'";      			

		$res = mysql_query( $sql );    # run the command 

	if(! mysql_affected_rows() == 0 ) {   # test if there is no book is available for given set of inputs then no row is selecte i,e 						 											mysql_affected_rows() == 0. Then print below message 
			echo" <script type='text/javascript'> alert('\\nThis Book Catagory Record is already Available \\n\\n Title : $_title \\n Author : $_author \\n Edition : $_edit \\n Department : $_dept \\n Publisher : $_pub \\n Price : $_prc \\n\\n Note : You can use this existing catagery.\\n\\n Otherwise you have entered wrong information, verify that first.\\n\\n To created new catagory each information must be unique and there is       no existing copy. '); </script>  ";
	
		} else {
		
	        $Alphabets = array(0=>'A',1=>'B',2=>'C',3=>'D',4=>'E',5=>'H',6=>'I',7=>'K',8=>'O',9=>'M',10=>'N',11=>'S',12=>'R',13=>'T',14=>'U',15=>'W',16=>'X',17=>'Z',18=>'0',19=>'1',20=>'2',21=>'3',22=>'4',23=>'5',24=>'6',25=>'7',26=>'8',27=>'9');
		
			$flag = 0 ;
			while( $flag == 0 )  {

						  $ch ="";
						for( $j = 0 ; $j < 14; $j++ )	{
							 	$c = rand(0,27);
								$ch = $ch.$Alphabets[$c];
							}
					$ID = $ch ;
					
#					  echo"   $ID";
					   //$ID = "CS12001B5";
					  $sql = " SELECT * FROM book_stack WHERE Book_ID = '$ID'";
					  $res = mysql_query( $sql );
					   
					  if( mysql_affected_rows() == 0 )   $flag = 1 ;
					  else 								 $flag = 0 ;
			}
			
			
			
		$sql = "INSERT INTO book_stack VALUES ('$ID','$_title','$_author','$_pub',$_edit,'$_dept',$_prc,0,0,0)";
		
		if ( mysql_query( $sql ) ){
		
				echo " <script type='text/javascript'> alert('\\nBook Records has been Generated... \\n\\n Book ID : $ID \\n\\n Title : $_title \\n\\n Author : $_author \\n\\n Edition : $_edit \\n\\n Department : $_dept \\n\\n Publisher : $_pub \\n\\n Price : $_prc \\n\\n Tottal books : 0\\n\\n Issued Books : 0\\n\\n Availabel Books : 0 \\n\\n Note : This is the base record for this catagory books.\\n\\n The details of books send successfully to Server. '); </script>  ";
#				echo "ok";
			}
				
			else echo "Error : ".mysql_error();
 								 
					  
		
}
	}



?>


<form name="form1" action="NewBookStckEntry.php" method="post">
<table cellpadding="0" cellpadding="5" border="0" bordercolor="#000000" width="100%" style="font-size:20px; color:#0000FF;"  >
<!--<tr><td>&nbsp;</td><td>First</td><td>second</td><td>Third</td><td>Fifth</td></tr>-->

<tr><td><? for($i = 0 ; $i < 10 ; $i++ ) echo "&nbsp;"; ?></td><td colspan="2">Book Name &nbsp;&nbsp; <input type="text" name="Title" size="40" maxlength="39" /></td><td align="right"><script type="text/javascript" > date(); </script></td></tr>
<tr><td><br></td></tr>
<tr><td></td><td>Author Name&nbsp;&nbsp;<input type="text" name="Author" size="40" maxlength="49" /></td><td>Edition&nbsp;&nbsp;<select name="EDITION" ><option value="SELECT">SELECT</option><? ksort($EDTN); foreach($EDTN as $key => $var ) echo "<option value='$key'>$var</option>"; ?></select>&nbsp;&nbsp;<a href="newEdition.php"><font color="#666666">New</font></a></td></tr>
<tr><td><br></td></tr><tr><td><br></td></tr>
<tr><td></td><td>Department &nbsp;&nbsp;&nbsp;&nbsp;<select name="branch" ><option value="SELECT">SELECT</option><? asort($Brnch); foreach($Brnch as $key => $var ) echo "<option value='$key'>$var</option>"; ?></select>&nbsp;&nbsp;<a href="newBranch.php"><font color="#666666">New</font></a></td><td>Publisher&nbsp;&nbsp;<input type="text" name="Publisher" size="40" maxlength="49" /></select></td>
<td>Price Rs.&nbsp;&nbsp;&nbsp;<input type="text" name="Price" size="5" maxlength="6" style="text-align:right;" />Only/-</td></tr>
<tr><td><br></td></tr>
<tr><td><br></td></tr><tr><td colspan="2"><br></td><td align="right"><input type="submit" name="New_Catagory" value="Create New Group" onClick="return validate();"></td><td align="left"><input type="reset" name="reset" value="Re-Set" ></td></tr>
<tr><td colspan="4" background="images/blue.jpg"><h4><font color="#FF0000"> <b>Note </b>:</font> <font color="#0000FF" face="Courier New"> For new branch or edition please enter those entries in DataBase before use those fields.</font></h4></td></tr>
</table>
</form>


</body>