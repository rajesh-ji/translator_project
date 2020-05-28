<?php
session_start();
$login_id = $_SESSION['login_id'];
if($login_id == '1'){
    session_unset();
session_destroy();
header('Location: login.php');
}else{
    session_unset();
session_destroy();
header('Location: ../apply.php');
}

?>