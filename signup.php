<?php
if(isset($_POST['mgs'])){
    include('config.php');
    extract($_POST);
    

    $sql = "select * from users where username = '$username'";
    $query  = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query)>0){
        $result['status']= 'false';
        $result['mgs']= 'this username already exists';
    }else{
        if($type=='2'||$type=='3'){
            $query=  mysqli_query($conn, "insert into users(username,password,role_id) values('$username','$password','$type')");
            if($query){
                if($type=='2'){
                    $last_inserted_id = mysqli_insert_id($conn);
                    $last_login = date('Y-m-d h:i:s');
                $id = $last_inserted_id;
                $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
                $_SESSION['login_id'] = $rd['role_id'];
                $_SESSION['user_id'] = $rd['id'];
                $result['status']= 'true';
                $result['location']= 'index.php';
                }
                else{
                    $inserted_user_id =  mysqli_insert_id($conn);
                    $_SESSION['last_inserted_id'] = $inserted_user_id; 
                    $_SESSION['login_id'] = 3;
                    $_SESSION['user_id'] = $inserted_user_id;
                
                    $tran_data_query = mysqli_query($conn,"insert into traslator_data(user_id) value('$inserted_user_id')");
                    $result['status']= 'true';
                    $result['location']= 'admin/profile.php';
                }
            }
        }
        else{
            $result['status']= 'false';
            $result['mgs']= 'please select type';
        }
    }


     echo  json_encode($result);
    die;

}
?>