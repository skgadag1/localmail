	<?php 
	$o=$_POST["oldu"];
	$n=$_POST["newu"];
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
	$q="UPDATE `register` SET `uname`='".$n."' WHERE `uname`='".$o."'";
	if(mysqli_query($con, $q))
	{
		echo "Success";
	}
	}
	?>
