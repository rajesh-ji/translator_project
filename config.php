<?php
    $servername = "localhost";
	$username ="imo_user";
	$password ="z!B,Al!dPFsU";
	$dbname ="imo_db";
	$paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
	$paypalId='wjchong@koofamilies.com';
	$site_url = "https://imotranslation.com";
	$paypal_cancel_url = $site_url . "/cancel.php?status=paypalcancel";
	$paypal_success_url = $site_url . "/success.php";
	$conn = mysqli_connect($servername,$username, $password, $dbname);
	if(!$conn){
		die("unsuccessfull connection :".mysqli_connect_error() );
		//echo "no server connect";
    }else{
	session_start();
}
?>