<?php
$username=$pnumber="";
$username=$_POST["username"];

$con=mysqli_connect("localhost", "root", "", "confirm");
if(!mysqli_connect_errno($con))
{
	$sql="SELECT `pnumber` , `username` FROM `reg` where `username`='".$username."'";	
	{
		if($res=mysqli_query($con, $sql))
		{
			$obj=mysqli_fetch_array($res);
		if($obj["username"]==$username)
		{
	      $pnumber=$obj["pnumber"];
		}
			else{
				echo "wrong detail";
			}
		}
	}
}

srand(mktime(4));
$var=rand(6,8);
for($i=0;$i<$var;$i++)
{
	$r=rand(48,122);
	$otp[$i]=chr($r);
}
$ostr=implode("", $otp);

	// Account details
	$username = 'skgadag1@gmail.com';
	$hash = 'dcf095b2a8b3acc04dfd6e8b36b7ab72ac0759d48f4021ef2f94a8521a22efcb';
	
	// Message details
	$numbers = array($pnumber);
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
	echo $response;
?>