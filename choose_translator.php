<?php
include_once 'config.php';
include_once 'common_function.php';
if(!empty($_POST)){
   $from_lang =  $_POST['from_lang_id'];
   $to_lang =  $_POST['to_lang_id'];
   $subject =  $_POST['subject'];
   $word_count =  $_POST['word_count'];
   $login_with = $_POST['login_with'];
   $delivery_date = isset($_POST['delivery_date'])?date('Y-m-d',strtotime($_POST['delivery_date'])):'';
    
    if($login_with =='auto_bid'){
        $delivery_date = date('Y-m-d H:i',strtotime("+4 day"));    
    }
    else{
        $time_slot = date('H:i',strtotime($_POST['time_slot']));
        $delivery_date= $delivery_date." ".$time_slot;    
    }

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
    $amount_data = getRequestAmount($delivery_date,$subject,$per_word_amount,$word_count);
    $sql =  "select * from users where id in (select user_id from tras_service where lang_conversion_id in(select id from lang_conversion where from_lang_id in($from_lang) and to_lang_id in($to_lang) group by id) and status = '1')";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)){ ?>
        
        <div class="row">
            <div class="col-md-4">
                <h4>Choose your translator</h4>
            </div>
        </div>
        <div class="row" style="margin-bottom: 5px;"><p id="translator_ids_err" style="display: none;" class="btn-sm btn-danger error"></p></div>
        <div style="height:auto;padding: 15px;">
        <div class="row">
            
        <?php while ($row=mysqli_fetch_assoc($res)) { ?>
          
            <div class="col-md-4 well well-sm" id="choose_tras_<?php echo $row['id'];?>" style="margin-left:7px;">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="admin/users/<?php echo $row['image'];?>" alt="" class="img-rounded img-responsive">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4 style="margin-bottom:0px;text-transform: capitalize;">
                            <?php echo $row['name'];?></h4>
                        <small><i class="fa fa-star" style="font-size:20px;"> 4.5</i></small>
                        <p><?php echo $row['bio'];?></p>
                        <!-- Split button -->
                        <div class="">
                              <input type="checkbox" style="display: none;" value="<?php echo $row['id'];?>" name="translator_ids[]" id="chbox_<?php echo $row['id'];?>">
                              <label class="btn btn-info hire_me" data-id="<?php echo $row['id']; ?>" for="chbox_<?php echo $row['id'];?>" style="float:right">Hire me</label>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php }else{?>
        <div>
            <h4><strong> No Record found with your selected language </strong></h4>    
        </div>
    <?php } ?>
    <div class="boxed boxed--border">
              <ul class="row row--list clearfix text-center">
                
                <li class="col-md-2 col-4">
                    <span class="h6 type--uppercase type--fade">Per word amount</span>
                    <span class="h3"><?php echo number_format($per_word_amount,2);?></span>
                </li>
                
                <li class="col-md-2 col-4">
                    <span class="h6 type--uppercase type--fade">Subject Fee</span>
                    <span class="h3"><?php echo number_format($amount_data['subject_fee'],2);?></span>
                </li>
                  <li class="col-md-2 col-4">
                    <span class="h6 type--uppercase type--fade">Rush Fee</span>
                    <span class="h3"><?php echo number_format($amount_data['delivery_rush_fee'],2);?></span>
                </li>
                <li class="col-md-2 col-4">
                    <span class="h6 type--uppercase type--fade">Total Amount</span>
                    <span class="h3" style="font-weight:bold"><?php echo number_format($amount_data['total_amount'],2);?> <i class="fa fa-usd" aria-hidden="true"></i>
                    </span>
                </li>
                <li class="col-md-3 col-4">
                        <button type="submit" id="submit_form" class="btn btn-primary">Proceed</button>
                </li>
            </ul> 
        </div>
<?php } ?>