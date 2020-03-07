<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stack Multipurpose</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stack-interface.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flickity.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/iconsmind.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jquery.steps.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/font-rubiklato.css" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700%7CRubik:300,400,500" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link href="dist/css/select2.min.css" rel="stylesheet" />
        
        <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css " rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        </style>
        
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
                                <li>
                                    <div class="modal-instance">
                                        <a href="#" class="modal-trigger">Login</a>
                                        <div class="modal-container">
                                            <div class="modal-content section-modal">
                                                <section class="unpad ">
                                                    <div class="container">
                                                        <div class="row justify-content-center">
                                                            <div class="col-md-6">
                                                                <div class="boxed boxed--lg bg--white text-center feature">
                                                                    <div class="modal-close modal-close-cross"></div>
                                                                    <h3>Login to Your Account</h3>
                                                                    <a class="btn block btn--icon bg--facebook type--uppercase" href="#">
                                                                        <span class="btn__text">
                                                                            <i class="socicon-facebook"></i>
                                                                            Login with Facebook
                                                                        </span>
                                                                    </a>
                                                                    <a class="btn block btn--icon bg--twitter type--uppercase" href="#">
                                                                        <span class="btn__text">
                                                                            <i class="socicon-twitter"></i>
                                                                            Login with Twitter
                                                                        </span>
                                                                    </a>
                                                                    <hr data-title="OR">
                                                                    <div class="feature__body">
                                                                        <form action="login.php" method="POST">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input name="username" type="text" placeholder="Username" />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <input name="password" type="password" placeholder="Password" />
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="input-radio">
                                                                                        <input type="radio" name="login_with" value="3" id="translator">
                                                                                        <label ></label>
                                                                                    </div>                                                                                   
                                                                                        <span>login with translator</span>
                                                                                   
                                                                                    <div class="input-radio">
                                                                                        <input type="radio" name="login_with" value="2">
                                                                                        <label ></label>
                                                                                    </div>                                                                                   
                                                                                        <span>login with Customer</span>
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
                                                                                    <button name="submit" class="btn btn--primary type--uppercase" type="submit">Login</button>
                                                                                </div>
                                                                            </div>
                                                                            <!--end of row-->
                                                                        </form>
                                                                        <span class="type--fine-print block">Dont have an account yet?
                                                                            <a href="#">Create account</a>
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
                                                            <img alt="image" src="img/cowork-11.jpg" />
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row justify-content-end">
                                                            <div class="col-lg-7">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-10 col-md-11">
                                                                        <h2>Create an account</h2>
                                                                        <p class="lead">Get started with a 14 day free trial, No credit card required &mdash; cancel at any time.</p>
                                                                        <a class="btn block btn--icon bg--facebook type--uppercase" href="#">
                                                                            <span class="btn__text">
                                                                                <i class="socicon-facebook"></i>
                                                                                Sign up with Facebook
                                                                            </span>
                                                                        </a>
                                                                        <a class="btn block btn--icon bg--twitter type--uppercase" href="#">
                                                                            <span class="btn__text">
                                                                                <i class="socicon-twitter"></i>
                                                                                Sign up with Twitter
                                                                            </span>
                                                                        </a>
                                                                        <hr data-title="OR">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <input type="email" name="Email Address" placeholder="Email Address" />
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <input type="password" name="Password" placeholder="Password" />
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <button type="submit" class="btn btn--primary type--uppercase">Create Account</button>
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
                                <li>
                                    <a href="#" data-notification-link="side-menu">
                                        <i class="stack-dot-3"></i>
                                    </a>
                                </li>
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
                        <a href="#">
                            <span class="h5">About Stack</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Careers</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Investors</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Locations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="h5">Contact</span>
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
                            <a href="index.html">
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
                                      <a href="enterprise.php">  <span class="">Enterprises</span></a>
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                        <span class="">Developers</span>
                                        
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                       <a href="translator.php"> <span class="">Translators</span></a>
                                        
                                        <!--end dropdown container-->
                                    </li>
                                    <li class="dropdown">
                                        <span class="">Labs</span>
                                       
                                        <!--end dropdown container-->
                                    </li>
                              
                                  
                                </ul>
                            </div>
                            <!--end module-->
                            <div class="bar__module">
                                <a class="btn btn--sm btn--primary type--uppercase" href="contact.php">
                                    <span class="btn__text">
                                        Contact us
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