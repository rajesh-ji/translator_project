<?php 
if(isset($_POST['active'])){
	include('include/config.php');
	$mgs = $_POST['active'];
	$id = $_POST['id'];
	if($mgs =="active"){
		$sql = "update system_lang set status = '1' where id = '$id'";
		$query = mysqli_query($conn, $sql);
		if($query){
			echo "successfully updated";
		}else{
			echo mysqli_error();
		}
	}
}
// for block
elseif(isset($_POST['block'])){
	include('include/config.php');
	$mgs = $_POST['block'];
	$id = $_POST['id'];
	if($mgs =="block"){
		$sql = "update system_lang set status = '0' where id = '$id'";
		$query = mysqli_query($conn, $sql);
		if($query){
			echo "successfully updated";
		}else{
			echo mysqli_error();
		}
	}
	
}
?>