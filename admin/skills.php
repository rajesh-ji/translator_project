<?php 
if(isset($_POST['skillSubmit'])){
    include('include/config.php');
    extract($_POST);
    // print_r($_POST);
   $user_id = $_SESSION['user_id'];
  
    $list=  array_values($_POST);
    
//    echo '<br>';
    $newSkill =  implode(",",$list);
    // echo $newSkill;
  echo   $sql = "update traslator_data set tool_skill_list = '$newSkill' where user_id = '$user_id'";
  
    
    $query = mysqli_query($conn,$sql);
    if($query){
            
           $_SESSION['update_success']='**skill successfully updated'; 
           header('Location:profile.php');
    }
    else{
        $_SESSION['update_error']='**Sql Error';
        header('Location:profile.php');
    }
}

?> 