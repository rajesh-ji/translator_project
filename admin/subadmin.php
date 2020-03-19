<?php include('include/header.php');
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($conn, "select * from users where id = '$user_id'");
    $rd = mysqli_fetch_assoc($query);
   
   
?>
<div class="page-wrapper">
                <div class="container-fluid">
                            <div class="card mt-2">
                                <h2 class="card-header bg-info text-white">
                                    Sub Admin Signup
                                </h2>
                                    <div class="card-body">
                                    <form action="#" method="POST">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter subadmin name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Username</label>
                                                <input type="text" name="username" class="form-control" placeholder="Enter Username">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="***********">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Mobile</label>
                                                <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile number">
                                            </div>

                                            <div class="form-group">    
                                                <label for="name">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-info text-uppercase">Add Subdmin</button>
                                        </form>
                                    </div>
                            </div>
                    </div>
            <footer class="footer">
                © 2017 Material Pro Admin by wrappixel.com
            </footer>
        </div>
    </div>
    <?php include('include/footer.php');?>
<?php if(isset($_POST['submit'])){
        extract($_POST);
        print_r($_POST);
        $username =  $_POST['username'];
        $checking = mysqli_query($conn, "select * from users where username = '$username'");
        $countResult = mysqli_num_rows($checking);
        if($countResult>0){
            echo "<script>alert('This username already exists, please try new one');</script>";
        }else{
            echo $sql = "INSERT INTO `users`( `name`, `username`, `password`, `email`, `mobile`, `address`, `role_id`, `zip_code`, `dob`, `latitute`, `longitute`, `image`, `bio`, `social_id`)
            VALUES ('$name','$username','$password','$email','$mobile')";
            
            $query = mysqli_query($conn, $sql);
   
            if($query){
                echo "<script>alert('Sub Admin successfully Added');</script>";
            }else{
               echo "<script>alert('Sub Admin successfully Added');</script>";
            }
   
        }
        

}?>



