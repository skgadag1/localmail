<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Domain</title>
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
    right: 0;
    transition: 0.3s;
    padding: 15px;
    width: 100px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 8px 0 0 8px;
	text-align: left;
	opacity: 0.4	;
}

#rightnav a:hover{
    
	
	width: 130px;
	text-align: center;
	opacity: 1.0;
		 transform: translateY(15px);
		 display: block;
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
    position:absolute;
    background-color: rgb(255,0,80);
	
    transition: 0.3s;
    padding: 15px;
    width: 80px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    border-radius: 8px 0 0 8px;
	text-align: left;

}

#so {
    top: 110px;
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



/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: absolute;
right:110px;
top:600px;
    
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
	top:-130px;
	diplay:inline-block;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	right:-110px;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
	text-align:center;
    text-decoration: none;
    display: block;

}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: rgb(255,0,80);
color:white;

font-size:25px;
width:200px;

}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {

    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover  {
    background-color: #3e8e41;
	

}



</style>
<?php
$_SESSION['test']="ok";
$wish=$nam='';
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
   $q2="SELECT `name`, `usn` FROM `student` WHERE `usrname`='".$r."'";
   $ses=$r;
   if($_SESSION['usr']!=$ses)
		 header('Location: modallogin.html');
   $res1=mysqli_query($con, $q2);
   if(mysqli_num_rows($res1) > 0)
   {
	   $nm=mysqli_fetch_assoc($res1);
		$nam=$nm["name"];
		$usn=$nm["usn"];
   }
}
date_default_timezone_set("Asia/Calcutta");
if(date("a")=='am')
{
	$wish="Good Morning";
}
if(date("a")=='pm')
{
	if((date("h")=='12')||(date("h")=='01')||(date("h")=='02')||(date("h")=='03'))
		$wish="Good Afternoon";
	else
		$wish="Good Evening";
}
$usn='';
$_SESSION['nam']=$nam;
$_SESSION['usn']=$usn;
echo '<body>
<div class="pad">
'.$wish.' '.$nam.'!</br>
Welcome to Online Test</br>
Choose your Language now!

</div>
<div id="mySidenav">
  <a href="csd.php" id="c">C</a>
  <a href="cppsd.php" id="cpp"> C++</a>
  <a href="javasd.php" id="java">JAVA</a>
  <a href="htmlsd.php" id="html">HTML</a>
  <a href="phpsd.php" id="php">PHP</a>
  <a href="pythonsd.php" id="python">PYTHON</a>
  <a href="csssd.php" id="css">CSS</a>
</div>
<div id="rightnav">
  <a href="prof.php" id="nm"> Profile</a>
  <a href="logses.php" id="so"> Sign Out</a>
  </div>
<div class="dropdown">
  <a id="set"> Settings</a>
  <div class="dropdown-content">
    <a href="usernameh.php">Username</a>
    <a href="passwordh.php">Password</a>
    <a href="passhintp.php">Password Hint</a>
  </div>
</div> 

</body>';
?>
</html>