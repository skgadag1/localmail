<?php
$p=$p1="";
$cnt=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$p=$_POST["p"];
	$p1=$_POST["p1"];
	$pa=str_split($p);
	$pa1=str_split($p1);
	$c=count($pa);
	$c1=count($pa1);
	for($i=0; $i<3; $i++)
	{
		$pri[$i]=$pa[$i];
		$cnt++;
	}
	for($i=$cnt, $j=0; $i<$cnt+3; $i++, $j++)
	{
		$pri[$i]=$pa1[$j];
	}
	$str=implode("", $pri);
	echo 'Your private key is: <br>'.$str;
}
	?>
	