<?php 
    if(isset($_POST['mgs'])){
        include('include/config.php');
        
        
        $user_id = $_POST['id'];
        
        $query = mysqli_query($conn,"SELECT name FROM `users` WHERE id IN (SELECT user_id FROM `tras_service` WHERE `lang_conversion_id` = '$user_id')");
        // $count = mysqli_num_rows($query);
        $ts = "<table class='display nowrap table table-hover table-striped table-bordered'>";
        $ts .="<tr>";
        $ts .="<td>Id</td>";
        $ts .="<td>Translator Name</td>";
        $ts .="<tr>";
        $id = 1;
        
            while($rd = mysqli_fetch_assoc($query)){
                
                $ts .= "<tr>";
                $ts .= "<td>".$id."</td>";
                $ts .= "<td>".$rd['name']."</td>";
                
                $ts .= "</tr>";
              $id++;  
            }
            $ts .= "</table>";
            echo $ts;
            
    }
    else if(isset($_POST['translator'])){
        include('include/config.php');
        $user_id = $_POST['id'];
        $sql_query = "select * from users where role_id = '3' and status = '1' and `id` NOT IN (SELECT user_id FROM tras_service WHERE lang_conversion_id = '$user_id')
        ";
        $query =  mysqli_query($conn, $sql_query);
        $op = "";
        while($rd = mysqli_fetch_assoc($query)){
            $op .= "<option value=".$rd['id'].">".$rd['name']."</option>";
        }
        echo $op;
    }
?>