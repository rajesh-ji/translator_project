<?php include 'config.php';?>
 <?php include 'header.php';
 $q="select * from system_lang where status='1' and id in(select from_lang_id from lang_conversion where status='1')";
 

 $query=mysqli_query($conn,$q);
 $query2=mysqli_query($conn,"select * from system_lang where status='1' and id in(select to_lang_id from lang_conversion where status='1')");
 $query3=mysqli_query($conn,"select * from my_doc_rushfee");
 
 ?>
<style type="text/css">
    .error{
        display: none;
    }
    .well
    {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.05);
    }					
    .well-sm
    {
    padding: 9px;
    border-radius: 3px;
    }
    .badge
    {
     font-size: 14px;
    	line-height: 20px;
    	font-weight: 500;
    	color: #fff;
    	color: var(--white);
    	background: #66d4bd;
    	background: var(--green);
    	padding: 6px 12px;
    	border-radius: 16px;
    	vertical-align: middle;
    	margin: 0;
    }
	.selected_tranlator
	{
		box-shadow:-3px 3px #35cbab, -2px 2px orange, -1px 1px orange !important;
	}
</style>
<style type="text/css">
    .check-icon {
    	right: 26px;
        position: absolute;
        top: 43px;
    }

    .times-icon {
    right:20px;
    position:absolute;
    top:2px;
    }

    .icon-input {
    padding-right:60px !important;
    }
    .input 
    {
    	text-transform:capitalize;
    	color:black;
    }
