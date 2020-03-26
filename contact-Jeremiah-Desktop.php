<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <!--Page Title-->
        <title>Message Sent!</title>
        
        <!--CSS-->
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--Font Awesome-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="css/contact.css">
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
            <div id="nav" class="navbar navbar-expand-md navbar-dark mx-auto"></div>
        </div>

        <?php
            $name = $email = $phone = $message = " ";

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $message = $_POST["message"];
            }

            echo "<div class='container sentMessage'><p>Thanks $name, we will contact you soon!</p></div>";

            $emailMessage = "Name: $name \n 
            Email: $email \n 
            Phone Number: $phone \n 
            Message: \n $message";

            mail("jeremiah@jbrandtdesign.com", "Contact Message", $emailMessage);
        ?>

        <div id="footer"></div>
    </body>
</html>