// JavaScript Document



/*
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
			k++;
	}


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


if(Fname=="Enter Here") {
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
												if( !confirm(" All Details are Correct ? "))
														return false ; 
											}

document.write("<pre><center> <h1>Submited Details are as follows</h1> </center>");
document.write("\n\n<h3> Candidate Name : "+Fname);
document.write("\n\n Last Name : "+Lname);
document.write("\n\n Hobbies : ");
for( i = 0 ; i < Hobby.length ; i++ )
		document.write((i+1)+") "+Hobby[i]+"\t");
document.write("\n\n Gender : "+Gen);
document.write("\n\n Birth Date : "+dd+"-"+mm+"-"+yy);
document.write("\n\n Address : "+add);
document.write("\n\n PassWord : "+pass);
document.write("<h3></pre>");

}





function date()  {
mydate = new Date();
document.write(mydate.getDate()+" / "+mydate.getMonth()+8+" / "+mydate.getYear());
//document.write("<br>"+mydate.getHours()+" : "+mydate.getMinutes()+" : "+mydate.getSeconds());
}


function date2()  {
mydate = new Date();
var d = mydate.getDate()+" / "+mydate.getMonth()+" / "+mydate.getYear();
document.form1.date.value = mydate.getDate()+" / "+mydate.getMonth()+" / "+mydate.getYear() ;
//document.form1.time.value = mydate.getHours()+" : "+mydate.getMinutes()+" : "+mydate.getSeconds();
}
*/