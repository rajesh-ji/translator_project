 <?php include 'header.php'?>
 <div class="main-container">
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="text-align:center">
                            <h2><b>Professional translations made&nbsp;easy</b></h2>
                            <p><span>205,044</span> vetted professional translators and <span>161,224</span> clients<wbr> have been translating the intelligent way since 1999.</p>
                        </div>
                    </div>
                </div>
            </section>
            
             <section>
                <div class="container" style="background-color:#f2f5f7">
                    <div class="row">
                        <form class="form-horizontal" method="post">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <div class="" style="width:97%;">
                                    <label style="font-size: 16px;padding-bottom: 7px;">From</label>
                                    <div class="selection" style="height:50px;">
                                        <select class="select2" name="select_from">
                                            <option value="disabled">--Select--</option>    
                                            <option value="de">Delhi</option>   
                                            <option value="">Delhi</option> 
                                            <option value="">Rajasthan</option> 
                                            <option value="">Bihar</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="" style="width:97%">
                                    <label style="font-size: 16px;padding-bottom: 7px;">Subject</label>
                                    <select class="select2" name="select_sub">
                                        <option value="disabled">--Select--</option>    
                                        <option value="">law</option>   
                                        <option value="">accounting</option>    
                                        <option value="">english</option>   
                                        <option value="">hindi</option> 
                                        <option value="">sanskrit</option>      
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="" style="width:97%;">
                                    <label style="font-size: 16px;padding-bottom: 0px;">To</label>
                                        <select class="select2" multiple="multiple" name="select_to">
                                            <option value="">--Select--</option>    
                                            <option value="">Delhi</option>
                                            <option value="">pune</option>
                                        </select>
                                </div>
                                <div class="">
                                    <label style="font-size: 16px;padding-bottom: 7px;">Delivery date</label>
                                    <input type="date" placeholder="delivery" name="delivey" style="height:51px" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="" style="margin-bottom:32px;">
                                    <label style="font-size: 16px;padding-bottom: 7px;">Word count</label>
                                    <div class="row">
                                    <div class="col-6" style="height:0px;"><input type="text" value="1000" name="word_count"/></div>
                                    
                                    <div class="col-6" style="display:flex;flex-direction:row;"> <span style="margin-top: 10px;margin-left: -20px;">or</span><input type="file" class="custom-file-input" placeholder="upload files" name="doc" style="border:0px;background-color:#f2f5f7"/></div>
                                    
                                    </div>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-primary show_price" id="show_price" onclick="changeInnerHtml()" style="width: 257px; height:52px;font-size:16px;" >Show prices</button>
                                     
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </form>   
                        <div  class="col-md-12 offset-1" style="margin-top: 21px;margin-bottom: 20px;">
                            <button class="btn btn-success" style="width: 15%;">Pay after delivery</button> We trust you: feel free to pay within 5 days from delivery via bank transfer, credit card, or PayPal. <a href="#">Learn more</a>  
                        </div>

                    </div>
                </div>
            
                <div class="container" id="showprices" style="display:none;background-color:#f2f5f7;margin-left: auto;margin-right: auto;">
                <h4>Choose your translator</h4>
                <div class="container">
                    <div class="row" style="margin-top:5px;margin-bottom:50px;">
                           
                    <div class="container">
                       <div class="row">
                          <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br></br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                           <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br></br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                           <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                          </div>
                          </div>
                        <div class="container " style="margin-top:30px">
                          <div class="row">
                           <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br></br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                           <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br></br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                           <div class="col-sm-4">
                                <div class="row">
                                    <img src="img/personal-1.jpg" alt="" width="60px" height="60px" style="border-radius:50%;" class="card-img-left">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h5>Special title treatment</br></br><i class="fa fa-star"> 4.5</i>
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <a href="#" class="btn btn-primary" style="float:right">Hire me</a></h5>
                                          With supporting text below as a natural lead-in to</br> additional content.
                                </div>
                          </div>
                          </div>
                        </div>
                    </div>
                </div>                        <!--end of container-->
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
<?php include 'footer.php';?>