const API_URL = new URL('http://www.tieflingstavern.com/api/');
const urlParams = document.location.pathname.split('/');
const searchParam = new URLSearchParams({
	id: urlParams[urlParams.length - 1]
});

const userIdElement = document.getElementById('userId');
const firstNameElement = document.getElementById('firstName');
const lastNameElement = document.getElementById('lastName');
const emailElement = document.getElementById('email');
const roleElement = document.getElementById('role');
const addressesContainer = document.getElementById('addressesContainer');

document.addEventListener('DOMContentLoaded', async (e) => {
	if (sessionStorage.getItem('confirmationMessage')) {
		displayConfirmMessage();
	}
	await getUser();
});

async function getUser() {
	const url = new URL(`${API_URL}getUserById?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	const data = responseJson.data;
	const addresses = await getAddresses();
	await modifyDom(data, addresses);
}

async function getAddresses() {
	const url = new URL(`${API_URL}getAddressesByUserId?${searchParam}`);
	const response = await fetch(url)
	const responseJson = await response.json();
	if (responseJson.status == 'error') {
		return [];
	}
	return responseJson.data;
}

async function modifyDom(jsonResponse, addresses) {
	const user = new User(jsonResponse);
	userIdElement.innerHTML += user.id;
	firstNameElement.innerHTML += user.first_name;
	lastNameElement.innerHTML += user.last_name;
	emailElement.innerHTML += user.email;
	roleElement.innerHTML += user.role;

	if (addresses) {
		Object.values(addresses).forEach((address) => {
			const addressRow = document.createElement('div');
			addressRow.classList.add('row', 'address-row', 'd-flex', 'justify-content-between', 'py-2');
			const addressElement = document.createElement('div');
			addressElement.classList.add('w-auto', 'd-flex', 'flex-column');
			const alias = document.createElement('h3');
			alias.classList.add('dark', 'm-0');
			const addressName = document.createElement('span');
			const cityAndCp = document.createElement('span');
			alias.innerHTML = address.alias;
			addressName.innerHTML = address.address;
			cityAndCp.innerHTML = address.city + ", " + address.cp;
			addressElement.appendChild(alias);
			addressElement.appendChild(addressName);
			addressElement.appendChild(cityAndCp);
			addressRow.appendChild(addressElement);
			addressesContainer.appendChild(addressRow);
		});
	}

	document.getElementById('addressTitle').innerHTML += ` (${addresses ? addresses.length : 0})`;
}

function displayConfirmMessage() {
	const confirmationContainer = document.createElement('div');
	confirmationContainer.className = 'row success-container w-100 py-2 mb-2 d-flex justify-content-center';

	const confirmationMessage = document.createElement('p');
	confirmationMessage.className = 'm-0 w-auto text-light';
	confirmationMessage.innerHTML = sessionStorage.getItem('confirmationMessage');

	confirmationContainer.appendChild(confirmationMessage);
	document.getElementById('userData').prepend(confirmationContainer);

	sessionStorage.removeItem("confirmationMessage");
}