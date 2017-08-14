<?php
session_start();
if($_SESSION['ses']!="start")
	header('Location: modallogin.html');
?>