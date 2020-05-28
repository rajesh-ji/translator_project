<?php
// error_reporting(0);
$errors ='';
if($_POST['submit']=='Send')
{
    //keep it inside
    $email=$_POST['email'];
    $password = $_GET['password'];
    inlcude('config.php');
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query = mysqli_query($con,"SELECT * FROM users WHERE email='$email'")
    or die(mysqli_error($con));
    if (mysqli_num_rows ($query)==1)
    {
        $code= rand(100,999);
        $message="You activation link is:http://www.soengsouy.com/Sign-Up/.php?email=$email&code=$code";
        mail($email, "Send Code", $message);
        echo 'Email sent';
        $query2 = mysqli_query($con,"UPDATE password SET password='$password' WHERE email='$email'")
        or die(mysqli_error($con)); 
        }
        else
        {
       $errors = '<div class="alert alert-danger" role="alert">Sorry, Your emails does not exists in our record database</div>';
    }
}
?>