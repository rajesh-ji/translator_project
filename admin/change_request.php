<?php include('include/config.php');?>

<?php 
if(!empty($_GET['request_id'])){
    $request_id = $_GET['request_id'];
    if($_GET['type']=='accept'){
    	$type='accepted';
    	$sql = "update user_request set request_status='$type', status='processing' where id='{$request_id}' limit 1";
    	mysqli_query($conn,$sql);
    }elseif($_GET['type']=='reject'){
    	$type='rejected';
    	$sql = "update user_request set request_status='$type' where id='{$request_id}' limit 1";
    	
        $get_req = mysqli_query($conn,"select * from user_request where id=$request_id limit 1");
        if(mysqli_num_rows($get_req)){
            $request_data = mysqli_fetch_assoc($get_req);
            mysqli_query($conn,$sql);
            // echo "<pre>";print_r($request_data);
            $from_lang =  $request_data['from_lang'];
            $to_lang =  $request_data['to_lang'];
            $old_translator_id = $request_data['translator_id'];
            $lang_conversion_id = $from_lang.",".$to_lang;
            $doc_type = $request_data['doc_type'];
            $doc_path = $request_data['doc_path'];
            $amount = $request_data['amount'];
            $login_with = $request_data['price_type'];
            $delivery_date = $request_data['delivery_date'];
            $zone = $request_data['zone'];
            $customer_id = $request_data['customer_id'];
            $word_count = $request_data['word_count'];
                    
            $sql =  "select lc.*,tras_service.lang_conversion_id,tras_service.user_id from tras_service 
            inner join lang_conversion as lc on tras_service.lang_conversion_id=lc.id
            where lc.from_lang_id in($from_lang) and lc.to_lang_id in($to_lang) and tras_service.user_id !=$old_translator_id group by lc.id";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)){
                while ($trans_data=mysqli_fetch_assoc($res)) {
                    // print_r($trans_data);
                    $trans_id = $trans_data['user_id'];
                    // $fee = $trans_data['rush_fee'];
                    $fee = 20;
                    $conversion_id = $trans_data['lang_conversion_id'];
                    $from_lang_id = $trans_data['from_lang_id'];
                    $to_lang_id = $trans_data['to_lang_id'];
                    $transation_id = $trans_data['user_id']; 
                    // $per_word_amount = $trans_data['per_word_amount'];
                    $per_word_amount = 100;
                    $amount = $word_count*($fee/$per_word_amount);
                    $insert = "INSERT INTO `user_request`(`customer_id`, `translator_id`, `doc_type`, `doc_path`, `conversion_id`, `amount`, `delivery_date`,price_type,zone,transation_id,from_lang,to_lang) VALUES ($customer_id,$trans_id,'{$doc_type}','{$doc_path}',$conversion_id,'{$amount}','{$delivery_date}','{$login_with}','{$zone}','{$transation_id}','{$from_lang_id}','{$to_lang_id}')";
                    mysqli_query($conn,$insert);   
                }
            }
        }
    }
    elseif($_GET['type']=='delete'){
    	$type='delete';
    	$sql = "delete from user_request where id='{$request_id}' limit 1";
    	mysqli_query($conn,$sql);
    }
    
}
header('location: request.php');
?>

