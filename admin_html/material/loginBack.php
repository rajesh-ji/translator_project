<?php
    if(isset($_POST['submit'])){
        session_start();
        include('include/config.php');
       
        extract($_POST);
        print_r($_POST);
       
       
        
        $result = mysqli_query($conn, "select *  from users where username = '$username' and role_id =  '1'");
       
       
        if($result){
            $rd = mysqli_fetch_assoc($result);
       
            if($rd['password']==$password){
               
          $_SESSION['login_id'] = $rd['role_id'];
          $_SESSION['user_id'] = $rd['id'];
          echo $_SESSION['login_id'];
          echo $_SESSION['user_id'];
          

               header('Location: index.php');
            
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