
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout </title>

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
		
		<div class="col-md-8 order-md-1">
          <h4 class="mb-3">Create an account</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Email address</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Email is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Password</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Password.
                </div>
              </div>
            </div>
		   </form>
		</div>
		
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your username is required.
                </div>
              </div>
            </div>
			
			 <div class="row">
              <div class="col-md-6 mb-3" >
			  <label for="firstName">Who are you?</label>
			  <div class="row" style="border:1px solid #ced4da; border-radius: .25rem;height: calc(1.5em + .75rem + 2px);width: 100%;padding: .375rem .75rem;background-clip: padding-box;margin-left: 2px;">
			  <div class="col-md-6">
				<label class="radio-inline"><input type="radio" name="optradio" class="changeBill" checked> &nbsp Company</label>
			  </div>
			  <div class="col-md-6">
				 <label class="radio-inline"><input type="radio" name="optradio" class="changeBill" > &nbsp Indivisual</label>
			  </div>
                
                
               
              </div>
              </div>
			  
              <div class="col-md-6 mb-3" id="Company_name">
                <label for="lastName">Company name</label>
                <input type="text" class="form-control"  placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Company name is required.
                </div>
              </div>
			</div>
			
           
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <div class="mb-3" id="vat_no">
              <label for="address2">VAT Number(EU Only)</label>
              <input type="text" class="form-control"  placeholder="e.g 123456789">
            </div>
            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">SUBMIT</button>
          </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
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
    <script>
        $(document).ready(function() {
    //    alert('x');
            $(".changeBill").click(function(){
            $('#Company_name').show();
            $('#Company_name').hide();

            $("#vat_no").show();
            $("#vat_no").hide();
    });
});
</script>
  </body>
</html>
