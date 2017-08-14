<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Recovery</title>
</head>
<style>
.cancelbtn {
    padding: 10px 20px;
    background-color: #f44336;
}
.cancelbtn,.signupbtn {float:right;width:50%}
.signupbtn {align:center;width:100%;}
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
	text-align: center;
    background-color: white;
    margin: 0% auto 1% auto;
    border: none;
    width: 20%; 
	
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
$nam='';
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
   $ses=$r;
   if($_SESSION['usr']!=$ses)
		 header('Location: modallogin.html');
   $q2="SELECT `name`, `usrname`, `password` FROM `student` WHERE `usrname`='".$r."'";
   $res1=mysqli_query($con, $q2);
   
$q3="SELECT `name`, `usrname`, `password` FROM `staff` WHERE `usrname`='".$r."'";
   $res2=mysqli_query($con, $q3);
      
   
   if(mysqli_num_rows($res1) > 0)
   {
	   $nm=mysqli_fetch_assoc($res1);
		$nam=$nm["name"];
		$unam=$nm["usrname"];
		$pas=$nm["password"];
   }
   
   else if(mysqli_num_rows($res2) > 0)
   {
	   $nm1=mysqli_fetch_assoc($res2);
		$nam=$nm1["name"];
		$unam=$nm1["usrname"];
		$pas=$nm1["password"];
   }
}
echo 'Dear '.$nam.'!<br/>Your Credentials<br/>
	Username: '.$unam.'<br/>Password: '.$pas.'<br/>';
?>	
	<div class="clearfix">
        <button class="signupbtn" type="button" onclick="window.location='logses.php'" >OK!</button>
      </div>
    </div>
  </form>
</div>

<script>
var modal = document.getElementById("id01");
modal.style.display = "block";
</script>

</body>
</html>