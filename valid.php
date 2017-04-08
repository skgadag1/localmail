<?php
$pn="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$pn=$_POST["pnum"];
	if(!preg_match("/^[0-9]{10}$/", $pn))
		echo "Only numbers are allowed";
	else
		echo "Valid entry";
}
?>