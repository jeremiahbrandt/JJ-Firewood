<?php 
    session_start(); 
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--Page Title-->
        <title>Order Review</title>
        
        <!--CSS-->
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--Font Awesome-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
        <script src="js/global/footer.js"></script>
        <script src="js/global/nav.js"></script>
    </head>
    <body>
        <div class="bg-dark">
            <div id="nav" class="navbar navbar-expand-lg navbar-dark mx-auto"></div>
        </div>

          <?php
             if($_SERVER["REQUEST_METHOD"] == "POST") {
                $_SESSION["species"] = $_POST["species"];
                 switch($_SESSION["species"]) {
                    case "Elm":
                        $_SESSION["speciesPrice"] = 200;
                        break;
                    case "Locust":
                        $_SESSION["speciesPrice"] = 300;
                        break; 
                } 
                $_SESSION["quantity"] = $_POST["quantity"];
                 switch($_SESSION["quantity"] ) {
                    case "1/4 Cord":
                        $_SESSION["quantityMultiplier"] = 0.35;
                        break;
                    case "1/2 Cord":
                        $_SESSION["quantityMultiplier"] = 0.65;
                        break;
                    case "1 Cord":
                        $_SESSION["quantityMultiplier"] = 1;
                        break;
                    case "2 Cord":
                        $_SESSION["quantityMultiplier"] = 1.75;
                        break;
                } 
                $_SESSION["firstName"] = $_POST["firstName"];
                $_SESSION["lastName"] = $_POST["lastName"];
                $_SESSION["phoneNumber"] = $_POST["phoneNumber"];
                $_SESSION["emailAddress"] = $_POST["emailAddress"];
                $_SESSION["streetLineOne"] = $_POST["streetLineOne"];
                $_SESSION["streetLineTwo"] = $_POST["streetLineTwo"];
                $_SESSION["city"] = $_POST["city"];
                $_SESSION["state"] = $_POST["state"];
                $_SESSION["zip"] = $_POST["zip"];
                $_SESSION["deliveryDateTime"] = $_POST["deliveryDateTime"];
                $_SESSION["instructions"] = $_POST["instructions"];
                $_SESSION["estimatedMiles"] = $_POST["estimatedMiles"];
                $_SESSION["estimatedDeliveryCharge"] = ($_SESSION["estimatedMiles"] * 0.9);
                $_SESSION["totalPrice"] = ($_SESSION["speciesPrice"] * $_SESSION["quantityMultiplier"]) + $_SESSION["estimatedDeliveryCharge"];
            } 
            ?>

<form class="container" action="order_sent.php" method="post">
    <h3 class="text-center">Order Review</h3>
     <div class="row">
        <div class="form-group col text-center"><label class="float-left" for="firewoodType">Firewood Type</label><input class="float-right" readonly value="<?php echo $_SESSION['species'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Quantity</label><input class="float-right" readonly value="<?php echo $_SESSION['quantity'] ?>"></div>
    </div> 
     <div class="row">
        <div class="form-group col text-center"><label class="float-left">Estimated Miles</label><input class="float-right" readonly value="<?php echo $_SESSION['estimatedMiles'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Estimated Delivery Charge</label><input class="float-right" readonly value="<?php echo $_SESSION['estimatedDeliveryCharge'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">Firewood Price</label><input class="float-right" readonly value="<?php echo $_SESSION['speciesPrice'] * $_SESSION['quantityMultiplier'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Estimated Total Price</label><input class="float-right" readonly value="<?php echo $_SESSION['totalPrice'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">First Name</label><input class="float-right" readonly value="<?php echo $_SESSION['firstName'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Last Name</label><input class="float-right" readonly value="<?php echo $_SESSION['lastName'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">Phone Number</label><input class="float-right" readonly value="<?php echo $_SESSION['phoneNumber'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Email Address</label><input class="float-right" readonly value="<?php echo $_SESSION['emailAddress'] ?>"></div>
    </div> 
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">Street Line One</label><input class="float-right" readonly value="<?php echo $_SESSION['streetLineOne'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Street Line Two</label><input class="float-right" readonly value="<?php echo $_SESSION['streetLineTwo'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">City</label><input class="float-right" readonly value="<?php echo $_SESSION['city'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">State</label><input class="float-right" readonly value="<?php echo $_SESSION['state'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">Zip</label><input class="float-right" readonly value="<?php echo $_SESSION['zip'] ?>"></div>
        <div class="form-group col text-center"><label class="float-left">Delivery Date and Time</label><input class="float-right" readonly value="<?php echo $_SESSION['deliveryDateTime'] ?>"></div>
    </div>
    <div class="row">
        <div class="form-group col text-center"><label class="float-left">Special Instructions</label><input class="float-right" readonly value= "<?php echo ($_SESSION['instructions']) ?>"></div>
    </div> 
    <div class="row">
        <a href="order.html" class="btn float-left orderReviewButton">Back</a>
        <button type="submit" class="btn float-right orderReviewButton">Place Order</button>
    </div>
</form>
        </div>
        <div id="footer"></div>
    </body>
</html>