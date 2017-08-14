<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Staff Domain</title>
</head>
<style>
.pad{
padding-left: 75%;
padding-top: 0px;
}
body
{
	background-attachment: fixed;
	background-image: url('student-849825_1920.jpg');
    background-repeat: no-repeat;
	overflow: hidden;
    margin: 0;
}
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 70px;
	height: 30px;
	font-family: TimesNew Roman;
	font-size: 12pt;
	border-radius: 8px 8px 8px 8px;
	
}

button:hover {
    opacity: 0.85;
}
#mySidenav a {
    position: absolute;
    left: -60px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 0 8px 8px 0;
	text-align: right;
	opacity: 0.5;
}

#mySidenav a:hover {
    left: 0;
	text-align: center;
	opacity: 1.0;
	transform: translateY(15px);

}

#rightnav a {
    position: absolute;
    right: -50px;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 8px 0 0 8px;
	text-align: left;
	opacity: 0.5;
}

#rightnav a:hover {
    right: 0;
	text-align: center;
	opacity: 1.0;
		 transform: translateY(15px);

}

#c {
    top: 20px;
    background-color: #4CAF50;
}

#cpp {
    top: 110px;
    background-color: #2196F3;
}

#java {
    top: 200px;
    background-color: #f44336;
}

#html {
    top: 290px;
    background-color: #555;
}

#php {
    top: 380px;
    background-color: rgb(255,0,90);
}

#python {
    top: 470px;
    background-color: rgb(255,80,0);
}

#nm {
    top: 20px;
    background-color: rgb(0,80,255);
}

#set {
    top: 110px;
    background-color: rgb(255,0,80);
}

#so {
    top: 200px;
    background-color: rgb(0,0,0);
}

#css{
top: 560px;
background-color: rgb(0,90,155);
}
.pad{
position: absolute;
color: white;
padding-top: 10px;
padding-left: 380px;
font-size: 50px;
text-align: center;}
</style>
<?php
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q1="SELECT `uname` FROM `logged`";
$res=mysqli_query($con, $q1);
if (mysqli_num_rows($res) > 0) 
{
   $row = mysqli_fetch_assoc($res); 
   $r=implode("", $row);
   $q2="SELECT `name` FROM `staff` WHERE `usrname`='".$r."'";
   $res1=mysqli_query($con, $q2);
   $ses=$r;
   if($_SESSION['usr']!=$ses)
		 header('Location: modallogin.html');
   if(mysqli_num_rows($res1) > 0)
   {
	   $nm=mysqli_fetch_assoc($res1);
		$nam=$nm["name"];
   }
}
date_default_timezone_set("Asia/Calcutta");
if(date("a")=='am')
	$wish="Good Morning";
else if(date("a")=='pm')
{
	if((date("h")=='12')||(date("h")=='01')||(date("h")=='02')||(date("h")=='03'))
		$wish="Good Afternoon";
	else
		$wish="Good Evening";
}
echo '<body background="student-849825_1920.jpg">
<div class="pad">
'.$wish.' '.$nam.'!</br>
Please select the langauge</br>
to upload the questions

</div>
<div id="mySidenav">
  <a href="csf.html" id="c">C</a>
  <a href="cppsf.html" id="cpp"> C++</a>
  <a href="javasf.html" id="java">JAVA</a>
  <a href="htmlsf.html" id="html">HTML</a>
  <a href="phpsf.html" id="php">PHP</a>
  <a href="pythonsf.html" id="python">PYTHON</a>
  <a href="csssf.html" id="css">CSS</a>
</div>
<div id="rightnav">
<a href="profs.php" id="nm"> Profile</a>
  <a href="#" id="set"> Settings</a>
  <a href="logses.php" id="so"> Sign Out</a>
  </div>

</body>';
?>
</html>