<?php
    if(isset($_POST['submit'])) {
        $name = "firstName lastName";
        $subject = "Firewood Order";
        $mailFrom = "Client's Email Address";
        $message = "Message";

        $mailTo = "jeremiah@jbrandtdesign.com";
        $headers = "You received an email from ".$mailFrom;
        $txt = "Message from ".$name.":\n\n".$message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location : index.html");
    }
?>