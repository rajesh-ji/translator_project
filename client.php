<?php
    if(isset($_POST['mgs'])){
       
        include('config.php');
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
       
        
        $query = mysqli_query($conn, "select * from users where username = '$username' and email = '$email'");
        $count = mysqli_num_rows($query);

        
        if($count==0){
            
            $insertquery = mysqli_query($conn, "insert into users (`username`,`password`,`email`,`role_id` ) value('$username','$pass','$email','2')");
            $inserted_user_id =  mysqli_insert_id($conn);
            $_SESSION['user_id'] = $inserted_user_id;  
            echo "success";
        }
        else{
          echo "fail";
        }
    }
    