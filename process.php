<?php
session_start();
date_default_timezone_set('America/New_York');
require "classes.php";
$_SESSION["BillingRep"] = $_POST["BillingRep"]; 

$today = getdate(); 
$fuData = array(
	billingRep=>$_POST[BillingRep],
	fuAgent=>$_POST[fuAgent],
	year=>(string)$today[year],
	monthNum=>(string)$today[mon],
	month=>(string)$today[month],
	mday=>(string)$today[mday],
	weekday=>(string)$today[weekday],
	hours=>(string)$today[hours],
	dtstamp=>(string)$today[0],
	caseNum=>$_POST[caseNumber],
	followUp=>$_POST[followUp],
	expl=>str_replace( array("\n\r","\r\n",'"'), " ", $_POST[expl] )
	);

$Datastore = new fileUtil($fuData[year]);
$fName = $Datastore->fn;

$FollUp = new record($fuData);

$fUp = $FollUp->record;


$result = $Datastore->fileWrite($fName,$fUp);

if(!is_null($result)) { 
	echo "<h1 style='padding:40px;text-align: center;'>SUCCESS!</h1>";
	echo "<script>function newForm() { open('form.php','_self',''); } setTimeout(newForm,1000);</script>";
}
else echo "<h1 style='padding:40px;text-align: center;'>FAILED TO WRITE!</h1><div style='text-aligm:center;'><button onclick='javascript:window.history.go(-2);'>Go back and try again.</button>";
?>