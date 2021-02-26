<script type="text/javascript" src="mngAuth.js" >
</script>


<?		$con=mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		
		$db=mysql_select_db("my_library") or die (" Error : ".mysql_error() );

		$result = mysql_query(" SELECT  SSN, Password FROM lib_mnger ");   
		while ( $row = mysql_fetch_array($result) ) 	{  	
				$db_SSN = $row['SSN'];
				$db_pass = $row['Password']; 
			}

	
	echo "<script type='text/javascript'> var user='$db_SSN';  var pass='$db_pass'; </script> ";
	
?>


<body background="images/blue.jpg">
<form name="form1" >
<h2 style="font-family:'Courier New'; color:#666666; ">Authentication Process</h2>
<img src="images/lib.jpg" width="700" height="130" />
<br /><br /><Br /><br />
<img src="images/lib20.jpg" /><img src="images/imagesCAY3APZZ.jpg" height="160" /><img src="images/imagesCALF7EG6.jpg" height="160" /><img src="images/imagesCAMI03WG.jpg" width="200" height="160"  /><img src="images/lib12.png" width="150" height="130" style="position:absolute; top:270px; left:960px;"> 
<img src="images/imagesCAB2QMT1.jpg" style="position:absolute; top:60px; left:800px;" width="300" height="200"  />

<table cellpadding="2" style="position:absolute; top:130px; left:830px; font-family:Algerian, 'Arial Black'; color:#FF0000; ">
<tr><td>User UID </td><td><input type="text" name="ssn" size="15" maxlength="11"  /></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" size="15" maxlength="10"  /></td></tr>
</table>	


<table cellpadding="2" style="position:absolute; top:395px; left:980px;">
<tr align="center"><td><a href="mangfrm.php" target="_parent" onClick="return userAuthentication();"><img src="images/ok.jpg" border="0"></a></td><td><a href="frame.php" target="_parent"><img src="images/cancel.jpg" border="0"></a></td></tr>
</table>

</form>

</body>