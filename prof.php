<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0px 30px 70px 40px white;
  max-width: 360px;
  margin: auto;
  text-align: center;
  font-family: Comic Sans MS;
  background-color: white;
}
body{
	overflow:hidden;
	margin:0;
	padding:0;
}
.container {
  padding: 0 16px;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  font-family: Comic Sans MS;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
button:hover{transition:0.3s;
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);}
button:active, a:hover {
  transform: translateY(5px);
}
#nm {
    top: 20px;
    background-color: rgb(0,80,255);
}

#set {
    top: 110px;
    background-color: rgb(0,80,255);
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
}
body{background-attachment: fixed}
</style>
<title>Stdent Profile</title>
</head>
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
   $q2="SELECT `name`, `usn`, `year` FROM `student` WHERE `usrname`='".$r."'";
   $res1=mysqli_query($con, $q2);
   if(mysqli_num_rows($res1) > 0)
   {
	   $nm=mysqli_fetch_assoc($res1);
		$nam=$nm["name"];
		$usn=$nm["usn"];
		$yr=$nm["year"];
		$br=str_split($usn);
		$brn=array($br[5], $br[6]);
		$brnc=strtolower(implode($brn));
		switch($brnc)
		{
			case "cs": $brnch="Computer Science and Engineering"; break;
			case "cv": $brnch="Civil Engineering"; break;
			case "ec": $brnch="Electronics and Communication"; break;
			case "ee": $brnch="Electrical and Electronics"; break;
			case "me": $brnch="Mechanical Engineering"; break;
		}
   }
}
$_SESSION['brn']=$brnch;
echo '<body style="background-color: rgb(0,80,255)">
<h2 style="text-align:center">Student Profile Card</h2>
<div class="card">
  <img src="usr.png" alt="John" style="width:100%">
  <div class="container">
    <h1>'.$nam.'</h1>
    <p class="title">'.$brnch.'</p>
    <p>'.$usn.'</p>';?>
   <p><button onclick="window.location='pdfl.php'">Download Report</button></p>
  </div>
</div>
<div id="rightnav">
<a href="student.php" id="nm"> Home</a>
  <a href="logses.php" id="set"> Sign Out</a>
  </div>
</body>
</html>
