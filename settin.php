<?php
$o=$n="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
$o=$_POST["old"];
$n=$_POST["new"];
$o1=$_POST["oldp"];
$n1=$_POST["newp"];
$o2=$_POST["oldc"];
$n2=$_POST["newc"];

$con=mysqli_connect("localhost", "root", "", "6errors");
if(!mysqli_connect_errno($con))
{
	if(!empty($o)&&!empty($n)){
	$q="UPDATE `register` SET `uname`='".$n."' WHERE `uname`='".$o."'";
	if(mysqli_query($con, $q))
	{
		echo '<script language="javascript">';
		echo 'alert("User Name updated")';
		echo '</script>';
	}}
	
	if(!empty($o1)&&!empty($n1)){
	$q="UPDATE `register` SET `password`='".$n1."' WHERE `password`='".$o1."'";
	if(mysqli_query($con, $q))
	{
		echo '<script language="javascript">';
		echo 'alert("Password updated")';
		echo '</script>';
	}}
	
	if(!empty($o2)&&!empty($n2)){
	$q="UPDATE `register` SET `pnum`='".$n2."' WHERE `pnum`='".$o2."'";
	if(mysqli_query($con, $q))
	{
		echo '<script language="javascript">';
		echo 'alert("Phone number updated")';
		echo '</script>';
	}}
	echo '<a href="inbox.html">Back to home page</a>';
}}
?>