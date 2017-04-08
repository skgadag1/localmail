<?php
$t=$s=$b=$d=$tm="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$t=$_POST["to"];
	$s=$_POST["sub"];
	$b=$_POST["body"];
	$d=date("d/m/Y");
	$tm=date("h:i:sa");
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
		$su=str_split($s);
		$bd=str_split($b);

$c=count($su);
$c1=count($bd);
srand(mktime(4));
$rsu=array_reverse($su);
$rbd=array_reverse($bd);
for($i=0; $i<$c; $i++)
{
$r[$i]=rand(10, 25);
	$asci=ord($rsu[$i]);
	$js[$i]=chr($i+$asci+$r[$i]);
	
}
for($i=0; $i<$c1; $i++)
{
	$r[$i]=rand(10, 25);
	$asci=ord($rbd[$i]);
	$j[$i]=chr($i+$asci+$r[$i]);
}
$es=implode("", $js);
$eb=implode("", $j);
		$q="INSERT INTO `outbox` (`recip`, `subj`, `body`, `dat`, `tym`) VALUES ('".$t."', '".$es."', '".$eb."', '".$d."', '".$tm."')";
		if(mysqli_query($con, $q))
		{
			echo '<script language="javascript">';
			echo 'alert("Message sent")';
			echo '</script>';
		}
	}
}
?>