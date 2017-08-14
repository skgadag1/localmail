<?php
session_start();
$un='';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	$un=$_POST["uname"];
	$_SESSION['usr']=$un;
	$_SESSION['vrfy']="yes";
	$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q1="SELECT `usrname`, `password` FROM `student` WHERE `usrname`='".$un."'";
$res=mysqli_query($con, $q1);
$q2="SELECT `usrname`, `password` FROM `staff`  WHERE `usrname`='".$un."'";
$res1=mysqli_query($con, $q2);
$q3="UPDATE `logged` SET `uname`='".$un."'";
$res2=mysqli_query($con, $q3);
if(mysqli_num_rows($res)==1)
	header('Location: conf.php');
else if(mysqli_num_rows($res1)==1)
	header('Location: conf.php');
else
	{
		$_SESSION['vrfy']="no";
		header('Location: logses.php');
	}
}
?>