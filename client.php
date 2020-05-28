<?php
    if(isset($_POST['mgs'])){
       
        include('config.php');
        $username = $_POST['username'];
        $pass =  $_POST['pass'];
        $email = $_POST['email'];
        
        $query = mysqli_query($conn, "select * from users where username = '$username' or email = '$email'");
        $count = mysqli_num_rows($query);

        
        if($count==0){
            
            $insertquery = mysqli_query($conn, "insert into users (`username`,`password`,`email`,`role_id` ) value('$username','$pass','$email','3')");
            if($insertquery){
                $inserted_user_id =  mysqli_insert_id($conn);
                $_SESSION['last_inserted_id'] = $inserted_user_id; 
                $_SESSION['login_id'] = 3;
                $_SESSION['user_id'] = $inserted_user_id;
                
                $tran_data_query = mysqli_query($conn,"insert into traslator_data(user_id) value('$inserted_user_id')");
                echo  'success';
            }else{
                echo 'failed';
            }
           
        }else{
            echo 1;
          }
        
        
    }
    

   

    