<?php
session_start();
$un=$pw='';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	$un=$_POST["uname"];
	$pw=$_POST["pswd"];
	$_SESSION['usr']=$un;
	$_SESSION['ses']="start";
	$_SESSION['test']="ok";
	$_SESSION['nam']="na";
	$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q1="SELECT `usrname`, `password` FROM `student` WHERE `usrname`='".$un."' AND `password`='".$pw."'";
$res=mysqli_query($con, $q1);
$q2="SELECT `usrname`, `password` FROM `staff`  WHERE `usrname`='".$un."' AND `password`='".$pw."'";
$res1=mysqli_query($con, $q2);
$q3="UPDATE `logged` SET `uname`='".$un."'";
$res2=mysqli_query($con, $q3);
if(mysqli_num_rows($res)==1)
	header('Location: modeh.php');
else if(mysqli_num_rows($res1)==1)
	header('Location: staff.php');
else
	header('Location: modalloginredirect.html');
}
?>