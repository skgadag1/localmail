<?php
session_start();
$ip='';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	$ip=$_POST["answr"];
	$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q="SELECT `uname` FROM `logged`";
$fun=mysqli_query($con, $q);
if(mysqli_num_rows($fun)==1)
{
	$fr=mysqli_fetch_assoc($fun);
	$r=implode("", $fr);
$q1="SELECT `usrname` FROM `student` WHERE `usrname`='".$r."'";
$res=mysqli_query($con, $q1);
$q2="SELECT `usrname` FROM `staff`  WHERE `usrname`='".$r."'";
$res2=mysqli_query($con, $q2);

if(mysqli_num_rows($res)==1)
{
		$qr1="SELECT `a1` FROM `student` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	$ans=implode("", $qar);
	if($ip==$ans)
		header('Location: redisplay.php');
	else
	{
		$_SESSION['vrfy']="no";
		header('Location: logses.php');
	}
}
else if(mysqli_num_rows($res2)==1)
{
		$qr1="SELECT `name`, `usrname`, `password`, `a1` FROM `staff` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	$ans=implode("", $qar["a1"]);
	if($ip1==$ans)
		header('Location: redisplay.php');
	else
		header('Location: modalloginredirect.html');
}
}
}
else
		header('Location: modalloginredirect.html');
	?>