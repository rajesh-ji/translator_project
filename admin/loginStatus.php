<?php
if(isset($_POST['change'])){
    include('include/config.php');
   extract($_POST);

   $query = mysqli_query($conn, "UPDATE `users` SET `onlineStatus`='$status',`modified_at`=now() WHERE id ='$id'");
    if($query){
        echo "success";
    }else{echo "failed";}
}