</style>
<div class="main-container">
    <section style="padding-bottom: 4em;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align:center">
                    <h2 style="font-size: 48px;"><b>Professional translations made&nbsp;easy</b></h2>
                    <p style="font-size:18px;color:black;"><span>205,044</span> vetted professional translators and <span>161,224</span> clients<wbr> have been translating the intelligent way since 1999.</p>
                </div>
            </div>
        </div>
    </section>
            
    <section style="padding-bottom:2em;">
        <div class="container" style="background-color:#f2f5f7">
            <div class="row" style="margin-left:6%;">
	          	<div class="container">
                        <form class="row" id="req_form" action="request_process.php" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-lg-4">
                                <label style="font-size: 16px;padding-bottom: 7px;">From</label>
                            <div class="selection">
                                <select name="from_lang_id" id="from_lang_id" class="select2">
								  <option value='-1'>From Language</option>
								  <?php while($lang=mysqli_fetch_assoc($query)){ ?>
                                    <option value="<?php echo $lang['id']; ?>"><?php echo $lang['name']; ?></option> 
								  <?php } ?>
                                </select>
                                <p id="from_err" class="btn-sm btn-danger error"></p>
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-4">

                                <label style="font-size: 16px;padding-bottom: 7px;">To</label>
                                <div class="selection">
                                     <select class="select2" multiple="multiple" name="to_lang_id" id="to_lang_id">
    								  <option value='-1'>To Language</option>
    								  <?php while($lang=mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $lang['id']; ?>"><?php echo $lang['name']; ?></option> 
    								  <?php } ?>                                    
                                    </select>
                                    <p id="to_err" class="btn-sm btn-danger error"></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                               <label style="font-size: 16px;padding-bottom: 7px;">Word count</label>
                            <div class="row">
                            <div class="col-6" style="height:0px;"><input type="text" value="1000" name="word_count"/>
                                <p id="word_count_err" class="btn-sm btn-danger error"></p>
                            </div>
                            
                            <div class="col-6" style="display:flex;flex-direction:row;"> <span style="margin-top: 10px;margin-left: -20px;">or</span><input type="file" class="custom-file-input" placeholder="upload files" name="doc" style="border:0px;background-color:#f2f5f7"/></div>
                            
                            </div>
                            </div>
							   <div class="col-md-6 col-lg-4">
                                <label style="font-size: 16px;padding-bottom: 7px;">Subject</label>
                        	<div class="selection" style="height:50px;">
                            <select name="subject" id="subject" class="select2">
                                <option value="">Select Subject</option>    
                                <?php while($lang=mysqli_fetch_assoc($query3)){ ?>
                                <option value="<?php echo $lang['id']; ?>"><?php echo $lang['doc_type']; ?></option> 
							  <?php } ?>
                            </select>
                            <p id="subject_err" class="btn-sm btn-danger error"></p>
                        	</div>
                            </div>
                            <div class="col-md-6 col-lg-4">
								<div class="modal-instance">
                            <a href="#" class="modal-trigger">
							<label style="font-size: 16px;padding-bottom: 7px;">Delivery date</label>
								<input type='text' id="best_price" value="Auto (best price)" placeholder="Delivery date"  class='form-control icon-input' style="height:51px;padding: 16px 16px 13px;border-radius: 2px;border: 2px solid #aaa;color: black;">
								<i class='fa fa-calendar fa-2x check-icon' aria-hidden='true'></i>
							</a>
                            <div class="modal-container login_model">
                                <div class="modal-content section-modal">
                                    <section class="unpad ">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="boxed boxed--lg bg--white text-center feature">
                                                        <div class="modal-close modal-close-cross"></div>
                                                        <h3 style="text-align:left;">Select the delivery date</h3>
                                                        <div class="feature__body">
                                                            <div class="row">
                                                                <div class="col-md-12" style="padding:8px;border-radius:4px;box-shadow:inset 0 0 0 1px #ccd4de;float: left;text-align: left;">
																<div class="input-radio">
                                                                      <input type="radio" name="login_with" class="login_with" value="auto_bid" checked="">
                                                                      <label for="input-assigned-2"></label>
                                                                </div>                   
                                                                <span style="font-weight: bold;font-size: 18px;">Auto (best Price)</span>			
                                                                </div>
																<div class="col-md-12" style="padding:11px;border-radius:4px;box-shadow:inset 0 0 0 1px #ccd4de;float: left;text-align: left;margin-top: 4%;margin-bottom:2%;">
																    <div class="input-radio">
                                                                        <input type="radio" name="login_with" value="manual" class="login_with">
                                                                        <label for="input-assigned-2"> </label>
                                                                    </div>     
                                                                    <span style="font-weight: bold;font-size: 18px;">Delivery guaranteed by</span>
									<div class="row">
										<div class="col-md-4">
										   	<select name="delivery_date" id="delivery_date" class="form-control">
                                            <?php
                                            $i=0;
                                            while ( $i<= 14) {
                                                
                                                $value = date('D d M',strtotime("+$i day"));
                                                echo "<option>";echo $value;echo "</option>";
                                                $i++;
                                            }
                                            ?>
                                            </select>
										</div>
										<div class="col-md-3">
										    <select name="time_slot" id='time_slot' class="form-control">
											<?php
											$time_slot = ['01 PM','03 PM','05 PM','07 PM'];
											foreach ($time_slot as $key => $value) {
												echo "<option>";echo $value;echo "</option>";
											}
											?>		
											</select>
										</div>
										<div class="col-md-5">
											<select name="zone" id="zone" class="form-control">
											<?php
                                            $zone_slot = [
                                                'SST'=>'(SST) Midway Islands, American Samoa',
                                                'HDT'=>'(HDT) Hawaii, Tahiti, Cook Islands',
                                                'AKST'=>'(AKST) Alaska',
                                                'PST'=>'(PST) Pacific Standard Time (LA, Vancouver)',
                                                'MST'=>'(MST) Mountain Standard Time (Denver, SLC)',
                                                'CST'=>'(CST) Central Standard Time (Mexico, Chicago)',
                                                'EST'=>'(EST) Eastern Standard Time (NYC, Toronto)',
                                                'AST'=>'(AST) Atlantic Standard Time (Santiago)',
                                                'FNT'=>'(FNT) South Sandwich Islands',
                                                'AZOT'=>'(AZOT) Azores, Cape Verde (Praia)',
                                                'WET'=>'(WET) Western European Time (London, Lisbon)',
                                                'CET'=>'(CET) Central European Time (Rome, Paris)',
                                                'EET'=>'(EET) Eastern European Time',
                                                'AST'=>'(AST) Arabia Standard Time (Baghdad, Riyadh)',
                                                'IRST'=>'(IRST) Iran Standard Time (Tehran)',
                                                'MSK'=>'(MSK) Moscow, St. Petersburg, Dubai',
                                                'AFT'=>'(AFT) Afghanistan Time (Kabul)',
                                                'AFT'=>'(MVT) Karachi, Tashkent, Maldive Islands',
                                                'IST'=>'(IST) India Standard Time (Mumbai, Colombo)',
                                                'BST'=>'(BST) Yekaterinburg, Almaty, Dhaka',
                                                'ICT'=>'ICT) Bangkok, Hanoi, Jakarta',
                                                'CST'=>'(CST) Beijing, Perth, Singapore, Hong Kong',
                                                'JST'=>'(JST) Tokyo, Seoul',
                                                'ACT'=>'(ACT) ACST (Darwin, Adelaide)',
                                                'AEST'=>'(AEST) AEST (Brisbane, Sydney), Yakutsk',
                                                'NCT'=>'(NCT) Nouméa, Solomon Islands',
                                                'NZST'=>'(NZST) Auckland, Fiji, Marshall Islands',
                                                'TKT'=>'(TKT) Fakaofo',
                                            ];
                                            foreach ($zone_slot as $key => $value) {
                                                echo "<option value='{$key}'>";echo $value;echo "</option>";
                                            }
                                            ?>  
											</select>
										</div>
									</div>
								</div>                            
                                <div class="col-md-12" style="margin-top:2%;">
                                    <button id="done_box" class="col-md-4 btn btn--primary type--uppercase float-right modal-close" >DONE</button>
                                </div>
                                </div>
                                <!--end of row-->
                            </div>
                        </div>
                    </div>
                </div>
                                            <!--end of row-->
                                        </div>
                                        <!--end of container-->
                                    </section>
                                </div>
                            </div>
                        	</div>
		
						   	</div>
                            <div class="col-md-6 col-lg-4">
                                <button type="button" class="btn btn-primary show_price" id="show_price" onclick="changeInnerHtml()" style="margin-top:11%;width: 257px; height:52px;font-size:16px;" >Show prices</button>
                        
                            </div>
                            
                        
                        	<span class="type--fine-print">
							    <span class="badge">Pay after delivery</span> We trust you: feel free to pay within 5 days from delivery via bank transfer, credit card, or PayPal. <a href="#">Learn more</a>  
                            </span>
		                </form>  
               	</div>
            </div>
        </div>
    </section>
    <section style="display: none;" id="translator_list_section">
        <div class="container translator_list">
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                <img src="img/avatar-380-456332.jpg" style="width: 96px; height: 65px;" alt="error!"/>
                </div>
                    <div class="col-md-4">
                        <h3><b>More complex needs?</b></h3>
                        <p>We will help you get a quote for complex documents, PDFs, websites, software, and more.</p>
                        <p><span>Barbara - Senior Account Manager</span></p>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa fa-phone" aria-hidden="true" style="font-weight: inherit;display: ;margin-top: 27%;font-size: 18px;color:#584caa;"> +1-650-304-0601</i></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i href="#" class="fa fa-telegram" aria-hidden="true" style="font-weight: inherit;display: ;margin-top: 27%;font-size: 18px;color:#584caa;"> Contact us</i><a>
                    </div>  
            </div>
                <div class="col-md-1"></div>
        </div>
    </section>
    
    <section>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <h2 style="text-align:center;"><b>Why Choose us</b></h2>
	                <div class="slider" data-arrows="" data-paging="">
	                    <ul class="row">
	                        <li class="col-md-4 col-12">
	                            <div class="feature feature-3 boxed boxed--lg  text-center">
	                                <i class="color--primary icon icon--lg icon-Nurse"></i>
	                                <h4>Guaranteed Quality</h4>
	                                <p>
	                                    We support the world’s best translators with advanced quality assurance processes. And that’s not all: we provide a free comprehensive translation review if you happen to be unsatisfied.
	                                </p>
	                                <a href="#">
	                                    Read our terms
	                                </a>
	                            </div>
	                            <!--end feature-->
	                        </li>
	                        <li class="col-md-4 col-12">
	                            <div class="feature feature-3 boxed boxed--lg  text-center">
	                                <i class="color--primary icon icon--lg icon-Compass-Rose"></i>
	                                <h4>On-Time Delivery</h4>
	                                <p>
	                                    We offer the best performance levels in the industry, with an optimized workflow that guarantees over 95% of deliveries on time. Plus, in the unlikely event we miss a deadline, we will refund the translation up to its full cost. &nbsp &nbsp
	                                </p>
	                                <a href="#">
	                                   Read our terms
	                                </a>
	                            </div>
	                            <!--end feature-->
	                        </li>
	                        <li class="col-md-4 col-12">
	                            <div class="feature feature-3 boxed boxed--lg  text-center">
	                                <i class="color--primary icon icon--lg icon-Family-Sign"></i>
	                                <h4>Pay After Delivery</h4>
	                                <p>
	                                    We genuinely trust our clients, which is why we have created the Pay After Delivery model. With Pay After Delivery, you can pay within five days of the translation’s delivery via credit card, bank transfer or Paypal.
	                                </p>
	                                <a href="#">
	                                    Read our terms
	                                </a>
	                            </div>
	                            <!--end feature-->
	                        </li>
	                       
	                       
	                    </ul>
	                </div>
	                <!--end of row-->
	            </div>
	        </div>
	        <!--end of row-->
	    </div>
    <!--end of container-->
    </section>
    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>A trusted partner to the best</h2>
                    <p class="lead">
                        Working with the industries best and brightest minds to deliver outstanding results
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline list-inline--images">
                        <li>
                            <img alt="Image" src="img/partner-1.png" />
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-5.png" />
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-7.png" />
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-4.png" />
                        </li>
                        <li>
                            <img alt="Image" src="img/partner-6.png" />
                        </li>
                    </ul>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider slider--inline-arrows" data-arrows="true">
                        <ul class="slides">
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-1.png" />
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                        <span class="h3">&ldquo;We’ve been using Stack to prototype designs quickly and efficiently. Needless to say we’re hugely impressed by the style and value.&rdquo;
                                        </span>
                                        <h5>Maguerite Holland</h5>
                                        <span>Interface Designer &mdash; Yoke</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-4.png" />
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                        <span class="h3">&ldquo;I've been using Medium Rare's templates for a couple of years now and Stack is without a doubt their best work yet. It's fast, performant and absolutely stunning.&rdquo;
                                        </span>
                                        <h5>Lucas Nguyen</h5>
                                        <span>Freelance Designer</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="testimonial row justify-content-center">
                                    <div class="col-lg-2 col-md-4 col-6 text-center">
                                        <img class="testimonial__image" alt="Image" src="img/avatar-round-3.png" />
                                    </div>
                                    <div class="col-lg-7 col-md-8 col-12">
                                        <span class="h3">&ldquo;Variant has been a massive plus for my workflow &mdash; I can now get live mockups out in a matter of hours, my clients really love it.&rdquo;
                                        </span>
                                        <h5>Rob Vasquez</h5>
                                        <span>Interface Designer &mdash; Yoke</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="text-block">
                                        <h3><b>Our professional services</b></h3>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Website Localization</h5>
                                        <p>
                                            Fully managed solutions for bringing your website to another culture, from multilingual Wordpress sites to complex architectures.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Video Subtitling</h5>
                                        <p>
                                            Over 40,000 hours of movies & TV Shows adapted with subtitling, voice overs, and dubbing.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Multilingual DTP</h5>
                                        <p>
                                            176 languages, including Asian and right to left languages, to deliver a ready to print file.
                                   
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Custom Localization Solutions</h5>
                                        <p>
                                           From the high-touch training of translators to match your preferred style, to APIs and custom workflow design.
                                   
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Urgent Translations</h5>
                                        <p>
                                            We can translate large volumes in hours and small volumes in mere minutes thanks to our large network of translators powered by optimized technologies.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Google Ads translation</h5>
                                        <p>
                                            We have been Google’s main partner for the translation of millions of Ads and keywords since 2006.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Software Localization</h5>
                                        <p>
                                           We localize the original files of your mobile app or desktop software and test them afterwards, sparing you the trouble of copying and pasting.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Official translations</h5>
                                        <p>
                                          Our professional translation services can be certified or sworn in Court, depending on the country where you must present your document.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Multilingual Chatbots</h5>
                                        <p>
                                           Integration with chatbot platforms, CMS and customer support ticketing software, dataset expansion, and post-localization testing.
                                        </p>
                                    </div>
                                    <div class="text-block">
                                        <h5 style="font-size: large;color: #0055b8;">Simple Document Translation</h5>
                                        <p>
                                           Use our online quote to experience the fast and easy way to translate your documents in 176 languages, since 1999.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end of row-->
                        </div>
                        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row">
            <div class="col-md-1 offset"></div>
                <div class="col-md-5">
                <img src="img/giardiniere-translated.png"  alt=""/>
                </div>
                <div class="col-md-5">
                    <h2>Embrace our culture</h2>
                    <p>We pride ourselves in paying our translators fairly and providing a working environment that is collaborative, fun, and open to everyone: a culture that inspires talents to do great things for you.</p>
                    <a href="#" class="link link--noline  link--medium">About us</a>
                </div>
                <div class="col-md-1 offset"></div>
            </div>
        </div>
    </section> 
    <section class="text-center imagebg" data-gradient-bg='#4876BD,#5448BD,#8F48BD,#BD48B1'>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="cta">
                        <h2>Get an instant quote</h2>
                        <p class="lead">
                           The easy way to get your documents translated fast.
                            Buy online in a few clicks.
                        </p>
                        <a class="btn btn--primary type--uppercase" href="#">
                            <span class="btn__text">
                                Instant quote
                            </span>
                           
                        </a>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    
        <div class="modal-instance" style="display: none;">
            <a class="btn modal-trigger" style="display: none;" id="show_modal" href="#">show</a>
            <div class="modal-container">
                <div class="modal-content">
                    <div class="boxed boxed--lg">
                        <p class="lead" id="success_model_content">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
