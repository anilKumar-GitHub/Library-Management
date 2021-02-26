<html>
<head> <title>Online Library  Library Management </title>
</head>
<body  bgcolor="white" link="#FF0000" vlink="#00FF00" alink="#00FF00">  <!--  bgcolor="lawngreen"  background="images/background3.jpg"-->
<form name="loginForm" method="post" action="Lib_mngment.php">
<!-- <img src="images/lib_img.JPG"  height="205" width="1345" style="position:absolute; top:0px; left:0px;">  -->
<table  cellpadding="0" cellspacing="10" background="images/background2.jpg" width="101.5%" style="position:absolute; top:0px; left:0px; text-align:center;">
<tr><td> <b style="font-size:100px; color:black; font-family:Algerian;"><i> LIBRARY MANAGEMENT </i></b> </td></tr></table>

<img src="images/library.jpg" height="400" width="650" style="position:absolute; top:130px; left:0px;" onMouseOver="document.images[0].src= 'images/imagesCA6YV8F0.jpg'" onMouseOut="document.images[0].src = 'images/library.jpg'">
<img src="images/imagesCALD2AD6.JPG"  height="400" width="300" style="position:absolute; top:135px; left:650px;">
<img src="images/imagesCALAO92G.JPG"  height="125" width="395" style="position:absolute; top:410px; left:950px;">
<!--<h1 style="font-size:100px; color:black; font-family:Lucida Handwriting;" style="position:absolute; top:200px; left:0px;"> Management </h1> -->
<hr size="10" color="#99FFFF" style="position:absolute; top:130px; left:0px;">
<table background="images/background.jpg" border="10" cellpading="1" cellspacing="0" bordercolor="#99FFFF" width="30%" style="position:absolute; top:130px; left:950px;">
<tr><td></td></tr>
<tr bgcolor="Black" > <td align="center" style="color:white; face:Courier New; font-size:25;"> Log-in Into Account  </td>
</tr>
<tr><td></td></tr>
<tr style="color:#FFFFFF; face:Courier New; font-size:20;"> <td><br> User UID  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="user" size="25" maxlength="24" value="<?=$_SESSION['S_user'];?>" ><br>
  Password    &nbsp;&nbsp;&nbsp;&nbsp;   <input type="password" name="pass" size="25" maxlength="10" >
</br><p align="center"><input type="submit" name="submit"  value="	Submit	        "   onClick="return validation_fun()"   >
</br><font color="#00FF00">
<a href="forget_pass.php" title="find your password">Forget Password</br>
you can remember your password</br> </a><font color="#0000FF">Wel-Come 2 Our Library </font><br><font color="#FFFFFF" size="+2"><u><i>UnAuthorised Aceess. Acess Denied.<br>Re-Try Again...</i></u></font></td></tr></p>
</table>


<hr color="bluevoilet" width="60%" style="position:absolute; top:550px; left:240px;">
<hr color="bluevoilet" width="60%" style="position:absolute; top:555px; left:240px;">
<table width="50%"  style="position:absolute; top:555px; left:320px;">
<tr align="Center"><td><h3> <a href="#"><font color="#0000FF">Brougth to you</font></a> </h3></td> </tr>
<tr align="Center"><td><h3> Govt. Polytechnic Afzalpur Gulbarga </h3></td></tr>
<tr align="Center"><td><h3>The acadamic year of 2010-2013, students of Govt. Polytechnic Afzalpur <br>
has been construbuted for the developement Final year project.<br>
They delievered hole package of Library Management kit.</h3></td></tr>
<tr align="Center"><td> <h3> Technical Support By...<br> Ganesh, Basavaraj, Praveen and GunduRao</h3></td></tr>
</table>
<table cellpadding="5" style="position:absolute;top:520px; left:235px; font-size:18px; font-family:'Courier New'; font:bold; text-decoration:none;" >
<tr><td><a href="subFrame1.php" style="color:#333333;">Book Portal</a></td><td><a href="subFrame2.php" style="color:#333333;">Registration Request</a></td></tr></table>

<hr color="red" style="position:absolute; top:720px; left:0px;"> 
<table cellpadding="5" style="position:absolute;top:520px; left:235px; font-size:18px; font-family:'Courier New'; font:bold; text-decoration:none;" >
<tr><td><a href="subFrame1.php" style="color:#333333;">Book Portal</a></td><td><a href="subFrame2.php" style="color:#333333;">Registration Request</a></td></tr></table>

<img src="images/imagesCALF7EG6.jpg" width="20%" height="25%" style="position:absolute; top:570px; left:0px;">
<img src="images/imagesCAMI03WG.jpg" width="30%" height="25%" style="position:absolute; top:570px; left:940px;">

</body>
</html>


<script type="text/javascript">

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
