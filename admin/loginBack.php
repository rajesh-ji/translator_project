<?php
    if(isset($_POST['submit'])){
        
        include('include/config.php');
        // echo "<script>alert('submit called');</script>";
        extract($_POST);
       print_r($_POST);
       // die;
       echo $sql = "select *  from users where username = '$username' and role_id NOT IN ('1','3') ";
       
        
        $result = mysqli_query($conn, "select *  from users where username = '$username' and role_id  IN ('1','3') ");
       
       
        if($result){
            $rd = mysqli_fetch_assoc($result);
        //     print_r($rd);
            if($rd['password']==$password){
               
          $_SESSION['login_id'] = $rd['role_id'];
          $_SESSION['user_id'] = $rd['id'];
          echo $_SESSION['login_id'];
          echo $_SESSION['user_id'];
             
               header('Location: index.php');
            
            }else{
                echo "Password missmatch !";
            }
            
        }
        else{
            echo "cann't find details with this username";
        }
          
    }
    else{
        echo "try with another way!";
    }

?>