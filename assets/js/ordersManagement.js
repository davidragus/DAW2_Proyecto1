const API_URL = new URL('http://www.tieflingstavern.com/api/');
const CURRENCY_API_URL = new URL('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_mkNxscddgzGXvN8olFxoM3jPMgTIHXLWk0EfPwHF&currencies=EUR%2CUSD%2CCAD%2CAUD&base_currency=EUR');
const filtersForm = document.getElementById('filtersForm');
const ordersTable = document.getElementById('ordersTable');
const userSelect = document.getElementById('userFilter');
let users = [];
let priceInEuro = [];
let deleteButtons = [];

document.addEventListener('DOMContentLoaded', async (e) => {
	await getUsers();
	getOrders();
});

document.getElementById('clearFilter').addEventListener('click', function (e) {
	filtersForm.reset();
});

document.getElementById('changeCurrency').addEventListener('change', async function (e) {
	const response = await fetch(CURRENCY_API_URL)
		.then(response => response.json())
		.then(responseJson => {
			const data = responseJson.data;
			const prices = document.getElementsByClassName('price-cell');
			const currencySymbol = { 'EUR': '€', 'USD': '$', 'CAD': 'C$', 'AUD': 'A$' };
			for (let i = 0; i < priceInEuro.length; i++) {
				prices[i].innerHTML = (priceInEuro * data[document.getElementById('changeCurrency').value]).toFixed(2) + currencySymbol[document.getElementById('changeCurrency').value];
			}
		});
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
	getOrders(params);
});

async function getOrders(params = []) {
	const url = new URL(`${API_URL}getOrders`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			let data = responseJson.data;
			Object.entries(params).forEach(([key, value]) => {
				if (key == 'startDate') {
					data = data.filter((row) => new Date(row['date']) >= new Date(params['startDate']));
				} else if (key == 'endDate') {
					data = data.filter((row) => new Date(row['date']) <= new Date(params['endDate']));
				} else {
					data = data.filter((row) => row[key].toString().includes(params[key]));
				}
			});
			modifyTableDom(data);
			document.getElementById('changeCurrency').selectedIndex = 0;
		})
}

async function modifyTableDom(jsonResponse) {
	priceInEuro = [];
	const dataRows = document.querySelectorAll('.data-row').forEach(e => e.remove());
	jsonResponse.forEach((order) => {
		const currentOrder = new Order(order);
		priceInEuro.push(currentOrder.getTotalPrice());
		ordersTable.appendChild(currentOrder.createRowOfData(users));
	});
	deleteButtons = document.getElementsByClassName('delete-button');
	giveEventToButton(deleteButtons);
}

async function giveEventToButton(deleteButtons) {
	Array.from(deleteButtons).forEach((element) => {
		element.addEventListener('click', function (ev) {
			ev.preventDefault();
			if (confirm('Are you sure that you want to delete this order?')) {
				console.log(element);
				const orderId = element.getAttribute('orderid');
				console.log(orderId);
				deleteOrder(orderId);
			}
		});
	});
}

async function getUsers() {
	const url = new URL(`${API_URL}getUsers`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			responseJson.data.forEach((user) => {
				const currentUser = new User(user);
				users[currentUser.id] = currentUser.email;
			})
			modifyUsersFilter();
		});
}

function modifyUsersFilter() {
	Object.entries(users).forEach(([key, value]) => {
		const userOption = document.createElement('option');
		userOption.value = key;
		userOption.innerHTML = value;
		userSelect.append(userOption);
	});
}

async function deleteOrder(id) {
	const url = new URL(`${API_URL}deleteOrder`);
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
			getOrders();
		})
		.catch(error => alert(error));
}