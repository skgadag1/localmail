<!DOCTYPE html>
<html>
<head>
<title>Settings</title>
<style>
body{
    background-image:url(5.jpg);
    
}
h1 {
	font-family: TimesNewRoman;
	font-size: 24px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;
}

.dropbtn {
   background-color: transparent;
    border: none;
    color: white ;
    padding: 3px 45px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 3px 20px;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 4px 4px 8px white;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: grey;}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: black;
}
.button {
    background-color: #33009;
    border: none;
    color: white;
    padding: 3px 45px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 24px;
    margin: 3px 20px;
}
.button:hover {background-color: black;}
#centerpoint {
    top: 25%;
    left: 25%;
    position: absolute;
}button.accordion {
    background-color: transparent;
    color: white;
    cursor: pointer;
    padding: 30px;
    width: 100%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 15px;
    
}

button.accordion.active, button.accordion:hover {
    background-color: black; 
}

div.panel {
    padding: 0 18px;
    display: none;
    background-color: transparent;
}

</style>
</head>
<body>
<div style="position: relative; padding-left:50px; padding-right:50px; background-color:#33009
; padding-top: 5px; padding-bottom:10px; color:white; font-weight:500px;"><font size="16pt;">6errors</font></div>
<table width="100%" border="0">
<a href="inbox.html" class="button"><font style="text-shadow:2px 0px 2px black;"><center><h1>Inbox</h1></center></font></a>
<a href="composee.html" class="button"><font style="text-shadow:2px 0px 2px black;"><center><h1>Compose</h1></center></font></a>
<a href="sentmails.html" class="button"><font style="text-shadow:2px 0px 2px black;"><center><h1>Sent Mails</h1></center></font></a>
<a href="drafts.html" class="button"><font style="text-shadow:2px 0px 2px black;"><center><h1>Drafts</h1></center></font></a>
<a href="set1.php" class="button"><font style="text-shadow:2px 0px 2px black;"><center><h1>Settings</h1></center></font></a>
<div class="dropdown">
  <button class="dropbtn">
    <class style="text-shadow:2px 0px 2px black;"><h1>Account</h1>
  </button>
  <div class="dropdown-content">
    <a href="#"><b>User name</b></a>
    <a href="login.html"><b>Sign Out</b></a>
    <font style="text-shadow:4px 4px 8px black;">
    </font>
   </font>
</div>
</table>


<center><button class="accordion"><h1>Change User Name</h1></button>
<div class="panel">
<pre><h3><big>Change User Name</big></h3></pre>
<label>Old User Name:</label>
<input type="text" size='30' name="oldu"><br><br>
<label>New User Name:</label>
<input type="text" size='30' name="newu"><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button onclick="update()";> Submit </button>
<button>Cancle</button><br><br>
</div></center>
	<?php 
	$o=$_POST["oldu"];
	$n=$_POST["newu"];
	function update(){
	$con=mysqli_connect("localhost", "root", "", "6errors");
	if(!mysqli_connect_errno($con))
	{
	$q="UPDATE `register` SET `uname`='".$n."' WHERE `uname`='".$o."'";
	if(mysqli_query($con, $q)
	{
		echo "Success";
	}
	}}
	?>


<center><button class="accordion"><h1>Change Password</h1></button>
<div class="panel">
<pre><h3><big>Change Password</big></h3></pre>
<label>Old Password:</label>
<input type="text" size='30'><br><br>
<label>New Password:</label>
<input type="text" size='30'><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" value="Submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button>Cancle</button><br><br>
</div></center>

<center><button class="accordion"><h1>Change Phone Number</h1></button>
<div class="panel">
<pre><h3><big>Change Phone Number</big></h3></pre>
<label>Old Phone Number:</label>
<input type="text" size='30'><br><br>
<label>New Phone Number:</label>
<input type="text" size='30'><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" value="Submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button>Cancle</button><br><br>
</div></center>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>
</body>
</html>