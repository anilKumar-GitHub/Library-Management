<?
$_reg = sqlite_escape_string( $_REQUEST['regNo'] );
$_name = sqlite_escape_string( $_REQUEST['cname'] );
$_fName = sqlite_escape_string( $_REQUEST['fname'] );
$_Gen = $_REQUEST['Gender'];
$_date = $_REQUEST['Year']."-".$_REQUEST['Month']."-".$_REQUEST['Days'];
$_Add = sqlite_escape_string( $_REQUEST['ADD1'] )." ".sqlite_escape_string( $_REQUEST['ADD2'] );
$_phNo = sqlite_escape_string( $_REQUEST['phno'] );
$_resNo = sqlite_escape_string( $_REQUEST['res_no'] );
$_mail = sqlite_escape_string( $_REQUEST['email'] );
$_clg = sqlite_escape_string( $_REQUEST['clg'] );
$_clg_add = sqlite_escape_string( $_REQUEST['clg_add1'] )." ".sqlite_escape_string( $_REQUEST['clg_add2'] );
$_sem = $_REQUEST['Semester'];
$_brnch = $_REQUEST['Branch'];
$_SQ =  $_REQUEST['Que'];
$_Ans = sqlite_escape_string( $_REQUEST['Answer'] );
$_pass = sqlite_escape_string( $_REQUEST['pass1'] );


					  $sql = " SELECT Reg_No, Name FROM Registration WHERE Reg_No = '$_reg'";
					  $res = mysql_query( $sql );
					   
					  if(! mysql_affected_rows() == 0 ) 
					  {
					  while($row = mysql_fetch_array($res) ) {
					  $reg = $row['Reg_No'];
					  $name = $row['Name'];
					  }  ?>
					  
					 <script type="text/javascript"> alert(" This Record Related to <? echo"$name [ $reg ] is Already Exist."; ?>");</script>
					  
					   <? }
					   
					  else { 

							$sql = "INSERT INTO Registration VALUES('$_reg','$_name','$_fName','$_Gen','$_date','$_Add','$_mail','$_phNo','$_resNo','$_SQ','$_Ans','$_clg','$_clg_add','$_sem','$_brnch','$_pass')";


					  $res = mysql_query($sql);
					  if( $res ) {
					  echo "<script type='text/javascript'> alert(' The Record Inserted SuccessFully...\\nRegister No :  $_reg \\nCendidate Name : $_name $_fName \\nGender : $_Gen \\nBirth Date : $_date \\nAddress : $_Add \\nE-mail ID : $_mail \\nPhone No. : $_phNo \\nResidancial No. : $_resNo \\nYour Answer : $_Ans \\nCollage : $_clg \\nClg Address :$_clg_add \\nSemester : $_sem \\nBranch : $_brnch \\nPassWord : $_pass \\n\\n\\n DataBase Updated Successfully...'); </script> ";
					  }else {
					  $er = mysql_error();
					  echo "<script type='text/javascript'> alert(' This Record Already Exist. \\n The Duplicate Entry Is Not Possible. Check For Syntax While Intering	 Information.  '); </script> ";
					  echo "<br><Br> NO  $er";
					  }
					
					  }



?>
