<?php 
if(isset($_POST['mgs'])){
    include('include/config.php');
    extract($_POST);
    $username = $_POST['username'];
    $sql = "select * from users where username = '$username' and id not in ('$user_id') ";    
   $checkusername = mysqli_query($conn, $sql);
   $checkusernamecount = mysqli_num_rows($checkusername);
   if($checkusernamecount>0){
       echo "<script>alert('This username already exists please try new one!');</script>";
       // $_SESSION['profile_update_error']= 'this username already exists please try new one!';
   }else{
       $file_name='userone.jpg';
        $update_query ="UPDATE users SET name='$name',username='$username',password='$password',email='$email',mobile='$mobile',address1='$address',bio='$bio',image='$file_name' where id='$user_id'";
//    die;
   $update_profile = mysqli_query($conn,$update_query);
   if($update_profile){
       // echo "<script>alert('Profile Updated!');</script>";
    //    header("Location: profile.php");
    //     exit;
    echo true;
   }
   else{
    //    echo "<script>alert('Internal error');</script>";
       // $_SESSION['profile_update_error'] = 'Internal error';
       echo false;
   }
   }                  
   
}
?>
<!-- update translator profile -->
