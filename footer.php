<footer class="text-center-xs space--xs bg--dark ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="h6 type--uppercase">Home</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
                                        <span class="h6 type--uppercase">About us</span>
                                    </a>
                                </li>
								<li>
                                    <a href="#">
                                        <span class="h6 type--uppercase">Contact us</span>
                                    </a>
                                </li>
								
                            </ul>
                        </div>
						
						 <div class="col-md-2">
                           <select style="height: 32px; padding-top: 1px;">
							<option value="disabled">Language</option>
							<option>Deutsch</option>
							<option>Deutsch</option>
							<option>Español</option>
							<option>Français</option>
							<option>Italiano</option>
							<option>Nederlands</option>
							<option>Polski</option>
							<option>Português (BR)</option>
							<option>Русский</option>
							<option>Svenska</option>
							<option>Türkçe</option>
							<option>한국어</option>
							<option>日本語</option>
							<option>عربي</option>
							<option>Ελληνικά</option>
						   </select>
                        </div>
						
						
						 <div class="col-md-5 text-right text-center-xs">
                            <ul class="social-list list-inline list--hover">
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-google icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-twitter icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-facebook icon icon--xs"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="socicon socicon-instagram icon icon--xs"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
						
                       
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-2">
                            <span class="type--fine-print">&copy;
                                <span class="update-year"></span> Imo Translation.</span>
                            <a class="type--fine-print" href="/privacy-policy">Privacy Policy</a>
                            <a class="type--fine-print" href="/faq">FAQ</a>
                        </div>
                        <div class="col-md-2 text-right text-center-xs">
                            <a class="type--fine-print" href="mailto:info@imotranslation.com">info@imotranslation.com</a>
                        </div>
						<div class="col-md-8 text-right text-center-xs">
                           <a class="" >1-609-353-4995</a>
							<a class="" href="">info@imotranslation.com</a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </footer>
	 </div>
        <!--<div class="loader"></div>-->
        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>
        <script src="js/jquery-3.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="dist/js/select2.min.js"></script>
        <script src="js/flickity.min.js"></script>
        <script src="js/easypiechart.min.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/typed.min.js"></script>
        <script src="js/datepicker.js"></script>
        <script src="js/isotope.min.js"></script>
        <script src="js/ytplayer.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/granim.min.js"></script>
        <script src="js/jquery.steps.min.js"></script>
        <script src="js/countdown.min.js"></script>
        <script src="js/twitterfetcher.min.js"></script>
        <script src="js/spectragram.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<script>
$(document).ready(function() {
// alert('x');
        $('.create_account').show();
	    $('#login').click(function(){
				var username = $('#username').val();   
                var password = $('#pass').val();
                var login_with = $('.login_with').val();
				var login_with = $("input[name='login_with']:checked").val();
				// alert(login_with);
				if(username=="" || password=="" || login_with==""){
					$('#login_error').show();
					$('#login_error').html("User Name and Password is required");
				}
				else
				{
					data = {username:username,mgs:"login",password:password,login_with:login_with};
                            $.ajax( {
                                url : "login.php",
                                type:"post",
                                data : data,
                                dataType : 'json',
                                success : function(response) {
									var report= JSON.parse(JSON.stringify(response));
									if(report.status){
											window.location.href =report.location;
                                    }
									else
									{
										
										$('#login_error').show();
										$('#login_error').html(report.mgs);
									}
                                },
                                error: function(data){
                                    console.log(data);
                                }
                            });
						
				}
				return false;
			});  

            $('#signUp').click(function(){
                // alert('signup click');
                var username = $('#signupUsername').val();
                var signupemail = $('#signupemail').val();
                var signupname = $('#signupname').val();
                
                var res_password = $('#signupPassword').val();
                
                var type = $('#type').val();
                // alert(username);
                // alert('signup click '+username+" "+password+" "+type);
			   
                if(username==""||res_password==""||type==""){
                            $('#signUpError').css("backgroundColor",'red');                           
                            $('#signUpError').html("Please Check All Required Field");
                            return false;
                }
                else if(res_password.length<6){
                            $('#signUpError').css("backgroundColor",'red');
                            $('#signUpError').html("*password not less than 6 character");
                            return false;
                }   
                
                else {
					var data = {username:username,mgs:"signup",email:signupemail,name:signupname,password:res_password,type:type};
			 $.ajax({
					  
					  url :'signup.php',
					  type:'POST',  
					  dataType : 'json',
					  data:data,
					  success:function(response){
							var data = JSON.parse(JSON.stringify(response)); 
						  if(data.status)
						  {
							 window.location.href=data.location;
							 
						  }
						  else
						  {   
								 $('#signUpError').css("backgroundColor",'red');
                                $('#signUpError').html(data.mgs);
						  }
						  
						}		  
				  });  
                    // alert('else called');    
                  
                }
            
                        

            });
    
    
    
    
    
    
    
    
    
    $("#create_account").click(function(){
		alert(3);
		$('.login_model').hide();
	});


    $(".show_price").click(function(){
        $('#showprices').show();
    });
});
</script>
<script type="text/javascript">
    function changeInnerHtml(){
         $('button').each(function() {
                    if ($.trim($(this).html()) == "Show prices")   $(this).html('Update prices');
                });
    }
</script>