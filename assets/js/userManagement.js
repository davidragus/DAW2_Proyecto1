const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const usersTable = document.getElementById('usersTable');

document.addEventListener('DOMContentLoaded', (e) => getUsers());
filtersForm.addEventListener('submit', function (e) {
	e.preventDefault();
	const data = new FormData(filtersForm);
	let params = {};
	for (const [key, value] of data) {
		if (value) {
			params[key] = value;
		}
	}
	getUsers(params);
});

async function getUsers(params = []) {
	const urlSearch = new URLSearchParams(params);
	const url = new URL(`${API_URL}getUsers?${urlSearch}`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			modifyTableDom(responseJson)
		})
}

function modifyTableDom(jsonResponse) {
	const dataRows = document.querySelectorAll('.data-row').forEach(e => e.remove());
	jsonResponse.data.forEach((user) => {
		delete user.password;
		const userRow = document.createElement('tr');
		userRow.className = 'data-row';
		for (const key in user) {
			const userCell = document.createElement('td');
			userCell.innerHTML = user[key];
			userRow.appendChild(userCell);
		};
		usersTable.appendChild(userRow);
	});
}