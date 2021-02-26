<html>
<head>
<title>example for form</title>
<script type="text/javascript" >

function validation()  {

var dom = document.form1 ;
var Fname = dom.Fname.value ;
var Lname = dom.Lname.value ;
var i,k = 0, CHcnt = 0, RDcnt = 0 ;
Hobby = new Array();  //alert(Hobby.toString()); it works
var Gen;
for( i = 0 ; i < dom.cbox.length; i++ )
		if ( dom.cbox[i].checked ){  
			Hobby[k] = dom.cbox[i].value ;
			CHcnt++;
			//alert("Array   "+ Hobby[k]);
			k++;
	}

dom.hobbi.value = Hobby.toString();
//alert("String  : " +Hobby);
for( i = 0 ; i < dom.RD.length; i++ )
			if ( dom.RD[i].checked ){  
			Gen = dom.RD[i].value ;
			RDcnt++;
		}

var add = dom.add.value ;
var pass = dom.pass.value ;
var dd = dom.Days.value;
var mm = dom.Month.value;	
var yy = dom.Year.value;


if(Fname=="Enter Here" || Fname == "" ) {
	alert("Enter your Name : ");
	return false;
}else if (Lname=="")
	{ 
		alert("Enter your Last Name : ");
		return false;
	}else if(CHcnt == 0) {
		alert("Select you hobbis : ");
		return false;
			}else if (RDcnt == 0)
					{ 
					alert("Select you Gender : ");
					return false;
				}else if (dd == "DD" || mm == "MM" || yy == "YYYY" )
					{
						alert(" Enter Date of Birth : ");
						return false;
					}else if(add == "" )
					 	{
							alert(" Enter Address : ");
							return false;
							}else if(pass == "")
							 	{ 
									alert(" Enter password : ");
									return false;
									} else { 
												if( !confirm(" All Details are Correct ?\n Form Can be Submitted ? "))
														return false ; 
												else return true;
											}

}
	
</script>
<link type="text/css" rel="stylesheet" href="css1.css">
</head>
<body>
<div class="hello"> Registration Form </div>

<table cellpadding="5">
<tr><td><a href="#">Home</a></td>
<td><a href="#">Cantect</a></td>
<td><a href="#">Registration</a></td>
<td><a href="#">Timeline</a></td>
<td><a href="#">Email</a></td>
</tr>
</table>
<form name="form1" action="subprocess.php" method="get"> 
<table border="0" cellpadding="5" cellspacing="10" align="center">
<tr size="50">
<td colspan="2" align="left"><h1>Registration form</h1></td>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="Fname" value="Enter Here"></td></tr>
<tr>
<td>Last Nmae:</td>
<td><input type="text" name="Lname"></<td>
</tr>
<tr>
<td>Hobies</td>
<td><input type="checkbox" name="cbox" value="Readaing Books">Reading Books
<input type="checkbox" name="cbox" value="Playing Cricket">Playing Cricket
<input type="checkbox" name="cbox" value="Watchinh TV" checked="checked">Watchinh TV<BR>
<input type="checkbox" name="cbox" value="Singing and Dancing" >Singing and Dancing
<input type="checkbox" name="cbox" value="Racing and Crashing" >Racing and Crashing
</td>
</tr>
<tr><td>Gender</td>
<td><input type="radio" name="RD" value="Male" checked="checked">Male 
<input type="radio" name="RD" value="Female">Female</td>
</tr>
<tr>
<td>Date of Birth:</td>
<td>
<select name="Days">
<option value="DD">DD</option>
<script type="text/javascript">
var i; 
for ( i = 1 ; i <= 31 ; i++ ){
if( i < 10 )  i = '0' + i ;
document.write("<option value="+i+">"+i+"</option>");
}
</script>
</select>

<select name="Month">
<option value="MM">MMM</option>
<script type="text/javascript">
var i;
mon = new Array("JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
for ( i = 1,k = 0 ; i <= 12, k < 12 ; i++, k++ ) {
if( i < 10 )  i = '0' + i ;
document.write("<option value=\""+i+"\">"+mon[k]+"</option>");
}
</script>
</select>

<select name="Year">
<option value="YYYY">YYYY</option>
<script type="text/javascript">
var i; 
for ( i = 1947 ; i <= 2025 ; i++ )
document.write("<option value="+i+">"+i+"</option>");
</script>
</select>
</<td>
</tr>
<tr><td>Address:</td>
<td><TEXTAREA name="add" rows="3" cols="30"></TEXTAREA></td></tr>
<tr><td>Password </td><td><input type="password" name="pass" size="20" ></td></tr>
<tr><td><input type="submit" name="submit" value="Submit Form" onClick="return validation();"></td><td><input type="reset" name="reset" value="ReSet Form"></td></tr> 
</table> 
<input type="hidden" name="hobbi" >
</form>

<form name="form2" action="subdisplay.php" method="post">

<input type="submit" value="Display" >
</form>

</body>
<html>
