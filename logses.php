    <?php
    session_start();
	$_SESSION['ses']="null";
	$_SESSION['usr']="null";
    if(session_destroy())
    {
		header("Cache-Control: no-cache");
		if($_SESSION['vrfy']=="no")
    header("Location: modalloginredirect.html");
else
	header("Location: modallogin.html");
    }
    ?>