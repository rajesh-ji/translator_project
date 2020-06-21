<?php 
include('include/config.php');
if(!isset($_SESSION['login_id'])==''){
    header('Location: index.php');
}?>
<?php
    if(isset($_POST['submit'])){
        
        
        // echo "<script>alert('submit called');</script>";
        extract($_POST);
    //    print_r($_POST);
       // die;
        $sql = "select *  from users where username = '$username' and role_id = '1'  ";
       
        
        $result = mysqli_query($conn, "select *  from users where username = '$username' and role_id  = '1' ");
       $count = mysqli_num_rows($result);
       
        if($count>0){
            $rd = mysqli_fetch_assoc($result);
        //     print_r($rd);
            if($rd['password']==$password){
               
          // $_SESSION['admin_login'] = $rd['role_id'];
          $_SESSION['admin_id'] = $rd['id'];
          $_SESSION['login_id'] = 1;
        //   echo $_SESSION['login_id'];
        //   echo $_SESSION['user_id'];
        $last_login = date('Y-m-d h:i:s');
        $id = $row['id'];
        $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
               header('Location: index.php');
            die;
            }else{
                $_SESSION['error'] = "Password missmatch !";
            }
            
        }
        else{
           $_SESSION['error'] =  "cann't find details with this username";
        }
          
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin || Imo Service</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    

</head>

<body>
   
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" action="login.php" method="POST">
                    <?php if(isset($_SESSION['error'])){
                        echo "<p style='color:red;'>".$_SESSION['error']."</p>";
                        $_SESSION['error'] = '';
                    }?>
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="username" type="text" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password"> 
                        </div>

                    </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <!-- <div class="checkbox checkbox-primary  p-t-0">
                                <input id="checkbox-signup" name="remember" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                             </div> <a  class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div> 
                    </div> -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button type="submit"  name="submit"  class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Log In</button>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a  class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a  class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus" style="width:50%"></i> </a>
                            </div>
                        </div>
                    </div> -->
                   
                </form>

              


            </div>
          </div>
        </div>
        
    </section>
   
</body>

</html>

