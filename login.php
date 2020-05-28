<?php
if(isset($_POST['mgs'])){
    include('config.php');
    extract($_POST);
   
   
    $userRole = $_POST['login_with'];
     
//    echo $userRole."<br>";
   // echo  $sql = "select * from users where username = '$username' and role_id = '$userRole'";
    
    $result = mysqli_query($conn, "select * from users where username = '$username' and role_id = '$userRole'");
    if(mysqli_num_rows($result)>0){
        $rd = mysqli_fetch_assoc($result);
        // print_r($rd);
		// die;
        if($password == $rd['password']){
            if($rd['role_id']==2){
                $last_login = date('Y-m-d h:i:s');
                $id = $rd['id'];
                $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
                 $_SESSION['login_id'] = $rd['role_id'];
                $_SESSION['user_id'] = $rd['id'];
                $res['status']=true;
                $res['location']='dashboard.php';     
            }else{
                if($rd['status']==2){
                    $res['status']=false;
                    $res['mgs']='Your Account is Blocked,Contact Support';
                    // $result['status']='admin/index.php';
                }else{
                                    
                    $last_login = date('Y-m-d h:i:s');
                    $id = $rd['id'];
                    $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
                     $_SESSION['login_id'] = $rd['role_id'];
                    $_SESSION['user_id'] = $rd['id'];
                    $res['status']='true';
                    $res['location']='admin/index.php';
                    
            }
                
                }
        }else{
            $res['status']=false;
            $res['mgs']='Wrong password';

        }
    
    }
    else{
        $res['status']=false;
        $res['mgs']='Account not exit in system, Create your account';


    }
    // print_r($res) ;   
   
    echo  json_encode($res);
	die;
}
?>