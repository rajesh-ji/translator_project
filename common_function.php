<?php
include_once 'config.php';

function getRequestAmount($delivery_date,$subject,$per_word_amount,$word_count){
	global $conn;
	$date1=date_create(date('Y-m-d H:i'));
	$date2=date_create($delivery_date);
	$diff=date_diff($date1,$date2);

	$query4=mysqli_query($conn,"select * from my_doc_rushfee where id=".$subject);
    $subject_data = mysqli_fetch_assoc($query4);
    $subject_fee = $subject_data['fee'];

	$days = $diff->format("%a");
	$delivery_rush_fee=0;
	// echo "select * from delivery_fee where min <=$days and max >= $days limit 1";
	$query3=mysqli_query($conn,"select * from delivery_fee where min >=$days and max <= $days limit 1");
	if($query3 &&  mysqli_fetch_assoc($query3)){
		$delivery_data = mysqli_fetch_assoc($query3);
		$delivery_rush_fee = $delivery_data['fee'];	
	}
	
	$word_count_amount = $per_word_amount*$word_count;
	$total_amount = $word_count_amount + $subject_fee + $delivery_rush_fee;
	return array('subject_fee'=>$subject_fee,'delivery_rush_fee'=>$delivery_rush_fee,'total_amount'=>$total_amount);
}