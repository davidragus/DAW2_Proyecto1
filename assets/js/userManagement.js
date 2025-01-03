const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const usersTable = document.getElementById('usersTable');
let deleteButtons = [];

document.addEventListener('DOMContentLoaded', (e) => getUsers());

document.getElementById('clearFilter').addEventListener('click', function (e) {
	filtersForm.reset();
});

document.getElementById('clearFilter').addEventListener('click', async function (e) {

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
	deleteButtons = document.getElementsByClassName('delete-button');
	giveEventToButton(deleteButtons);
}

async function giveEventToButton(deleteButtons) {
	Array.from(deleteButtons).forEach((element) => {
		element.addEventListener('click', function (ev) {
			ev.preventDefault();
			if (confirm('Are you sure that you want to delete this user?')) {
				const userId = element.getAttribute('userid');
				deleteUser(userId);
			}
		});
	});
}

async function deleteUser(id) {
	const url = new URL(`${API_URL}deleteUser`);
	const response = await fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(id)
	})
		.then(response => response.json())
		.then(responseJson => {
			alert(responseJson.data);
			getUsers();
		})
		.catch(error => alert(error));
}