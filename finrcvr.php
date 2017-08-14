<!DOCTYPE html>
<html>
<head>
<title>Password Recovery</title>
</head>
<style>

.signupbtn {width:50%}
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%;
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(1,0,0,0.4); 
    padding-top: 20px;
}
.modal-content {
    background-color: white;
    margin: 0% auto 1% auto;
    border: none;
    width: 70%; 
	
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
	font-family: TimesNew Roman;
	font-size: 12pt;
}

button:hover {
	transition:0.3s;
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);
}

button:active {
    transform: translateY(5px);
	}
.container {
    padding: 15px;
	color: black;
}

</style>
<body background="student-849825_1920.jpg">
<div id="id01" class="modal">
  <form class="modal-content">
    <div class="container">
<?php
$ip1=$_POST["answr"];
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q="SELECT `uname` FROM `logged`";
$fun=mysqli_query($con, $q);
if(mysqli_num_rows($fun)==1)
{
	$fr=$mysqli_fetch_assoc($fun);
	$r=implode("", $fr);
$q1="SELECT `usrname` FROM `student` WHERE `usrname`='".$r."'";
$res=mysqli_query($con, $q1);
$q2="SELECT `usrname`, FROM `staff`  WHERE `usrname`='".$r."'";
$res1=mysqli_query($con, $q2);

if(mysqli_num_rows($res)==1)
{
	$qr1="SELECT `name`, `usrname`, `password`, `a1` FROM `student` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	$ans=implode("", $qar["a1"]);
	if($ip1==$ans)
	echo 'Dear '.$qar["name"].'!</br>Your details are here</br>Username: '.$qar["usrname"].'</br>Password: '.$qar["password"].'</br>You can make changes in <i><b>Settings</b></i></br>';
	else
		header('Location: Modalloginredirect.html');
}
else if(mysqli_num_rows($res1)==1)
{
	$qr1="SELECT * FROM `staff` WHERE `usrname`='".$r."'";	
	$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	$ans=implode("", $qar["a1"]);
	if($ip1==$ans)
	echo 'Dear '.$qar["name"].'!</br>Your details are here</br>Username: '.$qar["usrname"].'</br>Password: '.$qar["password"].'</br>You can make changes in <i><b>Settings</b></i></br>';
	else
		header('Location: Modalloginredirect.html');
}
}
else
	header('Location: modalloginredirect.html');
?>
<div class="clearfix">
        <button class="signupbtn" onclick="window.location='modallogin.html'" >OK!</button>
      </div>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById('id01');
modal.style.display = "block";
</script>

</body>
</html>