<?php
$op="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$op=$_POST["xyz"];
		$con=mysqli_connect("localhost", "root", "", "6errors");
		if(!mysqli_connect_errno($con))
		{
			$q="SELECT `gen` FROM `otp` WHERE `gen`='".$op."'";
			if($r=mysqli_query($con, $q))
			{
				$o=mysqli_fetch_array($r);
		if($o['gen']==$op)
		{
			echo '<script language="javascript">';
			echo 'alert("Please click on the submit button to get access to Inbox")';
			echo '</script>';
			echo '<a href="in.php" ><img src="1.jpg"/></button></a>';
		}
		else{
		echo "Invalid OTP";}
}
		}
}
?>