<?php 
if(isset($_POST['addDoc'])){
    include('include/config.php');
    extract($_POST);
    $query = mysqli_query($conn, "INSERT INTO `my_doc_rushfee`(`doc_type`, `fee`) VALUES ('$doctype','$docfee')");
    if($query){
        echo "<script>alert('New doc type added')</script>";
        header('Location: lang_list.php');
    }else{
        header('Location: lang_list.php');

    }
}

?>