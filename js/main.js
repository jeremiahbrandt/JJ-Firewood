var selectedWood;
var selectedQuantity;
var selectedCity;

var localTax;
var stateTax;

var firewoodSelection = new Array();
var quantitySelection = new Array();
var citySelection = new Array();

function updateSelectedWood(input) {
	document.getElementById("firewoodType").value = input.displayName;
	updateOrder();
}

function updateOrder() {
	firewoodSelection.forEach(function(curr){
		if(document.getElementById("firewoodType").value == curr.displayName) {
			selectedWood = curr;
		}
	});
	document.getElementById("orderModalTitleSpecies").innerHTML = selectedWood.displayName;
	document.getElementById("firewoodType").value = selectedWood.displayName;

	quantitySelection.forEach(function(curr){
		if(document.getElementById("quantity").value == curr.displayName){
			selectedQuantity = curr;
		}
	});

	citySelection.forEach(function(curr){
		if(document.getElementById("city").value == curr.displayName) {
			selectedCity = curr;
			localTax = Math.round(selectedWood.price * selectedQuantity.multiplier * selectedCity.localTax * 100) / 100;
			document.getElementById("taxRate").value = localTax;
			var taxLength = document.getElementById("taxRate").value.length;
			switch(taxLength){
				case 2:
					document.getElementById("taxRate").value += ".00";
					break;
				case 4:
					document.getElementById("taxRate").value += "0";
					break;
			}

		}
	});
	document.getElementById("localTaxRate").innerHTML = Math.round(selectedCity.localTax * 10000)/100;
	document.getElementById("stateTaxRateDisplay").innerHTML = Math.round(missouri.stateTax * 10000)/100;
	stateTax = Math.round(selectedWood.price * selectedQuantity.multiplier * missouri.stateTax * 100)/100;
	document.getElementById("stateTaxRate").value = stateTax;


	calculatePrice();
}

function calculatePrice() {
	document.getElementById("finalPrice").value = Math.round(((selectedWood.price * selectedQuantity.multiplier) + localTax + stateTax)*100)/100;
	switch(document.getElementById("finalPrice").value.length) {
		case 4:
			document.getElementById("finalPrice").value += "00";
			break;
		case 5:
			document.getElementById("finalPrice").value += "0";
			break;
	}
}