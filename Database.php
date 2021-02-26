

<?php 

		$con = mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
		

		$sql = "CREATE DATABASE my_library";


		if( ! mysql_query($sql) ) { 
			echo "Error : ".mysql_error();
			exit(0);
		} 

		
	$db = mysql_select_db("my_library") or die (" Error : ".mysql_error() );


$sql = "CREATE TABLE Branch (\n"
    . "Branch_Code varchar(6) NOT NULL,\n"
    . "Branch_Name varchar(50) NOT NULL,\n"
    . "PRIMARY KEY (Branch_Code),\n"
    . "UNIQUE(Branch_Name))";

if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Branch</td><td>Successful</td></tr>";
}
else{# echo "<tr><td>01</td><td>Branch</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 
 	
 
 
 
$sql = "CREATE TABLE Edition(\n"
    . "NUM int NOT NULL PRIMARY KEY,\n"
    . "ALPHA varchar(20) NOT NULL)";

if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Edition</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Edition</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 


	
$sql = "CREATE TABLE Questions(\n"
    . "Num int Primary Key,\n"
    . "Question varchar(50) NOT NULL)\n"
    . "";

if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Question</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Question</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
} 




$sql = "CREATE TABLE Book_Stack(\n"
    . "Book_ID varchar(15) NOT NULL,\n"
    . "Title varchar(40) NOT NULL,\n"
    . "Author varchar(50) NOT NULL, \n"
    . "Publisher varchar(30) NOT NULL,\n"
    . "Edition int NOT NULL,\n"
    . "Department varchar(6) NOT NULL,\n"
    . "Price Decimal(10,2) NOT NULL,\n"
    . "Total_Books int,\n"
    . "Issued_Books int,\n"
    . "Available_Books int,\n"
    . "PRIMARY KEY(Book_ID, Title, Author, Edition),\n"
    . "FOREIGN KEY(Department) REFERENCES Branch (Branch_Code),\n"
    . "FOREIGN KEY(Edition) REFERENCES Edition (NUM))";
	
if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Book_Stack</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Book_Stack</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}



$sql = "CREATE TABLE Book_list(\n"
    . "ISBN varchar(20),\n"
    . "Book_ID varchar(15) NOT NULL,\n"
    . "Book_No varchar(15) PRIMARY KEY,\n"
    . "Status int NOT NULL,\n"
    . "FOREIGN KEY(Book_ID) REFERENCES Book_Stack(Book_ID))";
if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Book_list</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Book_list</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}


$sql="CREATE TABLE Registration( Reg_No  varchar(15) NOT NULL, Name  varchar(50) NOT NULL,Fname  varchar(60) NOT NULL,Gender  varchar(6) NOT NULL,DOB  Date NOT NULL,Address  varchar(150) NOT NULL,email  varchar(50) NOT NULL,Ph_No  varchar(18) NOT NULL,Residancial_No  varchar(18) NOT NULL,Security_Q  int NOT NULL,Ans  varchar(40) NOT NULL,Clg_Name  varchar(100),Clg_Add  varchar(150),Sem  varchar(30),Course  varchar(6),  Password  varchar(15) NOT NULL,PRIMARY KEY(Reg_No),FOREIGN KEY(Course) REFERENCES branch(Branch_Code))";


if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Registration</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Registration</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}





$sql = "CREATE TABLE Issue(\n"
    . "Book_No varchar(15) PRIMARY KEY,\n"
    . "Reg_No varchar(15) NOT NULL,\n"
    . "Date_of_Issue DATE NOT NULL,\n"
    . "Return_Date DATE NOT NULL,\n"
    . "FOREIGN KEY(Book_No) REFERENCES Book_list(Book_No),\n"
    . "FOREIGN KEY(Reg_No) REFERENCES registration(Reg_No))\n"
    . "";

if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Issue</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Issue</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}



$sql ="CREATE TABLE Old_Transaction(\n"
    . "Book_No varchar(15) NOT NULL,\n"
    . "Reg_No varchar(15) NOT NULL,\n"
    . "Issued_Date DATE NOT NULL,\n"
    . "Return_Date DATE NOT NULL,\n"
    . "PRIMARY KEY(Book_No, Reg_No, Issued_Date,Return_Date),\n"
    . "FOREIGN KEY(Book_No) REFERENCES Book_list(Book_No),\n"
    . "FOREIGN KEY(Reg_No) REFERENCES registration(Reg_No))\n"
    . "";
	
if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>Old_Transaction</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>Old_Transaction</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}



$sql = "CREATE TABLE lib_mnger(\n"
    . "SSN varchar(15) NOT NULL,\n"
    . "Name varchar(50) NOT NULL,\n"
    . "Fname varchar(60) NOT NULL,\n"
    . "Gender varchar(6) NOT NULL,\n"
    . "DOB Date NOT NULL,\n"
    . "Address varchar(150) NOT NULL,\n"
    . "email varchar(50) NOT NULL,\n"
    . "Ph_No varchar(18) NOT NULL,\n"
    . "Residancial_No varchar(18) NOT NULL,\n"
    . "Security_Q INT NOT NULL,\n"
    . "Ans varchar(40) NOT NULL,\n"
    . "Password varchar(15) NOT NULL,\n"
    . "PRIMARY KEY(SSN))";
	
if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>lib_mnger</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>lib_mnger</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}



$sql = "CREATE TABLE RegistrationRequest(Reg_No  varchar(15) NOT NULL,Name  varchar(50) NOT NULL,Fname  varchar(60) NOT NULL,Gender  varchar(6) NOT NULL,DOB  Date NOT NULL,Address  varchar(150) NOT NULL,email  varchar(50) NOT NULL,Ph_No  varchar(18) NOT NULL,Residancial_No  varchar(18) NOT NULL,Security_Q  int NOT NULL,Ans  varchar(40) NOT NULL,Clg_Name  varchar(100),Clg_Add  varchar(150),Sem  varchar(30),Course  varchar(6),  Password  varchar(15) NOT NULL,PRIMARY KEY(Reg_No),FOREIGN KEY(Course) REFERENCES branch(Branch_Code))";

if( mysql_query($sql) ) {
#echo "<tr><td>01</td><td>RegistrationRequest</td><td>Successful</td></tr>";
}
else {
#echo "<tr><td>01</td><td>RegistrationRequest</td><td>Failed</td></tr>";
#echo "<tr><td colspan='3'>Error : ".mysql_error()."</td></tr>";
}

mysql_query("INSERT INTO Questions VALUES(1,'Whats your aim?')");
mysql_query("INSERT INTO Questions VALUES(2,'Which is your feverate book?')");
mysql_query("INSERT INTO Questions VALUES(3,'Who is your feverate teacher?')");

$sql = "INSERT INTO lib_mnger VALUES('admin','XAMPP','localhost','MALE','2001-01-01','XAMPP at LocalHost','gmail.@XAMPP.com','999','999',1,'Software Developer','root')";

if( mysql_query($sql) )
{

echo "<br><br>";
echo "<h3> Librarian UID : admin </br><br> Password : root <br><br> Website  : http://localhost/www.swrp4lib.com/  </h3>";

}
?>

</table>
 

