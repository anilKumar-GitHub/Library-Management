<?php


	echo "<br><br><br><h2> Initializing of pre-defined data.....</h2>";
	$con = mysql_connect("localhost","root","") or die (" Error : ".mysql_error());
	$db = mysql_select_db("my_library") or die (" Error : ".mysql_error() );

	// Records for Branch Registration Table
	mysql_query("INSERT INTO Branch VALUES ('CS','Computer Science and Engineering')");
	mysql_query("INSERT INTO Branch VALUES ('EC','Electronics and Communication Engineering')");
	mysql_query("INSERT INTO Branch VALUES ('IS','Information Science and Engineering')");
	mysql_query("INSERT INTO Branch VALUES ('ME','Mechanical Engineering')");
	mysql_query("INSERT INTO Branch VALUES ('PUC','Pre-University Couesr')");
	mysql_query("INSERT INTO Branch VALUES ('CE','Civil Engineering')");
	mysql_query("INSERT INTO Branch VALUES ('MBA','Master of Bisiness Application')");
		
	// Records for Edition Table
	mysql_query("INSERT INTO Edition VALUES ('1','First')");
	mysql_query("INSERT INTO Edition VALUES ('2','Second')");
	mysql_query("INSERT INTO Edition VALUES ('3','Third')");
	mysql_query("INSERT INTO Edition VALUES ('4','Fourth')");
	mysql_query("INSERT INTO Edition VALUES ('5','Fifth')");
	mysql_query("INSERT INTO Edition VALUES ('6','Sixth')");
	mysql_query("INSERT INTO Edition VALUES ('7','Seventh')");

	// Records for Book_Stack Table
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000001','C Programming and Concept','P.B. Kottur','IBPB',3,'CS',250,5,0,5)");
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000002','Total Reference of Java','Herbert Schildt','Mc-Graw Hill',5,'CS',700,5,0,5)");
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000003','DataBase Management and Dataware Housing','Navathi','Mc-Graw Hill',4,'IS',650,5,0,5)");
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000004','Industrial Management and Production','P.B Shekar','Swan Blue',2,'ME',380,5,0,5)");
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000005','Highway and Airport Construction Technology','C.V. Rajan','Mc-Graw Hill',4,'CE',600,5,0,5)");
	mysql_query("INSERT INTO book_stack VALUES ('ABCD000000006','Indian Accountancy and Banking Roles','W.G.Aggrawal','Mc-Graw Hill',3,'MBA',600,5,0,5)");

	// Records of Book_list Table
	mysql_query("INSERT INTO Book_list VALUES  ('AB85673X','ABCD000000001','22801',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('AB74836W','ABCD000000001','22802',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('AB56243H','ABCD000000001','22803',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('AB34756K','ABCD000000001','22804',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('AB837465','ABCD000000001','22805',0)");
	
	mysql_query("INSERT INTO Book_list VALUES  ('JV34657','ABCD000000002','33001',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('JV44567','ABCD000000002','33002',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('JV97364','ABCD000000002','33003',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('JV87973','ABCD000000002','33004',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('JV73846','ABCD000000002','33005',0)"); 
	
	mysql_query("INSERT INTO Book_list VALUES  ('3444DB34','ABCD000000003','17331',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('3566DB45','ABCD000000003','17332',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('3546DB47','ABCD000000003','17333',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('7654DB47','ABCD000000003','17334',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('1232DB42','ABCD000000003','17335',0)");
	
	mysql_query("INSERT INTO Book_list VALUES  ('IP3455','ABCD000000004','22001',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IP6646','ABCD000000004','22002',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IP8776','ABCD000000004','22003',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IP1233','ABCD000000004','22004',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IP7863','ABCD000000004','22005',0)"); 
 

	mysql_query("INSERT INTO Book_list VALUES  ('HAT4645','ABCD000000005','34001',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('HAT6896','ABCD000000005','34002',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('HAT2345','ABCD000000005','34003',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('HAT5768','ABCD000000005','34004',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('HAT2345','ABCD000000005','34005',0)");
	
	
	mysql_query("INSERT INTO Book_list VALUES  ('IAB3452','ABCD000000006','11001',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IAB3456','ABCD000000006','11002',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IAB3436','ABCD000000006','11003',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IAB5678','ABCD000000006','11004',0)"); 
	mysql_query("INSERT INTO Book_list VALUES  ('IAB1678','ABCD000000006','11005',0)"); 
 


	// Records of Student Details Table
	
	mysql_query("INSERT INTO Registration VALUES('AIET405','Dev Rajan ','Kiran Rajan','MALE','1989-02-11','Gandi Nagar Bangalore','rajan240@gmail.com','9060544343','23344-35454','1','S/W','Achary Institute of Engineering','Bangalore','First','IS','root')");
	mysql_query("INSERT INTO Registration VALUES('AIET401','Vayu Dev','Dev Patil','MALE','1993-08-15','Gulbarga','vayu999@gmail.com','9060544890','22870-22495','2','Know Yourself','Appa Institute of Engineering and Technology','SB College Campus Aland Road Gulbarga','First','CS','root')");

	echo "<h3>Complited Successfully...</h3>";
?>