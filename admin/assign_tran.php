<?php 
if(isset($_POST['submit_tran'])){
    include('include/config.php');
    extract($_POST);
    $query = mysqli_query($conn, "INSERT INTO `tras_service`( `lang_conversion_id`, `user_id`) VALUES ('$lang_conversion_id','$select_trans')");
    if($query){
        header('Location: index.php?mgs=successadded');
    }else{
        header('Location: index.php?mgs=error');

    }
}

?>