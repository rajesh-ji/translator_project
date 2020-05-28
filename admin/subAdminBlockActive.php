<?php
if(isset($_POST['request'])){
    include('include/config.php');
    extract($_POST);
    print_r($_POST);
    
    $kindof  = $_POST['request'];
    if($kindof=='active'){
        $query = "update users set status = '1' where id ='$user_id'";
    }
    else if($kindof=='block'){
        $query = "update users set status = '0' where id ='$user_id'";

    }
    
    $executeQuery = mysqli_query($conn, $query);
  
    if($executeQuery){
        echo 'done';
    }else{
        echo 'failed';
    }

}
?>