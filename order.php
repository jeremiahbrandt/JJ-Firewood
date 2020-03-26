<?php require_once('couch/cms.php'); ?>
<cms:template title='Order' />
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Page Title-->
	<title>JJ Firewood - Order</title>

	<!--CSS-->
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!--Font Awesome-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<!--Custom-->
	<link rel="stylesheet" type="text/css" href="css/order.css">

	<!--JavaScript-->
	<!--Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!--JQuery-->
 	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
	<!--Custom-->
	<script src="js/global/nav.js"></script>
	<script src="js/global/footer.js"></script>
	
	<script src="js/order.js"></script>
	<script src="js/data/inventory.js"></script>
	<script src="js/data/quantities.js"></script>
	<script src="js/data/cities.js"></script>
	<script src="js/data/states.js"></script>
	
</head>
<body onload="initialize()">

<div class="bg-dark">
	<div id="nav" class="navbar navbar-expand-lg navbar-dark mx-auto"></div>
</div>

<div class="pageContent mx-auto">
	<form id="orderWindow" class="modal" action="order_review.php" method="post">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="orderModalTitle" class="modal-title"><span id="orderModalTitleSpecies"></span> Firewood Order | <span id="orderModalTitleCurrPage"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="orderOne">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div id="orderForm" class="modal-body">
					<form name="orderForm" action="orderForm.php" method="post">
					<div id="orderPage" class="container order">
						<div class="form-group">
							<label for="speciesSelection">Species</label>
							<select class="form-control" id="speciesSelection" name="species"></select>
						</div>
						<div class="form-group">
							<label for="quantitySelection">Quantity</label>
							<select class="form-control quantitySelection" id="quantitySelection" name="quantity"></select>
						</div>
						<div class="form-group">
							<label for="firewoodCost">Firewood Price</label>
							<output class="form-control firewoodPriceDisplay" name="firewoodPrice"></output>
						</div>
					</div>
					<div id="shippingPage" class="container order">
						<div class="form-group">
							<label for="firstName">First Name</label>
							<input type="string" class="form-control" id="firstName" placeholder="First Name" name="firstName">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label>
							<input type="string" class="form-control" id="lastName" placeholder="Last Name" name="lastName">
						</div>
						<div class="form-group">
							<label for="phone">Phone Number</label>
							<input type="string" class="form-control" id="phoneNumber" placeholder="Phone Number" name="phoneNumber">
						</div>
						<div class="form-group">
							<label for="streetLineOne">Street Address Line 1</label>
							<input type="string" class="form-control" id="streetLineOne" placeholder="Street Address Line 1" name="streetLineOne">
						</div>
						<div class="form-group">
							<label for="streetLineTwo">Street Address Line 2</label>
							<input type="string" class="form-control" id="streetLineTwo" placeholder="Street Address Line 2" name="streetLineTwo">
						</div>
						<div class="form-group">
							<label for="citySelection">City</label>
							<select class="form-control" id="citySelection" name="city"></select>
						</div>
						<div class="form-group">
							<label for="stateSelection">State</label>
							<select class="form-control" id="stateSelection" name="state"></select>
						</div>
						<div class="form-group">
							<label for="zipSelection">Zip/Post Code</label>
							<input class="form-control" id="zipSelection" name="zip"></input>
						</div>
						<div class="form-group">
							<label for="specialInstructions">Special Instructions</label>
							<textarea class="form-control" id="specialInstructions" rows="3" name="instructions"></textarea>
						</div>
					</div>
					<div id="paymentPage" class="container order">
						<div class="form-group">
							<label for="firewoodPriceCheckout">Firewood Price</label>
							<output class="form-control firewoodPriceDisplay"></output>
						</div>
						<div class="form-group">
							<label for="deliveryPrice">Delivery Charge</label>
							<output class="form-control deliveryChargeDisplay" name="delivery"></output>
						</div>
						<div class="form-group">
							<label for="taxTotal">Local and State Tax (<span id="taxRateDisplay"></span>%)	</label>
							<output class="form-control taxTotalDisplay" name="tax"></output>
						</div>
						<div class="form-group">
							<label for="finalPrice">Final Price</label>
							<output class="form-control finalPriceDisplay" name="totalPrice"></output>
						</div>
					</div>
					</form>
				</div>
				<div id="orderFooter" class="modal-footer">
					<button type="button" id="previousPageButton" class="btn float-left">Previous</button>
					<button type="button" id="nextPageButton" class="btn float-right">Next</button>
					<button type="button submit"  name="submit" id="submitButton" class="btn float-right">Submit</button>
				</div>
			</div>
		</div>
	</form>
	<div id="inventory" class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 row-cols-1 text-center"></div>
</div>

<div id="footer"></div>
</body>
</html>
<?php COUCH::invoke(); ?>