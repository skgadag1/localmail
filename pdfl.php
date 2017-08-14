<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "onpro");
if(!$con)
{
	die("Connection faild: ".mysqli_connect_error());
}
$q1="SELECT  `lang`, `score`, `dats`, `uname` FROM `assessment` WHERE `uname`='".$_SESSION['usr']."'";
$res=mysqli_query($con, $q1);
if (($nrows=mysqli_num_rows($res)) > 0) 
{
$r=mysqli_fetch_all($res, MYSQLI_ASSOC); 	
$html ='<p id="head">Tontadarya College of Engineering</p><p id="head">Activity Report</p>';
$html .='<p><font>Name: </font>'.$_SESSION['nam'].'<br/><font>USN: </font>'.$_SESSION['usn'].'<br/><font>Branch: </font>'.$_SESSION['brn'].'</p>';
$html .= '<table ><tr ><th >Sl.No</th><th>Language</th><th>Score</th><th>Date</th></tr>';
for($i=0; $i<$nrows; $i++){
	$html .= '<tr ><td>'.($i+1).'</td><td>'.$r[$i]["lang"].'</td><td>'.$r[$i]["score"].'</td><td>'.$r[$i]["dats"].'</td></tr>';
}
$html .='</table>';
include("./mpdf/mpdf.php");
$Report=new mPDF(); 
$stylesheet = file_get_contents('down.css');
$Report->WriteHTML($stylesheet,1);
$Report->WriteHTML($html);
$Report->Output();
exit;
}
else
{
	echo "Report can't be generated.<br/><br/>You have not taken any test!";
}
?>