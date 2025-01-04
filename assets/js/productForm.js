const API_URL = new URL('http://www.tieflingstavern.com/api/');
const productForm = document.getElementById('productForm');
const urlParams = document.location.pathname.split('/');
const searchParams = new URLSearchParams({
	action: urlParams[2],
	id: urlParams.length > 3 ? urlParams[3] : null
});
const categorySelect = document.getElementById('category');
const subcategorySelect = document.getElementById('subcategory');
let categories = [];
let subcategories = [];

document.addEventListener('DOMContentLoaded', async (e) => {
	await getCategories();
	if (searchParams.get('action') == 'editProduct' && searchParams.get('id') != 'null') {
		document.getElementById('imageFile').required = false;
		await getProduct(searchParams.get('id'));
	} else {
		document.getElementById('adults_only').checked = false;
	}
});

productForm.addEventListener('submit', async (ev) => {
	ev.preventDefault();
	await insertOrUpdateProduct();
});

async function getProduct($id) {
	const idParam = new URLSearchParams({
		id: $id
	});
	const url = new URL(`${API_URL}getProductById?${idParam}`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			let data = responseJson.data;
			modifyDom(data);
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

async function modifyDom(jsonResponse) {
	const formData = new FormData(productForm);
	for (const key of formData.keys()) {
		formData.set(key, jsonResponse[key]);
	}
	for (const [key, value] of formData.entries()) {
		if (key == 'image') {
			const imageUrl = new URL(`http://www.tieflingstavern.com/assets/images/${value}.webp`);
			document.getElementById(key).src = imageUrl;
		} else if (key == 'adults_only') {
			document.getElementById(key).checked = value == 1 ? true : false;
		} else {
			document.getElementById(key).value = value;
		}
	}
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

async function insertOrUpdateProduct() {
	const imageInput = document.getElementById('imageFile');
	const image = imageInput.files[0];

	if (image) {
		const imageData = new FormData();
		imageData.append('image', image);

		const uploadImageUrl = new URL(`${API_URL}uploadImage`);
		const response = await fetch(uploadImageUrl, {
			method: 'POST',
			body: imageData
		})
			.then(response => response.json())
			.then(responseJson => {
				if (responseJson.status == 'error') {
					throw new Error(responseJson.data);
				}
			})
			.catch(error => alert(error));
	}

	const formData = new FormData(productForm);
	let data = {
		category: formData.get('category'),
		subcategory: formData.get('subcategory') ? formData.get('subcategory') : null,
		name: formData.get('name'),
		description: formData.get('description'),
		price: formData.get('price'),
		image: formData.get('image') ? formData.get('image')['name'].replace('.webp', '') : null,
		adults_only: formData.get('adults_only') ? formData.get('adults_only') : 0
	};

	const apiFunction = searchParams.get('action') == 'editProduct' ? 'updateProduct' : 'insertProduct';
	if (apiFunction == 'updateProduct') {
		data = {
			...data,
			product_id: parseInt(searchParams.get('id'))
		};
		if (!data['image']) {
			delete (data['image']);
		}
	}

	const url = new URL(`${API_URL}${apiFunction}`);
	const response = await fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data)
	})
		.then(response => response.json())
		.then(responseJson => {
			if (responseJson.status == 'error') {
				throw new Error(responseJson.data);
			}
			const message = apiFunction == 'updateProducts' ? 'Product updated successfully' : 'Product created successfully.';
			sessionStorage.setItem("confirmationMessage", message);
			const redirectUrl = new URL(`http://www.tieflingstavern.com/admin/showProduct/${responseJson.data}`);
			window.location.replace(redirectUrl);
		})
		.catch(error => alert(error));
}