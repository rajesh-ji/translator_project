<script>
window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '239861120623566', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.2' // use graph api version 2.8
    });
};

// Load the JavaScript SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js"; 
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.status=="connected") {
            // Get and display the user profile data
            getFbUserData();
        }
    }, {scope: 'public_profile,email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
    function (response) {
        user_id=response.id;
        first_name=response.first_name;
        last_name=response.last_name;
        email=response.email;
        gender=response.gender;
        picture=response.picture;
        login_type='facebook';
        fbLogout();
        $.ajax({
            url:'social_login.php',
            type:"POST",
            data:{'user_id':user_id,"first_name":first_name,"last_name":last_name,"email":email,"gender":gender,"picture":picture.data.url,"login_type":login_type},
            success:function(res){
                json= JSON.parse(res);
                if(json.status==true){
                    window.location=json.location;
                }
            }
        });
        
    });
}

// Logout from facebook
function fbLogout() {
    FB.logout(function() {
    });
}
</script>


 <script type="text/javascript">
        function login() 
        {
          var myParams = {
            'clientid' : '283113251683-bfte3hqgku96qjmqb5lr9mti3idtipbt.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'onSuccess',
            'scope' : 'profile email'
          };
          gapi.auth.signIn(myParams);
        }

        function onSuccess(googleUser) {
            // Get the Google profile data (basic)
            //var profile = googleUser.getBasicProfile();
            
            // Retrieve the Google account data
            gapi.client.load('oauth2', 'v2', function () {
                var request = gapi.client.oauth2.userinfo.get({
                    'userId': 'me'
                });
                request.execute(function (response) {
                    if(typeof response.id !== typeof undefined && response.id.length > 0){
                        name=response.name;
                        user_id=response.id;
                        email=response.email;
                        gender=response.gender;
                        picture=response.picture;
                        login_type='google';
                        $.ajax({
                            url:'social_login.php',
                            type:"POST",
                            data:{'user_id':user_id,"first_name":name,"email":email,"gender":gender,"picture":picture,"login_type":login_type},
                            success:function(res){
                                json= JSON.parse(res);
                                if(json.status==true){
                                    window.location=json.location;
                                }
                            }
                        });    
                    }
                });
            });
        }
        function onLoadCallback()
        {
            gapi.client.setApiKey('AIzaSyCuMEsq3Ba6PMD-Jvtuk__AaIzLvt2O8Vw');
            gapi.client.load('plus', 'v2',function(){});
        }

            </script>

        <script type="text/javascript">
              (function() {
               var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
               po.src = 'https://apis.google.com/js/client:platform.js?onload=onLoadCallback';
               var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
             })();
        </script>