<?php
$reg=1;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$fn=$_POST["f"];
	$ln=$_POST["l"];
	$un=$_POST["u"];
	$dat=$_POST["d"];
	$pnum=$_POST["p"];
	$psw=$_POST["psw"];
	$ccode=$_POST["psw2"];
	$sx=$_POST["g"];
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
		if(empty($ln)||empty($fn)||empty($un)||empty($dat)||empty($pnum)||empty($psw)||empty($ccode))
		{
			$reg=0;
			echo '<script language="javascript">';
			echo 'alert("All fields are mandatory")';
			echo '</script>';
		}
		else
		{
			if(!(preg_match("/[A-Za-z]$/", $fn))||!(preg_match("/[A-Za-z]$/", $ln)))
			{	
				$reg=0;
				echo '<script language="javascript">';
				echo 'alert("Please enter a valid name\nOnly letters are allowed in name field")';
				echo '</script>';
			}
			if(!preg_match("/^[0-9]{10}$/", $pnum))
				{
					$reg=0;
					echo '<script language="javascript">';
					echo 'alert("Please enter a valid phone number")';
					echo '</script>';
				}
			if(!preg_match("/^(([Mm][Aa][Ll][Ee])||([Ff][Ee][Mm][Aa][Ll][Ee])||([Oo][Tt][Hh][Ee][Rr][Ss]))$/", $sx))
			{
				$reg=0;
				echo '<script language="javascript">';
				echo 'alert("Please choose a valid gender")';
				echo '</script>';
			}
			if(!($psw==$ccode))
			{
				$reg=0;
				echo '<script language="javascript">';
				echo 'alert("Password mismatch")';
				echo '</script>';
			}
			if($reg==1)
			{
				$q="INSERT INTO `register` (`fname`, `lname`, `uname`, `dat`, `pnum`, `password`, `sex`) VALUES ('".$fn."', '".$ln."', '".$un."', '".$dat."', $pnum, '".$psw."', '".$sx."')"; 
				if(mysqli_query($con, $q)){
				echo '<script language="javascript">';
				echo 'alert("Successfully Registered!")';
				echo '</script>';}
			}
		}
	}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Error in connection")';
			echo '</script>';
		}
}
else
{
	echo '<script language="javascript">';
	echo 'alert("Error")';
	echo '</script>';
}
?>