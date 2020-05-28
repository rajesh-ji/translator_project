<?php

    if(isset($_POST['active'])){
        include('include/config.php');
        $id = $_POST['id'];
        $query = mysqli_query($conn, "update users set status = '1' where id  = '$id'");
        if($query){
            echo true;
            exit();
        }else{
            echo false;
            exit();
        }
    } elseif(isset($_POST['block'])){
        include('include/config.php');
        $id = $_POST['id'];
        $query = mysqli_query($conn, "update users set status = '2' where id  = '$id'");
        if($query){
            echo true;
            exit();
        }else{
            echo false;
            exit();
        }

    }
?>