<?php
include_once 'config.php';
$request_id = $_REQUEST['sid'];
$response = json_encode($_REQUEST);
$sql = "update payment set status='failed',response='$response' where transation_id=$request_id and status='pending'";
mysqli_query($conn,$sql);

?>
<h4> Your transation failed</h4>
<a href="<?php echo $site_url;?>">GO Back To Home</a>