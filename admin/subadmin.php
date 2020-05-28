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
                                    <form action="subadmin.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                                <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Password</label>
                                                            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Mobile </label>
                                                            <input type="number" name="mobile" class="form-control" placeholder="Enter mobile number...." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Zipcode</label>
                                                            <input type="number" name="zipcode" class="form-control" placeholder="Enter zipcode" required>
                                                        </div>
                                                        <div class="form-group">    
                                                            <label for="name">Image</label>
                                                            <input type="file" name="image" class="form-control" >
                                                        </div>  
                                                         
                                                </div>
                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                            <label for="name">Username</label>
                                                            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Address</label>
                                                            <input type="text" name="address" class="form-control" placeholder="Address....." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">D.O.B</label>
                                                            <input type="date" name="dob" class="form-control" required >
                                                        </div>
                                                        <div class="form-group">    
                                                            <label for="name">BIO</label>
                                                            <textarea rows="5" name="bio" class="form-control form-control-line" required></textarea>
                                                        </div>
                                                            </div>
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
        // print_r($_POST);
        
        $username =  $_POST['username'];
        $checking = mysqli_query($conn, "select * from users where username = '$username'");
        $countResult = mysqli_num_rows($checking);
        if($countResult>0){
            echo "<script>alert('This username already exists, please try new one');</script>";
        }else{
                    // 
                                if(isset($_FILES['image'])){
                                  $errors= array();
                                  $file_name = $_FILES['image']['name'];
                                  $file_size =$_FILES['image']['size'];
                                  $file_tmp =$_FILES['image']['tmp_name'];
                                  $file_type=$_FILES['image']['type'];
                                  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                                  
                                  $extensions= array("jpeg","jpg","png");
                                  
                                  if(in_array($file_ext,$extensions)=== false){
                                     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                                  }
                                  
                                  if($file_size > 2097152){
                                     $errors[]='File size must be excately 2 MB';
                                  }
                                  
                                  if(empty($errors)==true){
                                     move_uploaded_file($file_tmp,"users/".$file_name);
                                     echo "Success";
                                  }else{
                                     print_r($errors);
                                  }
                               }
                               else{
                                   $file_name = '';
                               }
                    // 



             $sql = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `mobile`, `address1`, `role_id`, `zip_code`, `dob`, `image`, `bio`)
            VALUES ('$name','$username','$password','$email','$mobile','$address','1','$zipcode','$dob','$file_name','$bio')";
            
            $query = mysqli_query($conn, $sql);
   
            if($query){
                echo "<script>alert('Sub Admin successfully Added');</script>";
            }else{
               echo "<script>alert('error');</script>";
            }
   
        }
        

}?>



