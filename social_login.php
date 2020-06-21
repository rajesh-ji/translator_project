<?php include('config.php');

if(!empty($_POST)){
	$social_id = isset($_POST['user_id']) ? $_POST['user_id']:'';
	$first_name = isset($_POST['first_name'])?$_POST['first_name']:'';
	$last_name = isset($_POST['last_name'])?$_POST['last_name']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';
	$picture = isset($_POST['picture'])?$_POST['picture']:'';
	$gender = isset($_POST['gender'])?$_POST['gender']:'';
	$login_type = isset($_POST['login_type'])?$_POST['login_type']:'';
	$role_id=2;
	$status=2;
	$name = $first_name ." ".$last_name;
	$is_active='1';
	$sql="select * from users where social_id='{$social_id}' limit 1";
	$res = mysqli_query($conn,$sql);
	if($res && mysqli_num_rows($res) ==0){

		$insert = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `mobile`, `profile_pic`, `address1`, `address2`, `role_id`, `zip_code`, `dob`, `latitute`, `longitute`, `image`, `bio`, `social_id`, `status`, `created_utc`, `last_login`, `is_active`,`is_translator`, `login_type`) VALUES ('{$name}','','','{$email}','','','','','{$role_id}','0','0','','','{$picture}','','{$social_id}','{$status}','','','{$is_active}','1','{$login_type}')";
		mysqli_query($conn,$insert);
		$id = mysqli_insert_id($conn);
//insert record in translator_data table
mysqli_query($conn, "INSERT INTO `traslator_data`(`user_id`) VALUES ('$id')");
		if(!empty($id)){
			$_SESSION['login_id'] = 2;
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['image'] = $picture;
            $_SESSION['email'] = $email;
            $data['status']=true;
            $data['location']=$site_url."/usertype.php?rn=".$id;
            $data['message']='User login successfully';
            $data['data']=$_SESSION;
		}
		else{
			$data['status']=false;
            $data['message']='Unable to insert your data';
		}
	}
	else{
		$row  = mysqli_fetch_assoc($res);
		$_SESSION['login_id'] = 2;
//insert record in translator_data table
$userID = $row['id'];
mysqli_query($conn, "INSERT INTO `traslator_data`(`user_id`) VALUES ('$userID')");
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role_id'] = $row['role_id'];
        $data['data']=$_SESSION;
        $data['status']=true;
        $location="/instant_quote.php";
        if($row['id']==3){
        	$location="/admin";
        }
        $data['location']=$site_url.$location;
        $data['message']='You are already registered with us';
	}
	echo json_encode($data);
	exit;
}
?>