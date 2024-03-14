<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

		<!-- Bootstrap core CSS -->
		<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- Mandatory js duitku bundle  -->
		<!-- Switch if using sandbox / production  -->
		<script src="https://app-sandbox.duitku.com/lib/js/duitku.js"></script>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
		<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
		<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>
	
	<body>
		<div class="col-md-6 col-lg-4 offset-lg-4 offset-md-3 mt-5">
		    <div class="bg-light p-5 border shadow">
			<!-- Form -->
			<form>         

			    <center><h4>Duitku Pop Example</h4></center>
			    <br>

			    <div class="mb-4">
				<label>Amount</label>
				<input required id="amount" min="1" value="10000" type"number" class="form-control" placeholder="10000">                
			    </div>

			    <div class="mb-4">
				<label>Product Detail</label>
				<input required id="productDetail" value="Sepatu Trendy" type"text" class="form-control" placeholder="Sepatu Trendy">                
			    </div>

			    <div class="mb-4">
				<label>Email</label>
				<input required id="email" value="customer@duitku.com" type"text" class="form-control" placeholder="customer@duitku.com">                
			    </div>

			    <div class="mb-4">
				<label>Phone Number</label>
				<input required id="phoneNumber" value="08123456789" type"number" class="form-control" placeholder="08123456789">                
			    </div>

			    <div class="mb-4">  
				<label>Payment Interface</label>			
				<select id="paymentUi" class="form-control">
					<option value="1">PopUp UI </option>
					<option value="2">Redirect UI</option>
				</select>               
			    </div>

			    <button type="button" id="submit" class="btn btn-primary w-100 my-3 shadow" onClick="pay();">Pay With Duitku</button>

			</form>
			<!-- Form -->
		    </div>
		</div>
		

		<!-- Request to backend with ajax (example)  -->
		<script type="text/javascript">

		    function pay() {
				var amount = document.getElementById("amount").value ;
				var productDetail = document.getElementById("productDetail").value ;
				var email = document.getElementById("email").value ;
				var phoneNumber = document.getElementById("phoneNumber").value ;
				var paymentUi = document.getElementById("paymentUi").value ;
				$.ajax({
				type: "POST",
				data:{
					  paymentAmount: amount, 
					  productDetail: productDetail, 
					  email: email, 
					  phoneNumber: phoneNumber
				},
				url: 'http://localhost:8080/medizo-15Nov/admin/admin_backend_duitku.php',
				dataType: "json",
				cache: false,
				success: function (result) {
							console.log(result.reference);
							console.log(result);

							if(paymentUi === "2"){ // user redirect payment interface
								window.location = result.paymentUrl;
							}

							checkout.process(result.reference, {
								successEvent: function(result){
									// tambahkan fungsi sesuai kebutuhan anda
									console.log('success');
									console.log(result);
									alert('Payment Success');
								},
								pendingEvent: function(result){
									// tambahkan fungsi sesuai kebutuhan anda
									console.log('pending');
									console.log(result);
									alert('Payment Pending');
								},
								errorEvent: function(result){
									// tambahkan fungsi sesuai kebutuhan anda
									console.log('error');
									console.log(result);
									alert('Payment Error');
								},
								closeEvent: function(result){
									// tambahkan fungsi sesuai kebutuhan anda
									console.log('customer closed the popup without finishing the payment');
									console.log(result);
									alert('customer closed the popup without finishing the payment');
								}
							});

			    },
			});

		    }
		</script>
		

	</body>
</html>
 