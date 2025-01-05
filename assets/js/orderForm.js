const API_URL = new URL('http://www.tieflingstavern.com/api/');
const orderForm = document.getElementById('orderForm');
const urlParams = document.location.pathname.split('/');
const searchParam = new URLSearchParams({
	id: urlParams[urlParams.length - 1]
});

let productsPrice = 0;

const orderIdElement = document.getElementById('orderId');
const userElement = document.getElementById('user');
const dateElement = document.getElementById('date');
const addressElement = document.getElementById('address');
const statusInputElement = document.getElementById('status');
const orderLinesContainerElement = document.getElementById('orderLinesContainer');
const productsPriceElement = document.getElementById('productsPrice');
const taxesPriceElement = document.getElementById('taxesPrice');
const totalPriceElement = document.getElementById('totalPrice');

document.addEventListener('DOMContentLoaded', async (e) => {
	await getOrder();
});

orderForm.addEventListener('submit', async (ev) => {
	ev.preventDefault();
	await updateStatus();
});

async function getOrder() {
	const url = new URL(`${API_URL}getOrderById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	await modifyDom(data);
}

async function getUser(id) {
	const searchParam = new URLSearchParams({
		id: id
	});
	const url = new URL(`${API_URL}getUserById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	return data;
}

async function getProduct(id) {
	const searchParam = new URLSearchParams({
		id: id
	});
	const url = new URL(`${API_URL}getProductById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	return data;
}

async function getAddress(id) {
	const searchParam = new URLSearchParams({
		id: id
	});
	const url = new URL(`${API_URL}getAddressById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	return data;
}

async function modifyDom(jsonResponse) {
	const order = new Order(jsonResponse);
	const user = new User(await getUser(order.user_id));
	const address = order.address_id ? new Address(await getAddress(order.address_id)) : null;

	orderIdElement.innerHTML += order.id;
	userElement.innerHTML += user.email;
	dateElement.innerHTML += order.formatDate(order.date);
	addressElement.innerHTML += address ? `${address.address}, ${address.city} ${address.cp}` : '-';
	statusInputElement.value = order.status;

	for (const orderline of order.order_lines) {
		const product = new Product(await getProduct(orderline.product_id));

		const orderLineRow = document.createElement('div');
		orderLineRow.classList = 'row cart-row';

		productImage = document.createElement('img');
		productImage.classList = 'p-0';
		const imageUrl = new URL(`http://www.tieflingstavern.com/assets/images/${product.image}.webp`);
		productImage.src = imageUrl;
		productImage.alt = product.name;

		const productInfoContainer = document.createElement('div');
		productInfoContainer.classList = 'col d-flex flex-column justify-content-between';

		const productNameContainer = document.createElement('div');
		productNameContainer.classList = 'row d-flex align-items-center justify-content-between m-0';
		const productName = document.createElement('a');
		productName.innerHTML = product.name;
		productName.classList = 'cart-product-name w-auto';
		const showProductAdminUrl = new URL(`http://www.tieflingstavern.com/admin/showProduct/${product.id}`);
		productName.href = showProductAdminUrl;
		productNameContainer.appendChild(productName);
		productInfoContainer.appendChild(productNameContainer);

		const productQuantityRow = document.createElement('div');
		productQuantityRow.classList = 'row justify-content-end m-0';
		const productQuantityContainer = document.createElement('div');
		productQuantityContainer.classList = 'quantity-container d-flex w-auto';
		const amountElement = document.createElement('span');
		amountElement.classList = 'm-0 mx-3';
		amountElement.innerHTML = `Amount: ${orderline.quantity}`;
		const priceElement = document.createElement('span');
		priceElement.classList = 'ms-5 m-0';
		priceElement.innerHTML = `Price: ${(orderline.unit_price * orderline.quantity).toFixed(2)}€`;
		productQuantityContainer.appendChild(amountElement);
		productQuantityContainer.appendChild(priceElement);
		productQuantityRow.appendChild(productQuantityContainer);
		productInfoContainer.appendChild(productQuantityRow);

		orderLineRow.appendChild(productImage);
		orderLineRow.appendChild(productInfoContainer);
		orderLinesContainerElement.appendChild(orderLineRow);

		productsPrice += orderline.unit_price * orderline.quantity;
	}

	productsPriceElement.innerHTML += `${productsPrice.toFixed(2)}€`;
	taxesPriceElement.innerHTML += `${(productsPrice * 0.1).toFixed(2)}€`;
	totalPriceElement.innerHTML += `${(productsPrice + (productsPrice * 0.1)).toFixed(2)}€`;
}

async function updateStatus() {
	const formData = new FormData(orderForm);
	let data = {
		status: formData.get('status'),
		order_id: searchParam.get('id')
	};

	const url = new URL(`${API_URL}updateStatus`);
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
			const message = 'Status updated successfully.';
			sessionStorage.setItem("confirmationMessage", message);
			const redirectUrl = new URL(`http://www.tieflingstavern.com/admin/showOrder/${responseJson.data}`);
			window.location.replace(redirectUrl);
		})
		.catch(error => alert(error));
}