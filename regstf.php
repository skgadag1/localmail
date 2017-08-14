<?php
$n=$u=$y=$un=$pw=$cpw='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$n=$_POST["name"];
	$u=$_POST["sid"];
	$y=$_POST["br"];
	$un=$_POST["uname"];
	$pw=$_POST["pswd"];
	$cpw=$_POST["cpswd"];
	$f1=$_POST["f1"];
	$af1=$_POST["af1"];
if($pw==$cpw)
{
	$con=mysqli_connect("localhost", "root", "", "onpro");
	if(!$con)
	{
		die("Connection faild: ".mysqli_connect_error());
	}
	$q1="INSERT INTO `staff` (`name`, `sid`, `branch`, `usrname`, `password`, `f1`, `a1`) VALUES ('".$n."','".$u."','".$y."','".$un."','".$pw."', '".$f1."', '".$af1."')";
	if(!($n==''||$u==''||$y==''||$un==''||$pw==''||$cpw==''))
	{
		if($pw==$cpw)
		{
			$nms="/[a-zA-Z]+$/";
			$maxl=strlen($pw);
			$nr=preg_match_all($nms, $n);
			if($nr&&$maxl>5&&$maxl<16)
			{
			if(mysqli_query($con, $q1))
			{
				header('Location: modallogin.html');
			}
			}
			else
			{
				header('Location: modalloginredirect.html');
			}
		}
		else
		{
			header('Location: modalloginredirect.html');
		}
	}
	else
	{
		header('Location: modalloginredirect.html');
	}
}
else
{
		header ('Location: modalloginredirect.html');
}
}
else
	exit(1);

?>