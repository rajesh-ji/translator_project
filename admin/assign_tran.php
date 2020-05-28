<?php 
if(isset($_POST['submit_tran'])){
    include('include/config.php');
    extract($_POST);
    
    $query = mysqli_query($conn, "INSERT INTO `tras_service`( `lang_conversion_id`, `user_id`,`status`) VALUES ('$lang_conversion_id','$select_trans','1')");
    if($query){
        header('Location: lang_conversion.php?mgs=successadded');
    }else{
        header('Location: lang_coversion.php?mgs=error');

    }
}

?>