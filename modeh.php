<?php
include("session.php");
?>
<!DOCTYPE HTML>
<html>
<head><title>Select Session</title></head>
<style>
button {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    margin: 8px 0;
    border-radius: 15px;
	border-style: none;
    cursor: pointer;
    width: 50%;
	font-family: TimesNew Roman;
	font-size: 12pt;
	font-size: 30px;
}

#b1:hover {
	transition:0.3s;
	transform: translateY(20px);
	
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);
}

#b2:hover {
	transition:0.3s;
	transform: translateY(-20px);
	
	box-shadow: 0px 0px 10px 4px rgba(0, 0, 0, 0.8);
}

#b2:active {
    transform: translateY(5px);
	}
	#b1:active {
    transform: translateY(45px);
	}

.pad{
padding-left: 40%;
padding-top: 17%;
padding-right: 10%;

}
</style>
<body background="student-849825_1920.jpg">
<div class="pad">

  <button   id="b1"type="button"onclick="window.location='challenge.php'">Take up <i><b>The Challenge!</b></i></button>
    <br/><br/><button id="b2"type="button" onclick="window.location='student.php'" >No, I need to practise!</button>
</div>
</body>
</html>