<?php
$ou=$nu="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$ou=$_POST["oldu"];
	$nu=$_POST["newu"];
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
		if(!empty($ou)&&!empty($nu))
		{
			if($ou==$nu)
			{
				echo '<script language="javascript">';
				echo 'alert("Both names are same")';
				echo '</script>';
			}
			$ud="UPDATE `register` SET `uname`='".$nu."' WHERE `uname`='".ou."'";
			if(mysqli_query($con, $ud))
			{
				echo '<script language="javascript">';
				echo 'alert("User Name successfully updated")';
				echo '</script>';
			}
			else
				echo "Changes not applied";
		}
	}
	else
		echo "ERROR IN CONNECTION";
}
			