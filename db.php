<?
    $con = mysql_connect("localhost","root","") or die("Connection Failed");
	$sql = "CREATE DATABASE NEW1";
	$db = mysql_query($sql);
	if(!db) 
	echo " Creation Failed";
	else 
	echo"Created";
?>