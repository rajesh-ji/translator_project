<?php 
                                        if(isset($_POST['submit'])){
                                            include('include/config.php');
                                            
                                             $lang_name = $_POST['lang'];
                                       echo $add_lang = "INSERT INTO `system_lang`(`name`) VALUES ('$lang_name')";
                                       
                                       $qy = mysqli_query($conn,$add_lang);
                                            echo "<script>alert('language added');</script>";
                                            header('Location: index.php');
                                       // die;
                                        }