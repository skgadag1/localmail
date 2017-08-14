<?php
session_start();
?>
<!DOCTYPE html>
<head><title>Result</title></head>
<style>
.alignment{
	padding-top: 230px;
}
button  {
    background-color: #4CAF50;
    color: white;
    padding: 10px 40px;
	font-size:23px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    
	font-family: TimesNew Roman;
	
}

button:hover {
	transition:0.3s;
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);
}

button:active {
    transform: translateY(5px);
	}

</style>
<body style="text-align:center; font-size:23px">
<div class="alignment">
<?php

$tyms=time();
$_SESSION['test']="done";
$v=array();
	$v[0]=$_POST["v1"];
	$v[1]=$_POST["v2"];
	$v[2]=$_POST["v3"];
	$v[3]=$_POST["v4"];
	$v[4]=$_POST["v5"];
	$v[5]=$_POST["v6"];
	$v[6]=$_POST["v7"];
	$v[7]=$_POST["v8"];
	$count=0;
	$con=mysqli_connect("localhost", "root", "", "onpro");
	if(!$con)
	{
		die("Connection faild: ".mysqli_connect_error());
	}
	$del="DELETE FROM `eval`";
	$redel=mysqli_query($con, $del);
	$i=1;
	$q="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".$i."', '".$v[0]."')";
	$res1=mysqli_query($con, $q);
	if($v[0]=="right/")
		$count++;
	$q1="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+1)."', '".$v[1]."')";
	$res2=mysqli_query($con, $q1);
	if($v[1]=="right/")
		$count++;
	$q2="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+2)."', '".$v[2]."')";
	$res3=mysqli_query($con, $q2);
	if($v[2]=="right/")
		$count++;
	$q3="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+3)."', '".$v[3]."')";
	$res4=mysqli_query($con, $q3);
	if($v[3]=="right/")
		$count++;
	$q4="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+4)."', '".$v[4]."')";
	$res5=mysqli_query($con, $q4);
	if($v[4]=="right/")
		$count++;
	$q5="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+5)."', '".$v[5]."')";
	$res6=mysqli_query($con, $q5);
	if($v[5]=="right/")
		$count++;
	$q6="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+6)."', '".$v[6]."')";
	$res7=mysqli_query($con, $q6);
	if($v[6]=="right/")
		$count++;
	$q7="INSERT INTO `eval`(`sl`, `ans`) VALUES ('".($i+7)."', '".$v[7]."')";
	$res8=mysqli_query($con, $q7);
	if($v[7]=="right/")
		$count++;
	date_default_timezone_set("Asia/Calcutta");
	$dat=date("jS M Y");
	$qs="SELECT `sl`, `tym` FROM `assessment`";
	$eqs=mysqli_query($con, $qs);
	$nr=mysqli_num_rows($eqs);
	$r=mysqli_fetch_all($eqs, MYSQLI_ASSOC);
	$val=0;
for($n=0; $n<$nr; $n++)
{
	$t=time();
	if(($t-($r[$n]['tym']))<10)
		$val=1;
		
} 	
if($val!=1){
	$iq="INSERT INTO `assessment` (`sl`,  `lang`,`score`, `dats`, `tym`, `uname`) VALUES ('".($nr+1)."',  'C','".$count."', '".$dat."', '".$tyms."', '".$_SESSION['usr']."')";
$eiq=mysqli_query($con, $iq);
	echo "Submission successful!<br/>Your Score: ".$count.'</br>';
}
else
	header('Location:student.php');

?>

<button id="lnk" onclick="window.location='student.php'">Done</button>
</div>
</body>
</html>