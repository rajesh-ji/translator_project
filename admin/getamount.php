<?php
if(isset($_POST['mgs'])){
	include('include/config.php');
	$mgs = $_POST['mgs'];
	$id = $_POST['id'];
	// echo "<script>alert('$id');</script>"
	$query = mysqli_query($conn, "select fee from my_doc_rushfee where id = '$id'");
	if($query){
		$rd = mysqli_fetch_assoc($query);
		$amount = $rd['fee'];
		echo $amount;
	}
	else{
		echo "null";
	}


}



?>