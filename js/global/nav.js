$(document).ready(function(){
    buildNav();
    highlightActiveLink();
});

function buildNav() {
    document.getElementById("nav").innerHTML = '' +
        '   <a class="navbar-brand" href="index.html"><img class="mainNavLogo" src="images/logo.png" width="30" height="30" alt="JJ Firewood logo">JJ Firewood</a>' +
        '	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">' +
        '		<span class="navbar-toggler-icon"></span>' +
        '	</button>' +
        '' +
        '<div class="collapse navbar-collapse" id="navbarSupportedContent">' +
        '		<ul class="navbar-nav mr-auto">' +
        '			<li class="nav-item">' +
        '				<a id="homeLink" class="nav-link" href="index.html">Home</a>' +
        '			</li>' +
        '			<li class="nav-item">' +
        '				<a id="orderLink" class="nav-link" href="order.html">Order</a>' +
        '			</li>' +
        '			<li class="nav-item">' +
        '				<a id="contactLink" class="nav-link" href="contact.html">Contact Us</a>' +
        '			</li>' +
        '		</ul>' +
        '	</div>';
}

function highlightActiveLink() {
    switch(document.title) {
        case ("JJ Firewood - Home"):
            $("#homeLink").addClass("active");
            break;
        case ("JJ Firewood - Order"):
            $("#orderLink").addClass("active");
            break;
        case ("JJ Firewood - Contact Us"):
            $("#contactLink").addClass("active");
            break;
    }
}
