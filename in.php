<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
 

}
</style>
</head>
<body>
<font color="black" style="font-size: 28pt">
<center><h3>Inbox</h3>
<table>
  <tr>
    <td>From</td>
    <td>Subject</td>
	<td>Encrypted Message</td>
  </tr>
  
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "6errors";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT recip, subj, body FROM outbox";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>". $row["recip"]. "</td><td>". $row["subj"]. "</td><td>" . $row["body"] . "</td></tr>";
     }
} else {
     echo "0 results";
}
$conn->close();
?> 
</center>
</font>
<a href="inbox.html">Back to Home Page</a>
</body>
</html>