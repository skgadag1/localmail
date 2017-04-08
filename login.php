<?php
$reg=1;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$u=$_POST["un1"];
	$p=$_POST["psw1"];
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
		$res="SELECT `uname`, `password` FROM `register` WHERE `uname`='".$u."' AND `password`='".$p."'";
		if($rs=mysqli_query($con, $res))
		{
			$o=mysqli_fetch_array($rs);
			if($o["uname"]==$u&&$o["password"]==$p)
				echo '<a href="inbox.html"><center><img src="title.jpg"/></center></a>';
			else
				echo "Invalid user name";
		}
	}
}
?>
		