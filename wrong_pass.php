

<html>
<head> <title> Library Management </title>
</head>
<body bgcolor="lawngreen">
<pre>
<form name="loginForm" method="post" action="Lib_mngment.php">

<img src="images/lib_img.JPG"  height="205" width="1345" style="position:absolute; top:0px; left:0px;">
<img src="images/STEPNY_COVER.jpg" height="200" width="500" style="position:absolute; top:350px; left:10px;" onMouseOver="document.images[1].src= 'images/AU_SUNPACK.jpg'" onMouseOut="document.images[1].src = 'images/STEPNY_COVER.jpg'">
<h1 style="font-size:100px; color:green; font-family:Lucida Handwriting;" style="position:absolute; top:200px; left:0px;"> Management </h1>
<table bgcolor="chartreuse" border="10" cellpading="1" cellspacing="0" bordercolor="red" width="30%" style="position:absolute; top:200px; left:950px;">
<tr><td></td></tr>
<tr bgcolor="Black" > <td align="center" style="color:white; face:Courier New; font-size:25;"> Log-in Into Account  </td>
</tr>
<tr><td></td></tr>
<tr style="color:BLACK; face:Courier New; font-size:20;"> <td><br> User UID  &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="user" size="25" maxlength="24"  value="<?=$_SESSION['S_user']?>" ><br>
  Password    &nbsp;&nbsp;&nbsp;&nbsp;   <input type="password" name="pass" size="25" maxlength="10" >
</br><p align="center"><input type="submit" name="submit"  value="	Submit	        "   onClick="return validation_fun()"   >
</br>
<a href="forget_pass.php" title="find your password">Forget Password</br>
you can remember your password</br> </a>Wel-Come 2 Our Library<br> <font color="Red"> UnAuthorised Aceess. Acess Denied.<br>Re-Try Again...</font></td></tr></p>
</table>
<hr size="10" color="red" style="position:absolute; top:200px; left:0px;">
<hr color="bluevoilet" width="60%" style="position:absolute; top:600px; left:240px;">
<hr color="bluevoilet" width="60%" style="position:absolute; top:605px; left:240px;">
<table width="50%"  style="position:absolute; top:605px; left:320px;">
<tr align="Center"><td><h2> <a href="#">Brougth to you</a> </h2></td> </tr>
<tr align="Center"><td><h3> Govt. Polytechnic Afzalpur Gulbarga </h3></td></tr>
<tr align="Center"><td><h3>The acadamic year of 2010-2013, students of Govt. Polytechnic Afzalpur <br>
has been construbuted for the developement Final year project.<br>
They delievered hole package of Library Management kit.</h3></td></tr>
<tr align="Center"><td> <h3> Technical Support By...<br> Ganesh, Basavaraj, Praveen and GunduRao</h3></td></tr>
</table>

<hr color="red" style="position:absolute; top:770px; left:0px;">
<pre>

</body>
</html>


<script type="text/javascript">

function fun() {
alert("UnAuthourised Access \n Access Denied. \n Re-Try Again ");
}

function validation_fun() {

		if( document.loginForm.user.value=="" && document.loginForm.pass.value=="" )
				{
						alert(" Enter User Name and Password : ");
						return false;
				} else if( document.loginForm.user.value=="" )
				{
						alert(" Enter User Name : ");
						return false;
				}else if( document.loginForm.pass.value=="" )
				{
						alert(" Enter Password : ");
						return false;
				}else
					return true;				
	}
</script>
