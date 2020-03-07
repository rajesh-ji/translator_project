<?php
if(isset($_POST['submit'])){
    include('config/config.php');
    extract($_POST);
    print_r($_POST);
    if(empty($_POST['login_with'])){
        $userRole = 1;
    }
    else{
        $userRole = $_POST['login_with'];
    }    
   // echo $userRole;
  // echo $sql = "select * from users where username = '$username' and role_id = '$userRole'";

    $result = mysqli_query($conn, "select * from users where username = '$username' and role_id = '$userRole'");
    if(mysqli_num_rows($result)>0){
        $rd = mysqli_fetch_assoc($result);
        if($login_with == 3){
            echo "<script> alert('translator login'); </script>" ;  
        }
        elseif($login_with == 2){
            echo "<script> alert('client login'); </script>";   
        }
        else{
            echo "<script> alert('admin login'); </script>" ;  
        }
    }
    else{
        echo "please check your login credential !";

    }
    die;
}
?>