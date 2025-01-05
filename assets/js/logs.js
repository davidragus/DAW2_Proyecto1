const API_URL = new URL('http://www.tieflingstavern.com/api/');
const filtersForm = document.getElementById('filtersForm');
const logsTable = document.getElementById('logsTable');
const userSelect = document.getElementById('userFilter');
let users = [];

document.addEventListener('DOMContentLoaded', async (e) => {
	await getUsers();
	getLogs();
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
	getLogs(params);
});

async function getLogs(params = []) {
	const url = new URL(`${API_URL}getLogs`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			let data = responseJson.data;
			Object.keys(params).forEach((key) => {
				if (key == 'startDate') {
					data = data.filter((row) => new Date(row['date']) >= new Date(params['startDate']));
				} else if (key == 'endDate') {
					data = data.filter((row) => new Date(row['date']) <= new Date(params['endDate']));
				} else {
					data = data.filter((row) => row[key].toString().includes(params[key]));
				}
			});
			modifyTableDom(data);
		})
}

function modifyTableDom(jsonResponse) {
	const dataRows = document.querySelectorAll('.data-row').forEach(e => e.remove());
	jsonResponse.forEach((log) => {
		const currentLog = new Log(log);
		logsTable.appendChild(currentLog.createRowOfData(users));
	});
}

async function getUsers() {
	const url = new URL(`${API_URL}getAdmins`);
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