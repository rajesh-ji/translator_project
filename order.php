<?php
include_once 'config.php';
include_once 'header.php';
?>
<section>
    <?php
    $request_id = $_GET['rn'];
    $res = mysqli_query($conn,"select user_request.*,d.doc_type as subject,system_lang.name as from_lang_name from user_request inner join system_lang on system_lang.id=user_request.from_lang
        inner join my_doc_rushfee as d on d.id=user_request.doc_type
         where transation_id=$request_id limit 1");
    $request = mysqli_fetch_assoc($res);

    $res = mysqli_query($conn,"select * from payment where transation_id=$request_id limit 1");
    $payment = mysqli_fetch_assoc($res);
	$login_user_id=$_SESSION['user_id'];
     $user_q = mysqli_query($conn,"select * from users where id=$login_user_id limit 1");
    $user_d = mysqli_fetch_assoc($user_q);   
	// print_R($user_d);
	// die;
    $lang_res = mysqli_query($conn,"select system_lang.name from system_lang  inner join user_request on system_lang.id=user_request.to_lang where transation_id=$request_id and user_request.status='pending'");
    // print_r($request);
    if(!empty($_POST)){
    
    $project_name = $_POST['project_name'];
    $note = $_POST['note'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $zipcode = $_POST['zipcode'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $company = $_POST['company'];
    $phone_number = $_POST['phone_number'];
    
    $amount = $request['amount'];
    $amount = 1;
    mysqli_query($conn,"update user_request set pname='{$project_name}',note='{$note}' where transation_id=$request_id");
    mysqli_query($conn,"update payment set 
        address1='{$address1}',
        address2='{$address2}', 
        zipcode='{$zipcode}', 
        state='{$state}', 
        city='{$city}', 
        phone_number='{$phone_number}', 
        company='{$company}' 
        where transation_id=$request_id");

?>
    <form id="paypal_form" action="<?php echo $paypalUrl; ?>" method="post">

    <div class="panel price panel-red" style="padding:50px 5px;">

        <input type="hidden" name="business" value="<?php echo $paypalId; ?>">

        <input type="hidden" name="cmd" value="_xclick">

        <input type="hidden" name="item_order_id" value="<?php echo time()?>">

        <input type="hidden" name="item_name" value="koofamilies Order">

        <input type="hidden" name="item_number" value="1">

        <input type="hidden" name="no_shipping" value="1">

        <input type="hidden" name="currency_code" value="USD">

        <input type="hidden" name="cancel_return" value="<?php echo $paypal_cancel_url." &sid=".$request['transation_id']; ?>">

        <input type="hidden" name="return" value="<?php echo $paypal_success_url; ?>">

        <input style="display:none;" type="number" class="form-control" id="paypal_amount" value="<?php echo $amount;?>" name="amount" placeholder="Amount (in MYR)">
    </div>
</form>
<script type="text/javascript">  
    document.getElementById("paypal_form").submit();
</script>
<?php
die('please wait .....');
}

?>
<div class="container">
    <div class="page-wrapper">
        <div class="row"><h4>Project Information</h4></div>
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-10 col-xs-10">
                            <form method="post" id="pay">
                                <input type="hidden" name="request_id" value="<?php echo $_GET['rn'];?>">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <small class="card-title">Project Name</small>
                                              <input class="form-control" type="text" name="project_name" placeholder="Project Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                             
										<small class="card-title">Email *  (we will send traslated data on that email)</small>
                                                <input class="form-control" required value="<?php if(isset($user_d['email'])){ echo $user_d['email'];} ?>" type="text" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                               
												<small class="card-title">Phone Number *</small>
                                                <input class="form-control" value="<?php if(isset($user_d['mobile'])){ if($user_d['mobile']!=0) echo $user_d['mobile'];} ?>"  type="text" name="phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
											<small class="card-title">Company *</small>
                                               
                                                <input class="form-control" type="text" name="company" placeholder="Company">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                               
												<small class="card-title">Address 1</small>
                                             
                                                <input class="form-control" type="text" name="address1" placeholder="Address 1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-body">
                                              
												<small class="card-title">Address 2 *</small>
                                             
                                                <input class="form-control" type="text" name="address2" placeholder="Address 2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                             
												<small class="card-title">State *</small>
                                             
                                                <input class="form-control" type="text" name="state" placeholder="State">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                                
												<small class="card-title">City *</small>
                                             
                                                <input class="form-control" type="text" name="city" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                               
												<small class="card-title">Zip Code *</small>
                                             
                                                <input class="form-control" type="text" name="zipcode" placeholder="Zipcode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                             
                                                <textarea name="note" class="form-control" placeholder="Note for translator"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card">

                                            <div class="card-body">
                                                <h4 class="card-title"></h4>
                                                <button type="submit" class="btn btn-info">Make Payment</button></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row" style="border-bottom: 1px solid #ccc;margin:25px 0 25px 0;font-size: 14px;font-weight: bold;padding-bottom: 20px;">
                    <div class="col-md-6">ORDER SUMMARY </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="padding: 10px;">From <strong style="color: #000;"><?php echo $request['from_lang_name'];?></strong> to : 
                    <p>
                        <?php if(mysqli_num_rows($lang_res)):
                                while ($lang = mysqli_fetch_assoc($lang_res)):?>
                        <span style="border: 1px solid#ccc;padding: 3px 8px 3px 8px;border-radius: 12px;"><?php echo $lang['name'];?></span>
                    <?php endwhile;endif;?>
                    </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">Delivery Date</div><div class="col-md-6"><?php echo date('D d M h A',strtotime($request['delivery_date']));?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">Subject</div><div class="col-md-6"><?php echo $request['subject'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">Word Count</div><div class="col-md-6"><?php echo $request['word_count'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">Price Per Word</div><div class="col-md-6"><?php echo $payment['per_word_fee'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">Subject Fee</div><div class="col-md-6"><?php echo $payment['subject_fee'];?></div>
                </div>
                <div class="row">
                    <div class="col-md-6">Delivery Fee</div><div class="col-md-6"><?php echo $payment['delivery_fee'];?></div>
                </div>
                
                <div class="row" style="border-top: 1px solid #ccc;margin-top: 25px;font-size: 14px;font-weight: bold;padding-top: 15px;">
                    <p></p>
                    <div class="col-md-6">Order Total </div><div class="col-md-6"><?php echo $payment['amount'];?></div>
                </div>
                
            </div>
        </div>
</div>
</div>
</section>
<?php include_once 'footer.php'?>
<script type="text/javascript">
    
    $(document).on('click',"#submit_order",function(){
        $("#pay").submit();
    });
</script>