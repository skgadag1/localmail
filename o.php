<?php 
$o="";
$u="skgadag1";
if($_SERVER["REQUEST_METHOD"]=="POST")
//{$o=$_POST["otp"];
$con=mysqli_connect("localhost", "root", "", "6errors");
if(!mysqli_connect_errno($con))
{
	$sql="SELECT `pnum` , `uname` FROM `register` where `uname`='".$u."'";	
	{
		if($res=mysqli_query($con, $sql))
		{
			$obj=mysqli_fetch_array($res);
		if($obj["uname"]==$u)
		{
	      $pnum=$obj["pnum"];
		}
			else{
				echo "wrong detail";
			}
		}
	}
}
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

	// Account details
	$username = 'skgadag1@gmail.com';
	$hash = 'dcf095b2a8b3acc04dfd6e8b36b7ab72ac0759d48f4021ef2f94a8521a22efcb';
	
	// Message details
	$numbers = array($pnum);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($ostr);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	// Process your response here
	//echo $response;
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
		$q="UPDATE `otp` SET `gen`='".$ostr."'";
		if(mysqli_query($con, $q))
			echo '<a href="o1.html">OTP</a>';
		else
			echo "Invalid OTP";
	}
?>