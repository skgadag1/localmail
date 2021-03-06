<?php
include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Account Recovery</title>
</head>
<style>
.cancelbtn {
    padding: 10px 20px;
    background-color: black;
	float:right;
	width:50%;
}
.signupbtn {float:left;width:50%}
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
    padding-top: 15%;
	
	
}
.modal-content {
    background-color: white;
    margin: 0% auto 1% auto;
    border: none;
    width: 40%;
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
    background-color: rgb(255,0,80);
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
	font-family: TimesNew Roman;
	font-size: 12pt;
}

button:hover {
	transition:0.3s;
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);
	width:45%;
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
  <form class="modal-content" action="username.php" method="post">
    <div class="container">
	<label>Current Username</label></br>
      <input type="text" placeholder="Enter your username" name="uname" autofocus required/></br>
	  <label>New Username</label></br>
      <input type="text" placeholder="Enter new username" name="nuname" required/></br>
	  Note: You will be redirected to login page after applying changes.
	  	  <div class="clearfix">
        <button type="button" onclick="window.location='student.php'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Apply</button>
      </div>
    </div>
  </form>
</div>
<script>
var modal = document.getElementById('id01');
modal.style.display="block";
</script>
</body>
</html>