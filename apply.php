<?php 
if(isset($_POST['dologin'])){
    include('config.php');
    // include('admin/include/config.php');
    
    extract($_POST);
    $query =mysqli_query($conn, "select * from users where username='$username' and role_id='3'");
    if($query){
        $row = mysqli_fetch_assoc($query);
        
        
        if($row['password']==$pwd){
            // print_r($row);
            if($row['status']==2){
                $_SESSION['login_error'] = '**You were block by admin.';
            }else{                
                $last_login = date('Y-m-d');
                $id = $row['id'];
                $query = mysqli_query($conn,"update users set last_login = '$last_login' where id = '$id'");
                 $_SESSION['login_id'] = $row['role_id'];
                $_SESSION['user_id'] = $row['id'];
                header('Location: admin/index.php');
            }
           
            // echo "<script>window.location.href='demo1.php'; </script>";
           
        }
        else{
            $_SESSION['login_error'] = '**wrong password';
        }
    }else{
        $_SESSION['login_error'] = '**This username not exists please signup';
    }
}
?>


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
	<form  method="POST" >
	<!-- <input type=hidden name=c value=''>
        <input type=hidden name=referrer value=''> -->
  <table align="right" border=0 cellpadding=6 cellspacing=0 class="i100wp">
        <tr>
            <td colspan="2">
            <h3 id="error" style="color:red;"></h3>
            </td>
        </tr>
    <tr>
    	<td>1) Choose a username:</td><td width=30>&nbsp;</td><td><input type="text" id="name" ></td>
    </tr>
    <tr>

    	<td>2) Choose a password:</td><td width=30>&nbsp;</td><td><input type="password" id="password" ></td>
    </tr>
    <tr>

    	<td>3) Confirm password:</td><td width=30>&nbsp;</td><td><input type="password" id="con_pass" ></td>
    </tr>
    <tr>

    	<td>4) Enter your email:</td><td width=30>&nbsp;</td><td><input type="text" id="email" ></td>
    </tr>
    <tr>
        <td colspan="3" align="right"><br/><br/>
          <small>By registering I accept the <a href="">Terms and Conditions</a> and the <a href="">Privacy Policy</a></a></small>
        </td>
    </tr>
   
    <tr>
    <td colspan="3" align="right">
        <input type="submit" name="new_user" id="signupBtn" class="button" value="Register">
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
    <span style="color:red;font-weight:500;"><?php if(isset($_SESSION['login_error'])){echo $_SESSION['login_error']; $_SESSION['login_error']='';}?></span>
	<table border=0 cellpadding=6 cellspacing=0 class="i100wp">
        <tr>
		<td width=450 align="right">
  	<form action="apply.php" method="post">
      
        <table align="right" border=0 cellpadding=6 cellspacing=0>
          	<tr>

            	<td align="right">Username:</td>
            	<td>&nbsp;</td>
    					<td><input name="username" type=text size=20 required></td>
  					</tr>
    				<tr>

           		<td align="right">Password:</td>
           		<td>&nbsp;</td>
    					<td><input name="pwd" type=password size=20 required></td>
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

<script src="js/jquery-3.1.1.min.js"></script>

 <script>
        $(document).ready(function(){
            
                $('#signupBtn').click(function(){
                    var username = $('#name').val().trim();
                    var pass = $('#password').val().trim();
                    var conpass = $('#con_pass').val().trim();
                    var email = $('#email').val().trim();
                   
                    if(username==""||pass==""||conpass==""||email==""){
                            $('#error').html("null field not allowed");
                            return false;
                        }else if(pass.length<8 || conpass.length<8){
                            $('#error').html("password must be 8 charactor");
                            return false;
                        }else if(pass!==conpass){
                            $('#error').html("password or confirm password are not same");
                            return false;
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
                                success:function(data){
                                    if(data == 1){
                                        $("#error").html("This Username or Email already taken!");                                        
                                    }else if(data == 'success'){
                                        window.location.href="admin/profile.php";                                        
                                    }else{
                                        $("#error").html("505 error!");
                                    }

                                }
                            });
                        }
                        return false;      
                });
                
            
        }); 
  </script> 


</body>
</html>


