let selectedPageIndex;
let selectedSpecies;
let selectedQuantity;
let selectedCity;


let speciesSelection = new Array();
let quantitySelection = new Array();
let citySelection = new Array();
let stateSelection = new Array();

var pricePerMile = .9;

function initialize() {
	populateArrayVariables();
	populateInventoryCatalog();
	populateFormFields();
	addEventListeners();
	updateOrder();
}

function populateArrayVariables() {
	//Populates Firewood Types Array
	speciesSelection.push(osageOrange);
	speciesSelection.push(elm);
	speciesSelection.push(locust);
	speciesSelection.push(spruce);
	speciesSelection.push(oak);
	speciesSelection.push(pine);
	speciesSelection.push(maple);
	speciesSelection.push(birch);
	speciesSelection.push(hickory);
	//Sets default selected species
	updateSelectedSpecies(osageOrange);

	//Populates Quantity Selection Array
	quantitySelection.push(quarterCord);
	quantitySelection.push(halfCord);
	quantitySelection.push(fullCord);
	quantitySelection.push(twoCord);
	//Sets default selected quantity
	updateSelectedQuantity(fullCord);

	//Populates City Selection Array
	citySelection.push(ballwin);
	citySelection.push(blueSprings);
	citySelection.push(capeGirardeau);
	citySelection.push(chesterfield);
	citySelection.push(columbia);
	citySelection.push(eastIndependence);
	citySelection.push(florissant);
	citySelection.push(gladstone);
	citySelection.push(grandview);
	citySelection.push(hazelwood);
	citySelection.push(independence);
	citySelection.push(jeffersonCity);
	citySelection.push(joplin);
	citySelection.push(kansasCity);
	citySelection.push(kirkwood);
	citySelection.push(leesSummit);
	citySelection.push(liberty);
	citySelection.push(marylandHeights);
	citySelection.push(mehlville);
	citySelection.push(oFallon);
	citySelection.push(oakville);
	citySelection.push(raytown);
	citySelection.push(saintCharles);
	citySelection.push(saintJoseph);
	citySelection.push(saintLouis);
	citySelection.push(saintPeters);
	citySelection.push(springfield);
	citySelection.push(universityCity);
	citySelection.push(wentzville);
	citySelection.push(wildwood);
	//Sets default selected city
	updateSelectedCity(ballwin);

	//Populates States Selection Array
	stateSelection.push(missouri);
}

function populateInventoryCatalog() {
	//Populates inventory catalog
	speciesSelection.forEach(function(curr){
		document.getElementById("inventory").innerHTML = document.getElementById("inventory").innerHTML +
		'<div class="">' +
			'<div class="card invCard">' +
				'<img src="images/inventory/' + curr.name + '.jfif" class="card-img-top img-fluid invImg" alt="' + curr.displayName + '">' +
				'<span class="card-text descriptionOverlay align-middle">' + curr.description + '</span>' +
				'<div class="card-body">' +
					'<select class="quantitySelection quantitySelectionCatalog input-group rounded"></select>' +
					'<h4 class="card-title">' + curr.displayName + '</h4>' +
					'<h5 class="card-text">BTUs (million): ' + '<span class="BTUDisplay">' + curr.btu + '</span>' + '</h5>' +	
					'<h5 class="card-text">Price: ' + '<span class="priceDisplay"></span>' + '</h5>' +				
					'<button class="btn btn-primary orderButton" data-toggle="modal" data-target="#orderWindow" onClick="updateSelectedSpecies(' + curr.name + ')">Order</button>' +
				'</div>' +
			'</div>' +
		'</div>'
	});
}

