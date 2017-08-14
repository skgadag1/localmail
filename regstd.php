<?php
$n=$u=$y=$un=$pw=$cpw='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$n=$_POST["name"];
	$u=$_POST["usn"];
	$y=$_POST["yr"];
	$un=$_POST["uname"];
	$pw=$_POST["pswd"];
	$cpw=$_POST["cpswd"];
	$f1=$_POST["f1"];
	$af1=$_POST["af1"];
	$con=mysqli_connect("localhost", "root", "", "onpro");
	if(!$con)
	{
		die("Connection faild: ".mysqli_connect_error());
	}
	$q1="INSERT INTO `student` (`name`, `usn`, `year`, `usrname`, `password`, `f1`, `a1`) VALUES ('".$n."','".$u."','".$y."','".$un."','".$pw."', '".$f1."', '".$af1."')";
	if(!($n==''||$u==''||$y==''||$un==''||$pw==''||$cpw==''))
	{
		if($pw==$cpw)
		{
			$nms="/[a-zA-Z]+$/";
			$regs="/2[Tt][Gg][0-9]{2}([Cc][Ss])|([Cc][Vv])|([Ee][Cc])|([Ee][Ee])|([Mm][Ee])[0-9]{3}$/";
			$maxl=strlen($pw);
			$ul=strlen($u);
			$usnn=preg_match_all($regs, $u);
			$nr=preg_match_all($nms, $n);
			if($nr&&$usnn)
			{
			if($maxl>5&&$maxl<16&&$ul==10)
			{
				
				$q="SELECT `usrname` FROM `student`";
				$qs="SELECT `usrname` FROM `staff`";
	$eq=mysqli_query($con, $q);
	$eqs=mysqli_query($con, $qs);
	$neq=mysqli_num_rows($eq);
	$neqs=mysqli_num_rows($eqs);
	$eqr=mysqli_fetch_all($eq, MYSQL_ASSOC);
	$eqrs=mysqli_fetch_all($eqs, MYSQL_ASSOC);
	$val=$vals=1;
	for($i=0; $i<$neq; $i++)
	{
		if($un==$eqr[$i]['usrname'])
		{	$val=0;
		}
	}
	for($i=0; $i<$neqs; $i++)
	{
		if($un==$eqrs[$i]['usrname'])
		{	$vals=0;
		}
	}
	if($val==1 && $vals==1)
	{
				
			if(mysqli_query($con, $q1))
			{
				header('Location: modallogin.html');
			}
			else
			{
				header('Location: modalloginredirect.html');
			}
	}
	else
				header('Location: modalloginredirect.html');
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
		header('Location: modalloginredirect.html');
	}
}
else
	exit(1);
mysqli_close($con);
?>