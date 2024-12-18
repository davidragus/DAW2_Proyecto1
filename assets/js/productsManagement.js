const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const productsTable = document.getElementById('productsTable');
const categorySelect = document.getElementById('categoryFilter');
const subcategorySelect = document.getElementById('subcategoryFilter');
let categories = [];
let subcategories = [];

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
	const urlSearch = new URLSearchParams(params);
	const url = new URL(`${API_URL}getProducts?${urlSearch}`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			modifyTableDom(responseJson)
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
	jsonResponse.data.forEach((product) => {
		const currentProduct = new Product(product);
		console.log(currentProduct);
		productsTable.appendChild(currentProduct.createRowOfData(categories, subcategories));
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