<?
		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error());

		$db_pass = ""; $Q_No = ""; $ans = "";
		if( ! isset( $_REQUEST['Submit'] ) ) 	$_REQUEST['Submit'] = "";
		if( $_REQUEST['Submit'] == "Get Password" 	) {
			
					$reg = $_REQUEST['reg_no'];
				  $sql = " SELECT * FROM lib_mnger WHERE  SSN='$reg'"; // once again read the librarian password from DataBase 

				    $res = mysql_query($sql);	
					if( $res ) {
 				   while($row = mysql_fetch_array($res))
			 		{  echo "lib";
						$db_pass = $row['Password'] ;
						$Q_No = $row['Security_Q'];
						$ans = $row['Ans'];
					}
				}
		if(mysql_affected_rows() == 0)  {	
				  $sql = "SELECT * FROM registration WHERE Reg_No='$reg'";
				    $res = mysql_query($sql);	
					if( $res ) {
 				   while($row = mysql_fetch_array($res))
			 		{  
						$db_pass = $row['Password'] ;     // store pass in one variable
						$Q_No = $row['Security_Q'];
						$ans = $row['Ans'];
					}
					}
			}
			
		if(mysql_affected_rows() == 0)  { echo " <script type='text/javascript'> alert('You Have Enterd wrong Identification Number'); </script>  ";  }
		
		
		if( $_REQUEST['Sec_Q'] == $Q_No  && $_REQUEST['ans'] == $ans ){
		echo " <script type='text/javascript'> alert('Note Down Following Password \\n\\n\\n Password = $db_pass'); </script>  ";  
		}else {
		echo " <script type='text/javascript'> alert('You Have Enterd wrong Security Question and Answer'); </script>  ";  

		}
		}

?>

<html>
<head> <title> Library Management </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body bgcolor="#FFFFFF" background="images/blue.jpg">

<div align="left">
  <h1 align="center">&nbsp;</h1>
  <h1 align="center"><font color="#000000" face="Algerian, Arial Black"><strong><em><font color="#666666">Remember Password</font></em></strong></font></h1>
  <h2 align="center"><font color="#000000" face="Algerian, Arial Black"><font color="#666666">Boost up Memory</font></font><font color="#000000" face="Courier New"> <br>
    </font></h2>
  <h4 align="center"><font color="#000000"><font face="Algerian, Arial Black"><font size="3">
    <label></label>
  </font></font></font></h4>
  <form name="form1" method="post" action="forget_pass.php">
    <div align="center">
      <label></label>
      <table width="837" border="0" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="333"><em><font color="#000000"><font face="Algerian, Arial Black"><font size="3"><font size="5" face="Courier New">UID or Register Number</font></font></font></font></em></td>
          <td width="464"><input name="reg_no" type="text" size="20"></td>
        </tr>
        <tr>
          <td><em><font color="#000000" size="5">Security Question 
                <label></label>
          </font></em></td>
          <td><font color="#000000" size="5"><font size="4">
            <select name="Sec_Q">
              <option value="SELECT">SELECT</option>
            <? 
				$status = "";
				$res = mysql_query("SELECT *FROM questions");
				while($Q = mysql_fetch_array($res)){
				if( $Q['Num'] == $row['Security_Q'] ) $status = "SELECTED";
					echo "<option value='".$Q['Num']."' $status> ".$Q['Question'].".</option>";
						$status = "";
				}
?>
			</select>
          </font></font></td>
        </tr>
        <tr>
          <td><em><font color="#000000" size="5">Security Answer</font></em></td>
          <td><input name="ans" type="text" value="" size="40" maxlength="30"></td>
        </tr>
        <tr>
          <td colspan="2"><em>
            <label>
            <div align="center">
              <input type="submit" name="Submit" value="Get Password">
            </div>
        </label>        </tr>
      </table>
      <label></label>
      <p><font color="#000000" size="5">
        <label></label>
      </font></p>
      </div>
  </form>

</body>
</html>