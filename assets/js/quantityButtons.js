const quantityElement = document.getElementById('counter');
const quantityInput = document.getElementById('productQuantity');
const lessButton = document.getElementById('lessButton');
const moreButton = document.getElementById('moreButton');
const oldPriceElement = document.getElementById('oldPrice');
let oldPrice = null;
if (oldPriceElement)
	oldPrice = parseFloat(oldPriceElement.innerHTML.replace('€', ''));
const priceElement = document.getElementById('price');
const price = parseFloat(priceElement.innerHTML.replace('€', ''));

lessButton.addEventListener('click', function () {
	if (quantityElement.innerHTML > 1) {
		quantityElement.innerHTML = quantityElement.innerHTML - 1;
		quantityInput.value = quantityInput.value - 1;
		priceElement.innerHTML = (price * quantityElement.innerHTML).toFixed(2) + '€';
		if (oldPriceElement)
			oldPriceElement.innerHTML = (oldPrice * quantityElement.innerHTML).toFixed(2) + '€';
	}
});

moreButton.addEventListener('click', function () {
	quantityElement.innerHTML = parseInt(quantityElement.innerHTML) + 1;
	quantityInput.value = parseInt(quantityInput.value) + 1;
	priceElement.innerHTML = (price * quantityElement.innerHTML).toFixed(2) + '€';
	if (oldPriceElement)
		oldPriceElement.innerHTML = (oldPrice * quantityElement.innerHTML).toFixed(2) + '€';
});