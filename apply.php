<?php include('config.php');
// if(!$_SESSION['user_id']){
//     header('Location: personal-info.php');
// }
// ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>apply as a translator</title>

<link rel="stylesheet" href="css/inspact.css">
</head>
<body>
<table width=740 align="center">
<tr><td>
	    <table width=1000 border=0 cellpadding=0 cellspacing=0>
        <tr>
            <td colspan=3 align="right" style="font-weight: bold; padding-bottom: 0px;">

                <!--	<a href="top_terms.php" target="_blank">Terms and Conditions</a>
			<a href="../download/terms.pdf" download>Terms and Conditions</a>
			&nbsp;|&nbsp;-->
                <a href="" target="_blank">Our Translators</a>
                &nbsp;|&nbsp;
                <a href="" target="_blank">Our Customers</a>
                &nbsp;|&nbsp;
                                <a href="" target="_blank">About us</a>
                &nbsp;|&nbsp;
                <a href="">Contact Us</a>
            </td>
        </tr>
        <tr>
            <td valign="top"><a href="translator.php"><img src="img/logo-dark.png" style="height:35px;"/></a></td>
            <td width=30px>&nbsp;</td>
            <td class="medium" valign="middle" style="line-height: 1.2;">
                <div style="text-align: center; padding-bottom: 4px; font-weight: bold; color: #009900;">
                    "They are very professional, the Intranet is user-friendly and the project managers are extremelly helpful. I would definitely encourage you to work for them. They have paid in time."
                </div>
                <div class="small" style="text-align: right; padding-top: 2px;">
                   <a href="" target=""><b>more references</b></a>
                </div>
            </td>
        </tr>
    </table>
    </td></tr>
<tr><td>
<h1 style="padding-top: 6px;">Join a global team... register now!</h1>
<div style="text-align: center; font-size: 11px; font-weight: bold; padding-top: 5px; padding-bottom: 10px;">- 209485 translators &bull; 4555 language combinations &bull; 181664 customers -</div>
<div class="section">
<h2>New Users:</h2>
<table border=0 cellpadding=0 cellspacing=0>
<tr>

<td width=450 align="right">
<!-- ============================================================================================ -->
	<form  method="POST" action="apply.php">
	<!-- <input type=hidden name=c value=''>
        <input type=hidden name=referrer value=''> -->
  <table align="right" border=0 cellpadding=6 cellspacing=0 class="i100wp">
        <tr>
    	    <div class="error"></div>
        </tr>
    <tr>
    	<td>1) Choose a username:</td><td width=30>&nbsp;</td><td><input type="text" id="name" name="name"></td>
    </tr>
    <tr>

    	<td>2) Choose a password:</td><td width=30>&nbsp;</td><td><input type="password" id="password" name="psw"></td>
    </tr>
    <tr>

    	<td>3) Confirm password:</td><td width=30>&nbsp;</td><td><input type="password" id="con_pass" name="confirm_psw"></td>
    </tr>
    <tr>

    	<td>4) Enter your email:</td><td width=30>&nbsp;</td><td><input type="text" id="email" name="email"></td>
    </tr>
    <tr>
        <td colspan="3" align="right"><br/><br/>
          <small>By registering I accept the <a href="">Terms and Conditions</a> and the <a href="">Privacy Policy</a></a></small>
        </td>
    </tr>
   
    <tr>
    <td colspan="3" align="right">
        <input type="submit" name="new_user" id="submit" class="button" value="Register">
    </tr>
  </table>
  </form>
  <!-- ========================================================================================= -->
</td>
<td width=100>&nbsp;</td>
<td valign="top">
	<h2 style="margin-bottom: 7px;">Registration takes 10 mins:</h2>
	<b>We need your...</b>
	<ul style="margin-top: 4px; margin-left: 25px;line-height: 1.25;">
	<li>Personal details
	<li>Experience &amp; skills
	<li>Languages &amp; rates
	</ul>
</td></tr>
</table>

</div>

<div class="section">
	<h2>Returning Users: </h2>
	<table border=0 cellpadding=6 cellspacing=0 class="i100wp">
        <tr>
		<td width=450 align="right">
  	<form action="top.php" method="post">
        <table align="right" border=0 cellpadding=6 cellspacing=0>
          	<tr>

            	<td align="right">Username:</td>
            	<td>&nbsp;</td>
    					<td><input name="login" type=text size=20 required></td>
  					</tr>
    				<tr>

           		<td align="right">Password:</td>
           		<td>&nbsp;</td>
    					<td><input name="psw" type=password size=20 required></td>
    				</tr>
    				<tr>
        			<td colspan=3 align="right"><input type=submit class="button" name="dologin" value="Log in"></td>
    				</tr>
  		</table>
  	</form>
  	</td>
  	<td width=100>&nbsp;</td>


	<td valign="top">
  		<form action="index.php" method="post">
	  		<h2 style="margin-bottom: 5px;">Forgotten your password?</h2>
	  		<div style="padding-bottom: 2px;">Enter your email address<br>or username here:</div>

	  		<table border=0 cellpadding=0 cellspacing=0><tr>
				<td><input type="text" size=25 name="pwd_request_input" required></td>
				<td>&nbsp;</td>
				<td><input type="submit" class="button" name="pwd_request" value="Send"></td>
			</tr>
           </table>
		</form>
  	</td>

		</tr>
  </table>
</div>


</td></tr>
</table>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


 <script>
        $(document).ready(function(){
            $('#submit').on('click',function(){
                console.log('console called!');
                var username  = $("#name").val();
                var pass  = $("#con_pass").val();
                var con_pass  = $("#name").val();
                var email  = $("#email").val();
                var error = $(".error").html();
               
                
               
                if(pass===con_pass){
                    alert("password mismatch!");     
                }else{
                    $.ajax({
                        type:'POST',
                        url: 'client.php',
                        data:{
                            mgs:"login",
                            username:username,
                            pass:pass,
                            email:email
                        },
                        success:function(response){
                            
                            
                            if(response=="success"){
                                alert("successfully signup!");
                                 window.location.href="index.php";
                                 return false;
                            }
                            else{
                                alert("this username already taken!");
                              //  window.location.href="apply.php";
                            }
                        }
                    });
                    return false;
                }

                
            });
        }); 
  </script> 


</body>
</html>
