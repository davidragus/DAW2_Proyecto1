const API_URL = 'http://www.tieflingstavern.com/api/';
const usersTable = document.getElementById('usersTable');

async function displayUsers() {
	const response = await fetch(`${API_URL}getUsers`);
	const data = await response.json();

	data.data.forEach((user) => {
		delete user.password;
		const userRow = document.createElement('tr');
		for (const key in user) {
			const userCell = document.createElement('td');
			userCell.innerHTML = user[key];
			userRow.appendChild(userCell);

		};
		usersTable.appendChild(userRow);
	})
}

document.addEventListener('DOMContentLoaded', displayUsers);