<?php
session_start(); 

$con = mysql_connect("localhost","root","sa");
	if(!$con){
		die("MySQL Connection Failed! " . mysql_error());		
	}
	$db = mysql_select_db('chootimalli',$con);
	if(!$db){
		die("Database Connection Failed!" . mysql_error());
	}
	
$id   = $_POST["id1"];
$re   = mysql_query("SELECT tp, ques FROM pendingBox where id=".$id);
$row  = mysql_fetch_object($re);
$_SESSION['tp']   = $row->tp;
$_SESSION['ques'] = $row->ques;

header('Location: index.php'); 

?>
