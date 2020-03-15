
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light" style="margin-top: 3%;">

    <div class="container">
     <div class="row">
		<div class="col-md-4"><img src="img/logo-dark.png" alt="" style="height:25px;"></div>
		<div class="col-md-2" style="padding-left: 80px; color: #798390;"><font>Need Help[?]</font></div>
		<div class="col-md-2"><button class="btn btn-info" style="margin-top: -5px;">contact us</button></div>
		<div class="col-md-4"></div>
	 </div>
	<section style="margin-top: 4%;">
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4" style="background-color: #f2f5f7;">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">ORDER SUMMARY</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">From <h6><b>English(GB)to:</b></h6>
                <small class="text-muted">Hindi</small>
              </div>
              <span class="text-muted">1 language</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Subject</h6>
              </div>
              <span class="text-muted">General</span>
            </li>
			 <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Word Count</h6>
              </div>
              <span class="text-muted">100 Word</span>
            </li>
			 <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Price Per Word</h6>
              </div>
              <span class="text-muted">$22.098/word</span>
            </li>
			 <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Delivery date</h6>
              </div>
              <span class="text-muted">Friday 06 Mar 5:00PM IST</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>

		  <hr class="mb-4">
          
        </div>
		<div class="col-md-8 order-md-1" style="text-align:center;">
          <h1><b>Thank you! Order confirmed.</b></h1></br>
          <h5>Your order &nbsp; 123455 &nbsp; has been confirmed and is now in progress.</h5>
          <h5>You will receive the translation by <b>FRI 06 Mar 5:00 PM IST</b></h5>
		  
		  <h2 style="line-height: 100px;"><b>Want to pay now?</b></h2>
         <H6 style="line-height: 65px;">if you want you can pay now or within 5 days of translation delivery.</H6>
		 <button class="btn btn-primary" >Pay now</button>
		</div>
		
		
    
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
	  </section>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
