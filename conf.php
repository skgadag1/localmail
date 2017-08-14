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
    padding-top: 13%;
}
.modal-content {
    background-color: white;
    margin: 0% auto 1% auto;
    border: none;
    width: 50%; 
	
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
	
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
  <form class="modal-content" action="recheck.php" method="post">
    <div class="container">
<?php
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}

$q1="SELECT `uname` FROM `logged`";
$res=mysqli_query($con, $q1);
if(mysqli_num_rows($res)==1)
{
$row = mysqli_fetch_assoc($res); 
   $r=implode("", $row);
   $ses=$r;
	if($_SESSION['usr']!=$ses)
		 header('Location: modallogin.html');
	$qu1="SELECT `usrname` FROM `student` WHERE `usrname`='".$r."'";
$ures=mysqli_query($con, $qu1);
$qu2="SELECT `usrname` FROM `staff` WHERE `usrname`='".$r."'";
$ures1=mysqli_query($con, $qu2);

if(mysqli_num_rows($ures)==1)
{
		$qr1="SELECT `name`, `usrname`, `password`, `f1` FROM `student` WHERE `usrname`='".$r."'";	
		$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	echo $qar["f1"].'<br/>';
	}
else if(mysqli_num_rows($ures1)==1)
{
		$qr1="SELECT `name`, `usrname`, `password`, `f1` FROM `staff` WHERE `usrname`='".$r."'";	
		$qres1=mysqli_query($con, $qr1);
	$qar=mysqli_fetch_assoc($qres1);
	echo $qar["f1"].'<br/>';
}
}
?>
<input type="text" placeholder="Enter your answer" name="answr" autofocus required/><br/>
<div class="clearfix">
        <button type="button" onclick="window.location='logses.php'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Next</button>
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