<?php
include_once 'config.php';
include_once 'common_function.php';

if(!empty($_POST)){
	$customer_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'0';
	$doc_type = $_POST['subject'];
    $login_with = $_POST['login_with'];
    $zone = $_POST['zone'];
    $word_count = $_POST['word_count'];
	$delivery_date = isset($_POST['delivery_date'])?date('Y-m-d',strtotime($_POST['delivery_date'])):'';
	
    if($login_with =='auto_bid'){
        $delivery_date = date('Y-m-d H:i',strtotime("+4 day"));    
    }
    else{
        $time_slot = date('H:i',strtotime($_POST['time_slot']));
        $delivery_date= $delivery_date." ".$time_slot;
    }
    $doc_path="";
    if(!empty($_FILES['doc']['name'])){
        $file_data = fileupload($_FILES['doc']);
        if(!empty($file_data['filename'])){
            $doc_path = $file_data['filename'];    
        }
    }
    
	$conversion_id="";
    $from_lang =  $_POST['from_lang_id'];
    $to_lang =  $_POST['to_lang_id'];
    if(is_array($to_lang)){
        $to_lang = implode(',', $to_lang);
    }
    $lang_conversion_id = $from_lang.",".$to_lang;
    $get_sql = mysqli_query($conn,"select * from lang_conversion where from_lang_id in($from_lang) and to_lang_id in($to_lang)");
    $per_word_amount = 0;
    if(mysqli_num_rows($get_sql)){
        while ($r = mysqli_fetch_assoc($get_sql)) {
           $per_word_amount = $per_word_amount+$r['per_word_amount']; 
        }
    }
	$amount_data = getRequestAmount($delivery_date,$doc_type,$per_word_amount,$word_count);
	$subject_fee = $amount_data['subject_fee'];
    $delivery_rush_fee = $amount_data['delivery_rush_fee'];
    $sql =  "select lc.*,tras_service.lang_conversion_id,tras_service.user_id from tras_service 
    inner join lang_conversion as lc on tras_service.lang_conversion_id=lc.id
    where lc.from_lang_id in($from_lang) and lc.to_lang_id in($to_lang) group by lc.id";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)){
    	while ($row=mysqli_fetch_assoc($res)) {
    		$translator_id = $row['user_id'];
    		$lang_data[$translator_id] = $row;
    	}
    }
    $translator_ids = explode(',', $_POST['translator_ids']);
    $total_amount = $amount_data['total_amount'];
    $trans_sql = "INSERT INTO `payment`(`status`,amount,per_word_fee,subject_fee,delivery_fee) VALUES ('pending','{$total_amount}','{$per_word_amount}','{$subject_fee}','{$delivery_rush_fee}')";
    mysqli_query($conn,$trans_sql);
    $transation_id = mysqli_insert_id($conn);
    // print_r($lang_data);
    foreach($translator_ids as $trans_id){
        // echo $trans_id;
        if(empty($lang_data[$trans_id])){
            continue;
        }
    	$trans_data = $lang_data[$trans_id];
    	// $fee = $trans_data['rush_fee'];
        $fee = 20;
    	$conversion_id = $trans_data['lang_conversion_id'];
        $from_lang_id = $trans_data['from_lang_id'];
        $to_lang_id = $trans_data['to_lang_id'];
    	// $per_word_amount = $trans_data['per_word_amount'];
        $per_word_amount = 100;
    	$amount = $amount_data['total_amount'];
    	$insert = "INSERT INTO `user_request`(`customer_id`, `translator_id`, `doc_type`, `doc_path`, `conversion_id`, `amount`, `delivery_date`,price_type,zone,transation_id,from_lang,to_lang,word_count) VALUES ($customer_id,$trans_id,'{$doc_type}','{$doc_path}',$conversion_id,'{$amount}','{$delivery_date}','{$login_with}','{$zone}','{$transation_id}','{$from_lang_id}','{$to_lang_id}','{$word_count}')";
    	mysqli_query($conn,$insert);   
	}
	echo json_encode(['status'=>'success','url'=>$site_url."/order.php?rn=$transation_id","message"=>"Your query submitted successfully. we will contact you shortly."]);
}
else{
	echo json_encode(['status'=>'error','url'=>"","message"=>"Sorry we are unable to assist you, please contact our customer Executive."]);	
}


function fileupload($file){
    // Upload file 
    $uploadDir = 'docs/'; 
    if(!file_exists($uploadDir)){
        mkdir($uploadDir,0777,true);
    }
    if(!empty($file["name"])){ 
         
        // File path config 
        $fileName = basename($file["name"]); 
        $targetFilePath = $uploadDir . $fileName; 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to the server 
            if(move_uploaded_file($file["tmp_name"], $targetFilePath)){ 
                $response['status'] = 0; 
                $response['filename'] = $fileName; 
                $response['message'] = "file uploaded successfully"; 
            }else{ 
                $response['status'] = 0; 
                $response['message'] = 'Sorry, there was an error uploading your file.'; 
            } 
        }else{ 
            $response['status'] = 0;
            $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
        }
        return $response; 
    } 
}
?>