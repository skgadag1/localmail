<?php

$ip1=$_POST["inp"];

echo $ip1;
echo "hi";
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
$q2="SELECT `usrname`, FROM `staff`  WHERE `usrname`='".$r."'";
$res1=mysqli_query($con, $q2);

if(mysqli_num_rows($res)==1)
{
	$qr1="SELECT * FROM `student` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_array($qres1, MYSQLI_NUM);
	$rc1="SELECT `que1`, `que2` FROM `recover`";
	$erc=mysqli_query($con, $rc1);
	$recvr=mysqli_fetch_array($erc, MYSQLI_NUM);
	$z=0;
	$one=1;
	$sf=implode("", $recvr[$z]);
	$sf1=implode("", $recvr[$one]);
	$ca=implode("", $qar[$sf+5]);
	$ca1=implode("", $qar[$sf1+5]);
	if(($ip1==$ca)&&($ip2==$ca1))
	echo 'Dear '.$qar["name"].'!</br>Your details are here</br>Username: '.$qar["usrname"].'</br>Password: '.$qar["password"].'</br>You can make changes in <i><b>Settings</b></i></br>';
	else
		header('Location: n.php');
}
else if(mysqli_num_rows($res1)==1)
{
	$qr1="SELECT `name`, `usrname`, `password` FROM `staff` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	echo 'Dear '.$qar["name"].'!</br>Your details are here</br>Username: '.$qar["usrname"].'</br>Password: '.$qar["password"].'</br>You can make changes in <i><b>Settings</b></i></br>';
}

}
	
else
	header('Location: modalloginredirect.html');
?>