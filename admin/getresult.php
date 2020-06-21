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
     else if($_POST['tranInfo']){
        include('include/config.php');
        $id= $_POST['id'];
        $tmpquery = mysqli_query($conn, "SELECT   `translator_id`, `conversion_id` FROM `user_request` WHERE id = '$id'");
        $tmpdata = mysqli_fetch_assoc($tmpquery);
        $converID = $tmpdata['conversion_id'];
        $oldTran = $tmpdata['translator_id'];
        $getTranId = mysqli_query($conn, "SELECT `id`, `name` FROM `users` WHERE id IN(SELECT  `user_id` FROM `tras_service` WHERE `lang_conversion_id` = '$converID' AND status = '1' AND user_id NOT IN('$oldTran') GROUP BY`user_id`)");//
        $datanaw ='';
        while($row = mysqli_fetch_assoc($getTranId)){
            $datanaw.="<option value='".$row['id']."'>".$row['name']."</option>";
        }
       echo $datanaw;
    }
?>