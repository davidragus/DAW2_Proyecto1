const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const productsTable = document.getElementById('productsTable');
const categorySelect = document.getElementById('categoryFilter');
const subcategorySelect = document.getElementById('subcategoryFilter');
let categories = [];
let subcategories = [];
let deleteButtons = [];

document.addEventListener('DOMContentLoaded', async (e) => {
	await getCategories();
	getProducts();
});

document.getElementById('clearFilter').addEventListener('click', function (e) {
	filtersForm.reset();
});

filtersForm.addEventListener('submit', function (e) {
	e.preventDefault();
	const data = new FormData(filtersForm);
	let params = {};
	for (const [key, value] of data) {
		if (value) {
			params[key] = value;
		}
	}
	getProducts(params);
});

async function getProducts(params = []) {
	const url = new URL(`${API_URL}getProducts`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			let data = responseJson.data;
			Object.keys(params).forEach((key) => {
				data = data.filter((row) => row[key].toString().includes(params[key]));
			});
			modifyTableDom(data);
		})
}

async function getCategories() {
	const url = new URL(`${API_URL}getCategories`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			responseJson.data.forEach((category) => {
				const currentCategory = new Category(category);
				if (currentCategory.subcategory) {
					subcategories[currentCategory.id] = currentCategory.name;
				} else {
					categories[currentCategory.id] = currentCategory.name;
				}
			})
			modifyCategoriesFilters();
		})
}

async function modifyTableDom(jsonResponse) {
	const dataRows = document.querySelectorAll('.data-row').forEach(e => e.remove());
	jsonResponse.forEach((product) => {
		const currentProduct = new Product(product);
		productsTable.appendChild(currentProduct.createRowOfData(categories, subcategories));
	});
	deleteButtons = document.getElementsByClassName('delete-button');
	giveEventToButton(deleteButtons);
}

async function giveEventToButton(deleteButtons) {
	Array.from(deleteButtons).forEach((element) => {
		element.addEventListener('click', function (ev) {
			ev.preventDefault();
			if (confirm('Are you sure that you want to delete this product?')) {
				const productId = element.getAttribute('productid');
				deleteProduct(productId);
			}
		});
	});
}

function modifyCategoriesFilters() {
	Object.entries(categories).forEach(([key, value]) => {
		const categoryOption = document.createElement('option');
		categoryOption.value = key;
		categoryOption.innerHTML = value;
		categorySelect.append(categoryOption);
	});

	Object.entries(subcategories).forEach(([key, value]) => {
		const subcategoryOption = document.createElement('option');
		subcategoryOption.value = key;
		subcategoryOption.innerHTML = value;
		subcategorySelect.append(subcategoryOption);
	});
}

async function deleteProduct(id) {
	const url = new URL(`${API_URL}deleteProduct`);
	const response = await fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(id)
	})
		.then(response => response.json())
		.then(responseJson => {
			if (responseJson.status == 'error') {
				throw new Error(responseJson.data);
			}
			alert(responseJson.data);
			getProducts();
		})
		.catch(error => alert(error));
}