function populateFormFields() {
	//Populates species selection form field
	speciesSelection.forEach(function(curr) {
		document.getElementById("speciesSelection").innerHTML = document.getElementById("speciesSelection").innerHTML + "<option>" + curr.displayName + "</option>";
	})
	document.getElementById("speciesSelection")

	//Populates quantity selection form fields
	let quantitySelectionFormFields = document.getElementsByClassName("quantitySelection");
	for(let i=0; i<quantitySelectionFormFields.length; i++){
		quantitySelection.forEach(function(curr){
			quantitySelectionFormFields.item(i).innerHTML = quantitySelectionFormFields.item(i).innerHTML + "<option>" + curr.displayName + "</option>";
		});
	}

	//Populates city selection form field
	citySelection.forEach(function(curr){
		document.getElementById("citySelection").innerHTML = document.getElementById("citySelection").innerHTML +
		"<option>" + curr.displayName + "</option>";
	});

	//Populates state selection form field
	stateSelection.forEach(function(curr){
		document.getElementById("stateSelection").innerHTML = document.getElementById("stateSelection").innerHTML +
		"<option>" + curr.displayName + "</option>";
	});
}

function updateSelectedSpecies(selectedSpeciesInput) {
	selectedSpecies = selectedSpeciesInput;
}

function updateSelectedQuantity(selectedQuantityInput) {
	selectedQuantity = selectedQuantityInput;
}

function updateSelectedCity(selectedCityInput) {
	selectedCity = selectedCityInput;
}

function addEventListeners() {
	//Adds event listeners to all order buttons
	let orderButtons = document.getElementsByClassName("orderButton");
	for(let i=0; i<orderButtons.length; i++){
		orderButtons.item(i).addEventListener("click", showOrderModal);
	}

	//Adds event listener to firewood species selection
	document.getElementById("speciesSelection").addEventListener("change", () => {
		speciesSelection.map(function(curr) {
			if(document.getElementById("speciesSelection").value == curr.displayName) {
				updateSelectedSpecies(curr);
			}
		})
	//Updates calculated fields
	updateOrder();
	});

	//Adds event listeners to quantity selections
	let quantitySelectionFormFields = document.getElementsByClassName("quantitySelection");
	for(let i=0; i<quantitySelectionFormFields.length; i++){
		quantitySelectionFormFields.item(i).addEventListener("change", function(){
			//Sets quantity selection let
			quantitySelection.map(function(curr) {
				if(quantitySelectionFormFields.item(i).value == curr.displayName) {
					updateSelectedQuantity(curr);
				}
			})
			
			//Updates all quantity selection form fields
			for(let j=0; j<quantitySelectionFormFields.length; j++) {
				quantitySelectionFormFields.item(j).value = this.value;

			//Updates calculated fields
			updateOrder();
			}
		});
	}

	//Adds event listener to city selection
	document.getElementById("citySelection").addEventListener("change", () => {
		//Sets city selection let
		citySelection.map((curr) => {
			if(document.getElementById("citySelection").value == curr.displayName) {
				updateSelectedCity(curr);
			}
		})

		//Updates calculated fields
		updateOrder();
	});

	//Adds event listener to state selection
	document.getElementById("stateSelection").addEventListener("change", updateOrder);

	//Adds event listener to previous page button
	document.getElementById("previousPageButton").addEventListener("click", previousPage);

	//Adds event listener to next page button
	document.getElementById("nextPageButton").addEventListener("click", nextPage);

	//Adds event listener to submit button
	document.getElementById("submitButton").addEventListener("click", submitOrder);
}

function showOrderModal() {
	//TODO: UPDATE HEADER
	selectedPageIndex = 0;
}

