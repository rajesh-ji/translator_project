<?php 
if(isset($_POST['mgs'])){
	include('include/config.php');
	$mgs = $_POST['mgs'];
	$id = $_POST['id'];
	if($mgs =='active'){
		$sql = "update users set status = '1' where id = '$id'";
		$query = mysqli_query($conn, $sql);
		if($query){
			die("true");
		}else{
			die("false");
		}
	}
	elseif($mgs =='block'){
		$sql = "update users set status = '0' where id = '$id'";
		$query = mysqli_query($conn, $sql);
		if($query){
			die("true");
		}else{
			die("false");
		}
	}
	else{
		die("false");
	}
}

?>