<?php
if(isset($_POST['mgs'])){
include('include/config.php');
    extract($_POST);
    $operation = $_POST['mgs'];
    if($operation=='delete'){
        $query = mysqli_query($conn,"update lang_conversion set status = '2' where id ='$lang_id'");
        if($query){
            $trans_query = mysqli_query($conn,"update tras_service set status = '2' where id  = '$tras_id'");
            if($trans_query){
                echo true;
            }else{
                echo false;
            }
        }
       

    }else {
        
       echo false;
    }    
   
}    
?>