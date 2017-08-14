<!DOCTYPE html>
<html>
<head><title>CSS Test</title></head>
<style>
.cancelbtn {
    padding: 10px 20px;
    background-color: #f44336;
}
.cancelbtn,.signupbtn {width:20%}
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
    padding-top: 10px;
}
.modal-content {
    background-color: white;
    margin: 0% auto 1% auto;
    border: none;
    width: 70%; 
	padding-left: 50px;
	
	
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
#ans{
background-color: #4CAF50;
    color: white;
    padding: 5px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    
	font-family: TimesNew Roman;
	font-size: 12pt;
}


.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 75px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 10px 0;
    position: absolute;
    z-index: 1;
    
    left: 80%;
    margin-left: -60px;
    opacity: 0;
    transition: 1s;
	
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>
<body background="student-849825_1920.jpg">
<div id="id01" class="modal">
	<form class="modal-content" action="regstd.php" method="post">
		<div class="container">
<?php
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q="SELECT `sl`, `que`, `answr`, `op1`, `op2`, `op3` FROM `cque`";
$res=mysqli_query($con, $q);
$rcount=mysqli_num_rows($res);
if($rcount>0)
{
	$r=mysqli_fetch_all($res, MYSQLI_ASSOC); 
	for($i=0, $j=0; $i<$rcount; $i++, $j++)
	{
		$k=array("answr", "op1", "op2", "op3");
		$ran=(rand(0,100)%4);
		$nam=$j+$i;
		echo $r[$i]["sl"].'. '.$r[$i]["que"].'&nbsp&nbsp&nbsp&nbsp<div class="tooltip"><button name='.$nam.' id="ans">Answer</button><span class="tooltiptext">'.$r[$i]["answr"].'</span></div>
					<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name='.$j.' value="1"/>'.$r[$i][$k[$ran]].'
					<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name='.$j.' value="2"/>'.$r[$i][$k[($ran+1)%4]].'
					<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name='.$j.' value="3"/>'.$r[$i][$k[($ran+2)%4]].'
					<br/>&nbsp&nbsp&nbsp&nbsp<input type="radio" name='.$j.' value="4"/>'.$r[$i][$k[($ran+3)%4]].'
					<br/><br/>';
					
	}
}
?>
		<div class="clearfix">
			<button type="submit" class="signupbtn">Submit</button>
			<button type="button" onclick="window.location='student.php'" class="cancelbtn">Cancel</button>
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