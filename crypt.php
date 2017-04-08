<?php
$password = 'hi this is test message';
$prev=str_split($password);
echo "Original Message:<br>".$password."<br>"; 
$count=count($prev);
srand(mktime(4));
$rprev=array_reverse($prev);
for($i=0; $i<$count; $i++)
{
	$r[$i]=rand(10, 25);
	$asci=ord($rprev[$i]);
	$j[$i]=chr($i+$asci+$r[$i]);
}
for($i=0; $i<$count; $i++)
{
	$asci=ord($j[$i]);
	$l[$i]=chr($asci-$i-$r[$i]);
}
$porig1=implode("", $j);
echo "<br/>Encrypted Message:<br/>".$porig1."<br>";
$k=array_reverse($l);
$porig=implode("", $k);
echo "<br/>Decrypted Message:<br/>".$porig."<br>";
?>