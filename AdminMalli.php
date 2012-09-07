<html><br/ >
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
<font face="verdana" size="3"><p align="center">*** Chooti Malligen Ahanna - Runtime Analytics ***</font></p>
<font face="verdana" size="1"><p align="center">Confidential Content - (c) 2011 Tharindu & Harsha Associates</font></p>
<image src="3434.png"><br>
<a href="http://www.harshadura.com/WebApps/TodaysLuck/log.txt"> Runtime Log</a> 
<center><img src="http://3.bp.blogspot.com/_AGGDfHiXo2E/TCrc_ZlJkEI/AAAAAAAAPB8/g_CqraLyMb4/s1600/analytics2.jpg" /></center>
</form>
</html>

<?php

$con = mysql_connect("localhost","root","sa");
	if(!$con){
		die("MySQL Connection Failed! " . mysql_error());	
		
	}

	$db = mysql_select_db('chootimalli',$con);

	if(!$db){
		die("Database Connection Failed! " . mysql_error());
	}

$re = mysql_query("SELECT COUNT(*) tot FROM log");
$row = mysql_fetch_object($re);$max1 = $row->tot;

echo "<center><h4> SMS Count : ".$max1;

//////////////////////
echo "</h4></center><br/><br/>********************************************** RUNTIME LOG - History **************************************************************<br/><br/>";

echo "<br/><br/><tr/>[ INDEX ]<tr/>   -------   [ TP NO ]<tr/>   -------   [ MESSAGE ]<br/>";

$query="SELECT * FROM log";
$result=mysql_query($query);

while ($row=mysql_fetch_array($result)) {
	if ($row > 0) {
	echo "<br/><br/><tr/>[ ".$row['tuple']." ]<tr/>   -------   ".$row['tp']."<tr/>   -------   ".$row['msg'];
	}
}
