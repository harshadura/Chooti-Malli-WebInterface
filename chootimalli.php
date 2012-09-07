<?php

include_once 'AppZoneSender.php';
include_once 'AppZoneReciever.php';

function logFile($rtn){
	$f=fopen("log.txt","a");
	fwrite($f, $rtn . "\n");
	fclose($f);
}
//
$time=$_SERVER['REQUEST_TIME'];
$date = date('m/d/Y h:i:s a', $time);

$rtn="\n*** App Started on ".$date;logFile($rtn);

$con = mysql_connect("localhost","root","sa");
	if(!$con){
		die("MySQL Connection Failed! " . mysql_error());		
	}
	$db = mysql_select_db('chootimalli',$con);
	if(!$db){
		die("Database Connection Failed! " . mysql_error());
	}

try{
	$reciever=new AppZoneReciever();
	$rtn="{$reciever->getAddress()} :: {$reciever->getMessage()} :: {$reciever->getCorrelator()}";
	logFile($rtn);	
	
	$tp=$reciever->getAddress();
	$msg=$reciever->getMessage();
}
catch(AppZoneException $ex){
	logFile("ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}");
}

$Logger = mysql_query("INSERT INTO log (tp,msg) VALUES('".$tp."','".$msg."')");

$msg = strtolower($msg);

//messaging Syntax : MALLI<space>PRASHNE 

list($Key, $Data) = split(' ', $msg,2);

if ($Data != ''){
mysql_query("INSERT INTO box (tp,msg) VALUES('".$tp."','".$Data."')");

}
else{
	$reply = "Invalid Message! MALLI<space>PRASHNE sent to 4499";
	logFile($reply);

try{	
	$sender=new AppZoneSender("http://sdp-simulator.appspot.com/", "SMS_1320", "pass");
	$res=$sender->sms($reply, $reciever->getAddress());
	logFile("***Message Sent, ".$res);	
}
catch(AppZoneException $ex){
	logFile("ERROR: {$ex->getStatusCode()} | {$ex->getStatusMessage()}");
}

}

?>