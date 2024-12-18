class User {

	constructor({ id, role, email, first_name, last_name }) {
		this.id = id;
		this.role = role;
		this.email = email;
		this.first_name = first_name;
		this.last_name = last_name;
	}

	createRowOfData() {
		const userRow = document.createElement('tr');
		userRow.className = 'data-row';

		Object.values(this).forEach((value) => {
			const userCell = document.createElement('td');
			userCell.innerHTML = value;
			userRow.appendChild(userCell);
		});

		const showUserButton = document.createElement('a');
		const showUserIcon = document.createElement('i');
		showUserIcon.classList.add('show-button', 'bi', 'bi-eye-fill', 'mx-1');
		showUserButton.appendChild(showUserIcon);
		const editUserButton = document.createElement('a');
		const editUserIcon = document.createElement('i');
		editUserIcon.classList.add('edit-button', 'bi', 'bi-pencil-fill', 'mx-1');
		editUserButton.appendChild(editUserIcon);
		const deleteUserButton = document.createElement('a');
		const deleteUserIcon = document.createElement('i');
		deleteUserIcon.classList.add('delete-button', 'bi', 'bi-trash-fill', 'mx-1');
		deleteUserButton.appendChild(deleteUserIcon);

		const actionsCell = document.createElement('td');
		actionsCell.append(showUserButton, editUserButton, deleteUserButton);
		userRow.appendChild(actionsCell);

		return userRow;
	}
}