function updateOrder() {
	//Calculates and sets BTU
	let BTUDisplays = document.getElementsByClassName("BTUDisplay");
	for(let i=0; i<BTUDisplays.length; i++) {
		let selectedSpecies = speciesSelection.find(function(curr) {
			return curr.displayName == BTUDisplays.item(i).parentElement.previousSibling.innerHTML;
		});
		switch(BTUDisplays.item(i).parentElement.previousSibling.previousSibling.value){
			case "1/4 Cord":
				BTUDisplays.item(i).innerHTML = (selectedSpecies.btu * .25).toFixed(2) ;
				break;
			case "1/2 Cord":
				BTUDisplays.item(i).innerHTML = (selectedSpecies.btu * .5).toFixed(2);
				break;
			case "1 Cord":
				BTUDisplays.item(i).innerHTML = (selectedSpecies.btu).toFixed(2);
				break;
			case "2 Cord":
				BTUDisplays.item(i).innerHTML = (selectedSpecies.btu * 2).toFixed(2);
				break;
				
		}
	}

	//Calculates and sets firewood Price
	//For catalog
	let catalogPriceDisplays = document.getElementsByClassName("priceDisplay");
	for(let i=0; i<catalogPriceDisplays.length; i++) {
		let currWood = speciesSelection.find(function(curr) {
			return curr.displayName == BTUDisplays.item(i).parentElement.previousSibling.innerHTML;
		})
		catalogPriceDisplays.item(i).innerHTML = "$" + (currWood.price * selectedQuantity.multiplier).toFixed(2);
	}
	//For modal
	let firewoodPriceDisplays = document.getElementsByClassName("firewoodPriceDisplay");
	for(i=0; i<firewoodPriceDisplays.length; i++) {
		firewoodPriceDisplays.item(i).innerHTML = "$" + (selectedSpecies.price * selectedQuantity.multiplier).toFixed(2);
	}


	//Calculates and sets delivery charge
	let deliveryChargeDisplays = document.getElementsByClassName("deliveryChargeDisplay");
	for(i=0; i<deliveryChargeDisplays.length; i++) {
		deliveryChargeDisplays.item(i).innerHTML = "$" + (selectedCity.distance * pricePerMile).toFixed(2);
	}
	
	//Calculates and sets total tax
	let taxTotalDisplays = document.getElementsByClassName("taxTotalDisplay");
	for(i=0; i<taxTotalDisplays.length; i++) {
		taxTotalDisplays.item(i).innerHTML = "$" + (selectedCity.taxRate * selectedSpecies.price * selectedQuantity.multiplier).toFixed(2);
	}
	//Sets tax rate display
	document.getElementById("taxRateDisplay").innerHTML = (selectedCity.taxRate*100).toFixed(2);

	//Calculates and sets final price
	let finalPriceDisplays = document.getElementsByClassName("finalPriceDisplay");
	for(i=0; i<finalPriceDisplays.length; i++) {
		finalPriceDisplays.item(i).innerHTML = "$" + ((selectedSpecies.price * selectedQuantity.multiplier) + (selectedCity.distance * pricePerMile) +  (selectedCity.distance * pricePerMile)).toFixed(2);
	}
}

function nextPage() {
	switch(selectedPageIndex) {
		case 0:
			//TODO: UPDATE HEADER
			document.getElementById("orderPage").style.display = "none";
			document.getElementById("shippingPage").style.display = "block";
			document.getElementById("previousPageButton").style.display = "block";
			selectedPageIndex++;
			break;
		case 1:
			//TODO: UPDATE HEADER
			document.getElementById("shippingPage").style.display = "none";
			document.getElementById("paymentPage").style.display = "block";			
			document.getElementById("nextPageButton").style.display = "none";
			document.getElementById("submitButton").style.display = "block";
			selectedPageIndex++;
			break;
	}
}

function previousPage() {
	switch(selectedPageIndex) {
		case 1:
			//TODO: UPDATE HEADER
			document.getElementById("shippingPage").style.display = "none";			
			document.getElementById("orderPage").style.display = "block";
			document.getElementById("previousPageButton").style.display = "none";
			selectedPageIndex--;
			break;
		case 2:
			document.getElementById("paymentPage").style.display = "none";
			document.getElementById("shippingPage").style.display = "block";
			document.getElementById("submitButton").style.display = "none";
			document.getElementById("nextPageButton").style.display = "block";
			selectedPageIndex--;
			break;
	}
}

function submitOrder() {
	//TODO: PHP code

	$("#orderWindow").toggle();
	$('body').removeClass('modal-open');
	$('.modal-backdrop').remove();
}

//TODO: Hover Effect
/* 
 function constructDescriptionOverlay() {
     $(".invImg").mouseover(function() {
            $(this).next().fadeIn(500);
        });  

     $(".descriptionOverlay").mouseout(function() {
        $(this).fadeOut(500);
    });  

    var newHeight = ($(".descriptionOverlay").height()) - 150;
    $(".descriptionOverlay").css("height", newHeight);

} */