<?php
$q=$a=$op1=$op2=$op3=$i='';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$q=$_POST["que"];
	$a=$_POST["ans"];
	$op1=$_POST["o1"];
	$op2=$_POST["o2"];
	$op3=$_POST["o3"];
	$con=mysqli_connect("localhost", "root", "", "onpro");
	if(!$con)
	{
		die("Connection faild: ".mysqli_connect_error());
	}
	$q1="SELECT `sl` FROM `cque`";
	$res=mysqli_query($con, $q1);
   $row = mysqli_num_rows($res); 
   $i=$row+1;
   $q2="INSERT INTO `cque`(`sl`, `que`, `answr`, `op1`, `op2`, `op3`) VALUES ('".$i."', '".$q."', '".$a."', '".$op1."', '".$op2."', '".$op3."')";
   if(($op1!=$op2)&&($op2!=$op3)&&($op1!=$op3)&&($op1!=$a)&&($op2!=$a)&&($op3!=$a))
   {if(mysqli_query($con, $q2))
	   header('Location: csf.html');
   }
   else
	   header('Location: csfre.html');
}
?>