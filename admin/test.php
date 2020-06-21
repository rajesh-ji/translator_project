<?php 
if(isset($_POST['request'])){
    
    include('include/config.php');
    $user_id = $_SESSION['admin_id'];
    extract($_POST);
    print_r($_POST);
    print_r($_SESSION);
    // die;
    $query = mysqli_query($conn,"select * from lang_conversion where from_lang_id = '$first_lang' and to_lang_id = '$second_lang'");
    $count =  mysqli_num_rows($query);
    if($count>0){
        $_SESSION['request_error'] = '*This combination already exists, please checkout!';
    }else{
        echo $jfsl = "INSERT into tras_service(lang_conversion_id,user_id,status) value('$last_id','$user_id','0')";
        die;
        $query = mysqli_query($conn,"insert into lang_conversion(from_lang_id,to_lang_id,status) value('$first_lang','$second_lang','0')");
        $last_id = mysqli_insert_id($conn);
        if($query){
            $trans_query = mysqli_query($conn,"INSERT into tras_service(lang_conversion_id,user_id,status) value('$last_id','$user_id','0')");
            if($trans_query){
                $_SESSION['request_success']= '**Successfully Added Combination.';
            }else{
                $_SESSION['request_error'] = '*sql error.';
            }
        }else{
            $_SESSION['request_error'] = '*sql error.';
        }
    }
}
?>