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
</style>
</head>
<body>
<center><h3>Sent Mails</h3>
<table>
  <tr>
    <td>From</td>
    <td>Subject</td>
	<td>Message</td>
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
</body>
</html>