<?php
session_start();
$u=$_POST['uname'];
$nu=$_POST['nuname'];
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
echo $_SESSION['usr'];
if($_SESSION['usr']==$u)
{
	$q="SELECT `usrname` FROM `student`";
	$eq=mysqli_query($con, $q);
	$neq=mysqli_num_rows($eq);
	$eqr=mysqli_fetch_all($eq, MYSQL_ASSOC);
	$val=1;
	for($i=0; $i<$neq; $i++)
	{
		if($nu==$eqr[$i]['usrname'])
		{	$val=0;
		}
	}
	if($val==1)
	{
	$q1="UPDATE `student` SET `usrname`='".$nu."' WHERE `usrname`='".$_SESSION['usr']."'";
	$eq1=mysqli_query($con, $q1);
	header('Location: logses.php');
	}
	else if($val==0)
	header('Location: usernameredirecth.php');
}

else
	header('Location: usernameredirecth.php');
?>