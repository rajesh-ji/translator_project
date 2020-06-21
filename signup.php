<?php
if(isset($_POST['mgs'])){
    include('config.php');
    extract($_POST);
    // print_R($_POST);
	// die;

    $sql = "select * from users where username = '$username'";
    $query  = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query)>0){
        $result['status']= 'false';
        $result['mgs']= 'Username already exists';
    }else{
        if($type=='2'||$type=='3'){    
			  $insert= "insert into users(name,username,password,role_id,email) values('$name','$username','$password','$type','$emnail')";
			
            $query=  mysqli_query($conn,$insert);
			$last_inserted_id = mysqli_insert_id($conn);
            if($query){
                
				 $last_login = date('Y-m-d h:i:s');
                $id = $last_inserted_id;
                $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
				    $userdata = "select * from users where id = '$last_inserted_id'";
					$query2  = mysqli_query($conn, $sql);
				$rd=mysqli_fetch_assoc($query2);
				
              
                $_SESSION['user_id'] = $rd['id'];
                $_SESSION['name'] = $rd['name'];
                if($type=='2'){
					  $_SESSION['login_id'] = 2;
                  $result['status']= 'true';
                $result['location']= 'instant_quote.php';
                }
                else{
                   
                    $_SESSION['last_inserted_id'] = $last_inserted_id; 
                    $_SESSION['login_id'] = 3;
                    $_SESSION['user_id'] = $last_inserted_id;
                    $_SESSION['admin_id']= $last_inserted_id;
					$_SESSION['name'] = $rd['name'];
                    $tran_data_query = mysqli_query($conn,"insert into traslator_data(user_id) value('$last_inserted_id')");
                    $result['status']= 'true';
                    $result['location']= 'admin/profile.php';
                }   
            }
			else
			{
			    $result['status']= 'false';
				$result['mgs']= 'Failed to insert';	
			}
        }
        else{
            $result['status']= 'false';
            $result['mgs']= 'Please select user type';
        }
    }


     echo  json_encode($result);
    die;

}
?>