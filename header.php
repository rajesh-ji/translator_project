<?php include('config.php');

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Imo Traslation services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Imo Traslator Services">
        <meta name="google-signin-client_id" content="283113251683-bfte3hqgku96qjmqb5lr9mti3idtipbt.apps.googleusercontent.com">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/font-rubiklato.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700%7CRubik:300,400,500" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link href="dist/css/select2.min.css" rel="stylesheet" />
        
        <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css " rel="stylesheet" />
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
        <style type="text/css">
            .custom-file-input {
                  color: transparent;
                }
                .custom-file-input::-webkit-file-upload-button {
                  visibility: hidden;
                }
                .custom-file-input::before {
                  content: 'upload files';
                  color: black;
                  display: inline-block;
                  background: -webkit-linear-gradient(top, #F9F9F9, #E3E3E3);
                  /* border: 1px solid #999; */
                  border-radius: 3px;
                  padding: 5px 8px;
                  outline: none;
                  white-space: nowrap;
                  -webkit-user-select: none;
                  cursor: pointer;
                  text-shadow: 1px 1px #fff;
                  font-weight: 700;
                  font-size: 10pt;
                }
                .custom-file-input:hover::before {
                  border-color: black;
                }
                .custom-file-input:active {
                  outline: 0;
                }
                .custom-file-input:active::before {
                  background: -webkit-linear-gradient(top, #E3E3E3, #F9F9F9);
                }
				input::-webkit-input-placeholder {
color: black !important;
}
 
input:-moz-placeholder { /* Firefox 18- */
color: black !important;  
}
 
input::-moz-placeholder {  /* Firefox 19+ */
color: black !important;  
}
 
input:-ms-input-placeholder {  
color: black !important;  
}
.required_field
{
	color:red !important;
	font-size:16px;
}

        </style>
        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
		
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<link rel="manifest" href="manifest.json">
    </head>
    <body class=" ">
        <a id="start"></a>
        <section class="bar bar-3 bar--sm bg--secondary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        
                    </div>
                    <div class="col-lg-6 text-right text-left-xs text-left-sm">
                        <div class="bar__module">
                            <ul class="menu-horizontal">
                            
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <li>
                                    <div class="modal-instance">
                                        <span><?php echo $_SESSION['name'];?></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="modal-instance">
                                        <a href="logout.php">Logout</a>
                                    </div>
                                </li>
                                <?php }else{ ?>
                                <li>
                                    <div class="modal-instance">
                                        <a href="#" class="modal-trigger">Login</a>
                                        <div class="modal-container">
                                            <div class="modal-content section-modal" style="overflow-y:hidden;">
                                                <section class="unpad ">
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6">
                                                                <div class="boxed boxed--lg bg--white text-center feature">
                                                                    <div class="modal-close modal-close-cross"></div>
                                                                    <h3>Login to Your Account</h3>
                                                                    <a class="btn block btn--icon bg--facebook type--uppercase" onclick="fbLogin()">
                                                                        <span class="btn__text">
                                                                            <i class="socicon-facebook"></i>
                                                                            Login with Facebook
                                                                        </span>
                                                                    </a>
                                                                    
                                                                    <a id="googleSignIn" onclick="login()" class="btn block btn--icon bg--googleplus type--uppercase">
                                                                        <span class="btn__text">
                                                                            <i class="socicon socicon-google"></i>
                                                                            Join with Google
                                                                        </span>
                                                                    </a>
                                                                    <hr data-title="OR">
                                                                    <div class="feature__body">
                                                                    <span id="login_error" style="color:red;text-align:center;"></span>

                                                                        <form  method="POST">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input name="username" type="text" id="username" placeholder="Username" />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input name="password" type="password" id="pass" placeholder="Password" />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                
                                                                             

                                                                                    <div class="input-radio">
                                                                                   
                                                                                            <input type="radio" name="login_with" class="login_with" value="2" >
                                                                                            <label >  </label>
                                                                                        </div>                                                                                   
                                                                                            <span>login with Customer</span>


                                                                                    <div class="input-radio">
                                                                                        
                                                                                          <input type="radio" name="login_with" class="login_with" value="3" >
                                                                                          <label >  </label>
                                                                                    </div>                                                                                   
                                                                                        <span>login with translator</span>
                                                                                   
                                                                                   
                                                                                </div>
                                                                                <!-- hidden field for translator -->
                                                                                <!-- <div class="col-md-12 d-none" id="selectranslator" >
                                                                                    <div class="input-radio">
                                                                                        <input type="radio" name="translator_with" value="1" id="translator">
                                                                                        <label ></label>
                                                                                    </div>                                                                                   
                                                                                        <span>login with translator</span>
                                                                                   
                                                                                    <div class="input-radio">
                                                                                        <input type="radio" name="translator_with" value="2">
                                                                                        <label ></label>
                                                                                    </div>                                                                                   
                                                                                        <span>login with translator Customer</span>
                                                                                </div> -->
                                                                                <!-- hidden field -->
                                                                                <div class="col-md-12">
                                                                                    <button type="button"  class="btn btn--primary btn-block type--uppercase" id="login" >Login</button>
                                                                                </div>
                                                                            </div>
                                                                            <!--end of row-->
                                                                        </form>
                                                                        <span class="type--fine-print block">Dont have an account yet?
                                                                            <a href="#" class="modal-trigger">Create account</a>

                                                                        </span>
                                                                        <span class="type--fine-print block">Forgot your username or password?
                                                                            <a href="#">Recover account</a>
                                                                        </span>
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
                                </li>
                                <li>
                                    <div class="modal-instance">
                                        <a href="#" class="modal-trigger">Create Account</a>
                                        <div class="modal-container">
                                            <div class="modal-content">
                                                <section class="imageblock feature-large bg--white border--round ">
                                                    <div class="imageblock__content col-lg-5 col-md-3 pos-left">
                                                        <div class="background-image-holder">
                                                            <img alt="image" src="assets/images/background/login-register.jpg" />
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row justify-content-end">
                                                            <div class="col-lg-7">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-10 col-md-11">
                                                                        <h2>Create an account</h2>
                                                                       
                                                                        <a class="btn block btn--icon bg--facebook type--uppercase" onclick="fbLogin()">
                                                                            <span class="btn__text">
                                                                                <i class="socicon-facebook"></i>
                                                                                Sign up with Facebook
                                                                            </span>
                                                                        </a>
																<a id="googleSignIn" onclick="login()" class="btn block btn--icon bg--googleplus type--uppercase">
                                                                        <span class="btn__text">
                                                                            <i class="socicon socicon-google"></i>
                                                                            Join with Google
                                                                        </span>
                                                                    </a>
                                                                        <hr data-title="OR">
                                                                        <span id="signUpError" style="padding: 9px;font-size: 18px;line-height: 12px;text-align: center;border-radius: 4px;text-transform: uppercase;color:#fff;"></span>
                                                                        <form>
                                                                            <div class="row">
                                                                            <div class="col-12">
																			<label>Select Account type <span class="required_field">*</span></label>
                                                                                    <select name="type" id="type" class="form-control text-center">
                                                                                        <option >--Select Account Type--</option>
                                                                                        <option value="2">User</option>
                                                                                        <option value="3">Translator</option>
                                                                                    </select>
                                                                                </div>
																				<div class="col-12">
																				<label>Name <span class="required_field">*</span></label>
                                                                                    <input type="text" id="signupname" name="name" placeholder="Name"  />
                                                                                </div>
                                                                                <div class="col-12">
																				<label>Username <span class="required_field">*</span></label>
                                                                                    <input type="text" id="signupUsername" name="username" placeholder="Username"  />
                                                                                </div>
																				 <div class="col-12">
																				 <label>Email <span class="required_field"></span></label>
                                                                                    <input type="text" id="signupemail" name="email" placeholder="Email"  />
                                                                                </div>
                                                                                <div class="col-12">
																				<label>Password <span class="required_field">*</span></label>
                                                                                    <input type="password" id="signupPassword" name="Password" placeholder="Password" />
                                                                                </div>
                                                                                
                                                                                <div class="col-12">
                                                                                    <button type="button" id="signUp" class="btn btn--primary btn-block type--uppercase">Create Account</button>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <span class="type--fine-print">By signing up, you agree to the
                                                                                        <a href="#">Terms of Service</a>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <!--end row-->
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!--end of row-->
                                                            </div>
                                                            <!--end of col-->
                                                        </div>
                                                        <!--end of row-->
                                                    </div>
                                                    <!--end of container-->
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                            
                                <li class="dropdown dropdown--absolute">
                                    <span class="dropdown__trigger">
                                        <img alt="Image" class="flag" src="img/flag-1.png" />
                                    </span>
                                    <div class="dropdown__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 dropdown__content">
                                                    <ul class="menu-vertical text-left">
                                                        <li>
                                                            <a href="#">ENG</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">GER</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!--li>
                                    <a href="#" data-notification-link="side-menu">
                                        <i class="stack-dot-3"></i>
                                    </a>
                                </li!-->
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->
        </section>
        <!--end bar-->
        <div class="notification pos-right pos-top side-menu bg--white" data-notification-link="side-menu" data-animation="from-right">
            <div class="side-menu__module">
                <a class="btn btn--icon bg--facebook block" href="#">
                    <span class="btn__text">
                        <i class="socicon-facebook"></i>
                        Sign up with Facebook
                    </span>
                </a>
                <a class="btn btn--icon bg--dark block" href="#">
                    <span class="btn__text">
                        <i class="socicon-mail"></i>
                        Sign up with Email
                    </span>
                </a>
            </div>
            <!--end module-->
            <hr>
            <div class="side-menu__module">
                <span class="type--fine-print float-left">Already have an account?</span>
                <a class="btn type--uppercase float-right" href="#">
                    <span class="btn__text">Login</span>
                </a>
            </div>
            <!--end module-->
            <hr>
            <div class="side-menu__module">
                <ul class="list--loose list--hover">
                    <li>
                        <a href="index.php">
                            <span class="h5">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">About-us</span>
                        </a>
                    </li>
					<li>
                        <a href="services.php">
                            <span class="h5">Services</span>
                        </a>
                    </li>      
                    <li>
                        <a href="#">
                            <span class="h5">Enterprices</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Translators</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Contact us</span>
                        </a>
                    </li>
                </ul>     
            </div>
            <!--end module-->
            <hr>
            <div class="side-menu__module">
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
                    <li>
                        <a href="#">
                            <i class="socicon socicon-pinterest icon icon--xs"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="notification pos-top pos-right search-box bg--white border--bottom" data-animation="from-top" data-notification-link="search-box">
            <form>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <input type="search" name="query" placeholder="Type search query and hit enter" />
                    </div>
                </div>
                <!--end of row-->
            </form>
        </div>
        <!--end of notification-->
        <div class="nav-container ">
            <div class="bar bar--sm visible-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-3 col-md-2">
                            <a href="index.php">
                                <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                                <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                            </a>
                        </div>
                        <div class="col-9 col-md-10 text-right">
                            <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs">
                                <i class="icon icon--sm stack-interface stack-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
            <!--end bar-->
            <nav id="menu1" class="bar bar--sm bar-1 hidden-xs bar--absolute">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 hidden-xs">
                            <div class="bar__module">
                                <a href="index.php">
                                    <img class="logo logo-dark" alt="logo" src="img/logo-dark.png" />
                                    <img class="logo logo-light" alt="logo" src="img/logo-light.png" />
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                        <div class="col-lg-11 col-md-12 text-right text-left-xs text-left-sm">
                            <div class="bar__module">
                                <ul class="menu-horizontal text-left">
								     <li class="dropdown">
                                        <a href="/index.php">  <span class="">Home</span></a>
                                        
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                        <a href="/about-us.php">  <span class="">About us</span></a>
                                        
                                        <!--end dropdown container-->
                                    </li>
									<li>
										<a href="services.php">
											<span class="h5">Services</span>
										</a>
									</li>      
									
                                    <li class="dropdown">
                                      <a href="/enterprise.php">  <span class="">Enterprises</span></a>
                                        <!--end dropdown container-->
                                    </li>
                                  
                                    <li class="dropdown">
                                       <a href="/translator.php"> <span class="">Translators</span></a>
             
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                       <a href="/contact.php"> <span class="">Contact us</span></a>
                                    </li>
                                    <?php if(isset($_SESSION['user_id'])){ ?>
                                    <li class="dropdown">
                                       <a href="/dashboard.php"> <span class="">YOUr Order</span></a>
                                    </li>
                                    <?php } ?>
                                  
                                </ul>
                            </div>
                            <!--end module-->
                            <div class="bar__module">
                                <a class="btn btn--sm btn--primary type--uppercase" href="instant_quote.php">
                                    <span class="btn__text">
                                        INSTANT QUOTE
                                    </span>
                                </a>
                            </div>
                            <!--end module-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </nav>
            <!--end bar-->
        </div>

     <?php include_once('fb_login.php');?>