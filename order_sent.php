<?php 
    session_start(); 
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--Page Title-->
        <title>Order Sent!</title>
        
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

        <form class="container">
            <h2>Thank you <?php echo $_SESSION["firstName"] ?>, for your order. We will contact you soon!</h2>
        </form>

        <?php 
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            
            $emailMessage = 'First Name: ' . $_SESSION['firstName'] . '<br>'; 
            $emailMessage .= 'Last Name: ' .$_SESSION['lastName'] . '<br>';
            $emailMessage .= 'Phone Number: ' .$_SESSION['phoneNumber'] . '<br>';
            $emailMessage .= 'Email Address: ' .$_SESSION['emailAddress'] . '<br>';
            $emailMessage .= 'Street Line One: ' .$_SESSION['streetLineOne'] . '<br>';
            $emailMessage .= 'Street Line Two: ' .$_SESSION['streetLineTwo'] . '<br>';
            $emailMessage .= 'City: ' .$_SESSION['city'] . '<br>';
            $emailMessage .= 'State: ' .$_SESSION['state'] . '<br>';
            $emailMessage .= 'Zipcode: ' .$_SESSION['zip'] . '<br>';
            $emailMessage .= 'Delivery Date and Time: ' .$_SESSION['deliveryDateTime'] . '<br>';
            $emailMessage .= 'Special Instructions: ' .$_SESSION['instructions'] . '<br>';
            $emailMessage .= 'Estimated Miles: ' .$_SESSION['estimatedMiles'] . '<br>';
            $emailMessage .= 'Estimated Delivery Charge: ' .$_SESSION['estimatedDeliveryCharge'];
            
            mail("jeremiah@jbrandtdesign.com", "Firewood Order", $emailMessage, $headers);        
        ?>

        <div id="footer"></div>
    </body>
</html>