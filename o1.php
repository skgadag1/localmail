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
			echo 'alert("Please click on the submit button to send the mail")';
			echo '</script>';
			echo '<a href="composee.html" ><button type="submit"  size="50px">Submit</button></a>';
		}
		else{
		echo "Invalid OTP";}
}
		}
}
?>