<?php
include('include/config.php');
extract($_POST);
//print_r($_POST);

foreach($id as $lang_id){
   $sql_query = "insert into tras_service(lang_conversion_id,user_id, status) value('$lang_id','$user_id','1')";
  $query = mysqli_query($conn,$sql_query);
}

// $sql_query = "insert into tras_service(lang_conversion_id,user_id, status) value('$lang_id','$user_id','1')";

if($query){
   header('Location: userrequest.php?mgs="success"');
}else{header('Location: userrequest.php?mgs="failed"');;}
?>