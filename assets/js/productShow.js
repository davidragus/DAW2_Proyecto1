const API_URL = new URL('http://www.tieflingstavern.com/api/');
const urlParams = document.location.pathname.split('/');
const searchParam = new URLSearchParams({
	id: urlParams[urlParams.length - 1]
});

const imageElement = document.getElementById('image');
const productIdElement = document.getElementById('productId');
const nameElement = document.getElementById('productName');
const categoryElement = document.getElementById('category');
const subcategoryElement = document.getElementById('subcategory');
const onlyAdultsElement = document.getElementById('onlyAdults');
const unitPriceElement = document.getElementById('unitPrice');
const descriptionElement = document.getElementById('description');

document.addEventListener('DOMContentLoaded', async (e) => {
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
	descriptionElement.innerHTML += product.description;
}