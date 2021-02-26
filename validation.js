
function validation()  {

var dom = document.form1 ;
var len = document.form1.books.length;
//alert("Length : "+len);
var i , cnt = 0 , k = 0 ; ;
BK = new Array();

for( i = 0 ; i < dom.books.length; i++ )
		if ( dom.books[i].checked ){  
			BK[k] = dom.books[i].value ;
			cnt++;
			k++;
	}
	if(cnt == 0) {
		alert("No Book Are Selected : ");
		return false;
	}
	
 dom.hideBook.value = BK.toString();
return true;
}




function funDate (start, end) {
var i; 
for ( i = start ; i <= end ; i++ ){
if( i < 10 )  i = '0' + i ;
document.write("<option value="+i+">"+i+"</option>");
}

}



function date()  {
mydate = new Date();
document.write("<font color='#999999' size='+2'>"+mydate.getDate()+" / "+mydate.getMonth()+" / "+mydate.getYear()+"</font>");
}

