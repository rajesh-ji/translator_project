<?php
include_once('config.php');
session_destroy();
header("location:".$site_url);
exit;
?>