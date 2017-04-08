<?php
srand(mktime(1000));
$var=rand(4, 5);
for($i=0; $i<$var; $i++)
{
	$r=rand(48, 122);
	if($r>56 && $r<65)
		$r=rand(48, 57);
	else if($r<97 && $r>90)
		$r=rand(97, 122);
	$otp[$i]=chr($r);
}
$ostr=implode("", $otp);
echo "Your OTP is: ".$ostr;
?>
