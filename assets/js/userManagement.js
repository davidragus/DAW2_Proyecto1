const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const usersTable = document.getElementById('usersTable');

document.addEventListener('DOMContentLoaded', (e) => getUsers());

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
	getUsers(params);
});

async function getUsers(params = []) {
	const url = new URL(`${API_URL}getUsers`);
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

function modifyTableDom(jsonResponse) {
	const dataRows = document.querySelectorAll('.data-row').forEach(e => e.remove());
	jsonResponse.forEach((user) => {
		const currentUser = new User(user);
		usersTable.appendChild(currentUser.createRowOfData());
	});
}