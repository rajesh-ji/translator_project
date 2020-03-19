<?php
if(isset($_POST['lang_add'])){
    include('include/config.php');
    $created_id = $_SESSION['user_id'];
    $lang_name = $_POST['lang_name'];
       
        $front_lang = $_POST['front_lang'];
    
   

    if($front_lang == 'on'){
        echo $sql = "insert into system_lang(name,front_lang,created_by,status) value('$lang_name','1','$created_id','1')";
        $addlang = mysqli_query($conn, $sql);
        if($addlang){
            header('Location: my_service.php?type=lang_list');
        }else{
            die("error in adding new language");
        }
    }else{
        echo $sql = "insert into system_lang(name,front_lang,created_by,status) value('$lang_name','0','$created_id','1')";
        $addlang = mysqli_query($conn, $sql);
        if($addlang){
            header('Location: my_service.php?type=lang_list');
        }else{
            die("error in adding new language");
        }
    }

}
?>