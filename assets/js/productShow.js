const API_URL = new URL('http://www.tieflingstavern.com/api/');
const CURRENCY_API_URL = new URL('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_mkNxscddgzGXvN8olFxoM3jPMgTIHXLWk0EfPwHF&currencies=EUR%2CUSD%2CCAD%2CAUD&base_currency=EUR');
const urlParams = document.location.pathname.split('/');
const searchParam = new URLSearchParams({
	id: urlParams[urlParams.length - 1]
});

let priceInEuro = 0;

const imageElement = document.getElementById('image');
const productIdElement = document.getElementById('productId');
const nameElement = document.getElementById('productName');
const categoryElement = document.getElementById('category');
const subcategoryElement = document.getElementById('subcategory');
const onlyAdultsElement = document.getElementById('onlyAdults');
const unitPriceElement = document.getElementById('unitPrice');
const descriptionElement = document.getElementById('description');

document.getElementById('changeCurrency').addEventListener('change', async function (e) {
	const response = await fetch(CURRENCY_API_URL)
		.then(response => response.json())
		.then(responseJson => {
			const data = responseJson.data;
			const currencySymbol = { 'EUR': '€', 'USD': '$', 'CAD': 'C$', 'AUD': 'A$' };
			unitPriceElement.innerHTML = '<b>Price:</b> ' + (priceInEuro * data[document.getElementById('changeCurrency').value]).toFixed(2) + currencySymbol[document.getElementById('changeCurrency').value];
		});
});

document.addEventListener('DOMContentLoaded', async (e) => {
	if (sessionStorage.getItem('confirmationMessage')) {
		displayConfirmMessage();
	}
	await getProduct();
});

async function getProduct() {
	const url = new URL(`${API_URL}getProductById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	const category = await getCategory(data['category']);
	let subcategory = null;
	if (data['subcategory']) {
		subcategory = await getCategory(data['subcategory']);
	}
	await modifyDom(data, category, subcategory);
}

async function getCategory(categoryId) {
	const categoryParams = new URLSearchParams({
		id: categoryId
	});
	const url = new URL(`${API_URL}getCategory?${categoryParams}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	if (responseJson.status == 'error') {
		return [];
	}
	return responseJson.data;
}

async function modifyDom(jsonResponse, categoryData, subcategoryData = null) {
	const product = new Product(jsonResponse);
	const category = new Category(categoryData);
	let subcategory = null
	if (subcategoryData) {
		subcategory = new Category(subcategoryData);
	}
	const imageUrl = new URL(`http://www.tieflingstavern.com/assets/images/${product.image}.webp`);

	imageElement.src = imageUrl;
	imageElement.alt = product.name;
	productIdElement.innerHTML += product.id;
	nameElement.innerHTML += product.name;
	categoryElement.innerHTML += category.name;
	if (subcategory) {
		subcategoryElement.innerHTML += subcategory.name;
	} else {
		subcategoryElement.innerHTML += '-';
	}
	onlyAdultsElement.innerHTML += product.adults_only ? 'Yes' : 'No';
	unitPriceElement.innerHTML += product.price + '€';
	priceInEuro = product.price;
	descriptionElement.innerHTML += product.description;
}

function displayConfirmMessage() {
	const confirmationContainer = document.createElement('div');
	confirmationContainer.className = 'row success-container w-100 py-2 mb-2 d-flex justify-content-center';

	const confirmationMessage = document.createElement('p');
	confirmationMessage.className = 'm-0 w-auto text-light';
	confirmationMessage.innerHTML = sessionStorage.getItem('confirmationMessage');

	confirmationContainer.appendChild(confirmationMessage);
	document.getElementById('productData').prepend(confirmationContainer);

	sessionStorage.removeItem("confirmationMessage");
}