<?php include 'footer.php';?>
<script type="text/javascript">
	$('.datepicker').pickadate({
		// weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
		// showMonthsShort: true,
		min: 1,

	});
	$(document).on('click','#show_price',function(){
		
        word_count = $("input[name='word_count']").val();
        subject = $("select[name='subject']").val();
        from_lang = $("#from_lang_id").val();
        to_lang = $("#to_lang_id").val();
        delivery_date = $("select[name='delivery_date']").val();
        time_slot = $("select[name='time_slot']").val();
        zone = $("select[name='zone']").val();
        login_with = $("input[name='login_with']:checked").val();
        
        // Create an FormData object
        var form1 = $('#req_form')[0];
        var data1 = new FormData(form1);
        data1.append("delivery_date", delivery_date);
        data1.append("time_slot", time_slot);
        data1.append("login_with", login_with);
        data1.append("to_lang_id", to_lang);
        data1.append("from_lang_id", from_lang);
        data1.append("subject", subject);
        data1.append("word_count", word_count);
        data1.append("zone", zone);

        $('.error').hide();
        $('.error').text('');
        error=false;
        if(word_count==''){
            error=true;
            $("#word_count_err").text("Please enter word count");
            $("#word_count_err").show();
        }
        if(subject==''){
            error=true;
            $("#subject_err").text("Please enter subject");
            $("#subject_err").show();
        }
        if(from_lang==''){
            error=true;
            $("#from_err").text("Please select from language");
            $("#from_err").show();
        }
        if(to_lang==''){
            error=true;
            $("#to_err").text("Please select to language");
            $("#to_err").show();
        }
        if(error===false){
            $.ajax({
    			url:'choose_translator.php',
    			type:"post",
                processData: false,
                contentType: false,
    			data:data1,
    			success:function(res){
    				$("#translator_list_section").show();
                    $(".translator_list").html(res);
    			}
    		});
        }
	});
    $(document).on('click','.hire_me',function(){
		var data_id=$(this).attr("data-id");
		var div_id="choose_tras_"+data_id;
		// alert(div_id);   
        if($(this).hasClass('btn-success')){
            $(this).removeClass('btn-success');
            $(this).addClass('btn-info');
              $(this).parent().parent().parent().parent().removeClass('selected_tranlator');
        }
        else{
            $(this).addClass('btn-success');
            $(this).removeClass('btn-info');   
             $(this).parent().parent().parent().parent().addClass('selected_tranlator');  
        }
    });
    $(document).on('click','#done_box',function(){
        delivery_date = $("#delivery_date").val();
        time_slot = $("#time_slot").val();
        zone = $("#zone").val();
        login_with = $("input[name='login_with']:checked").val();
        if(login_with=="manual"){
            $("#best_price").val(delivery_date+" "+time_slot+" "+zone);    
        }
        else{
            $("#best_price").val('Auto (best Price)');
        }
        
    });
	$(document).on('click','#submit_form',function(){
        error=false;
        word_count = $("input[name='word_count']").val();
        subject = $("select[name='subject']").val();
        from_lang = $("#from_lang_id").val();
        to_lang = $("#to_lang_id").val();
        delivery_date = $("select[name='delivery_date']").val();
        time_slot = $("select[name='time_slot']").val();
        zone = $("select[name='zone']").val();
        login_with = $("input[name='login_with']:checked").val();
        var form = $('#req_form')[0];

        // Create an FormData object
        var data = new FormData(form);
        var favorite = [];
        $.each($("input[name='translator_ids[]']:checked"), function(){
            favorite. push($(this). val());
        });
        // If you want to add an extra field for the FormData
        data.append("translator_ids", favorite);
        data.append("delivery_date", delivery_date);
        data.append("time_slot", time_slot);
        data.append("login_with", login_with);
        data.append("to_lang_id", to_lang);
        data.append("from_lang_id", from_lang);
        data.append("subject", subject);
        data.append("word_count", word_count);
        data.append("zone", zone);
        $('.error').hide();
        $('.error').text('');
        if(word_count==''){
            error=true;
            $("#word_count_err").text("Please enter word count");
            $("#word_count_err").show();
        }
        if(subject==''){
            error=true;
            $("#subject_err").text("Please enter subject");
            $("#subject_err").show();
        }
        if(from_lang==''){
            error=true;
            $("#from_err").text("Please select from language");
            $("#from_err").show();
        }
        if(to_lang==''){
            error=true;
            $("#to_err").text("Please select to language");
            $("#to_err").show();
        }
        if(favorite.length<1){
            error=true;
            $("#translator_ids_err").text("Please select translators");
            $("#translator_ids_err").show();
        }
        if(error===false){
		    $.ajax({
                url:'request_process.php',
                type:"post",
                processData: false,
                contentType: false,
                cache: false,
                data:data,
                success:function(res){
                    response = JSON.parse(res);
                    if(response.status=="success"){
                        window.location = response.url;    
                    }
                    else{
                        alert(response.message);
                    }
                }
            });
        }
	});
    $(document).ready(function() {
        $('.select2').select2();
    });
    
</script>