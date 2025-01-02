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

class Product {
	constructor({ id, category, subcategory, name, description, price, image, adults_only }) {
		this.id = id;
		this.category = category;
		this.subcategory = subcategory;
		this.name = name;
		this.description = description;
		this.price = price;
		this.image = image;
		this.adults_only = adults_only == 1 ? true : false;
	}

	createRowOfData(categories, subcategories) {
		const productRow = document.createElement('tr');
		productRow.className = 'data-row';
		const desiredCells = {
			id: this.id,
			name: this.name,
			category: this.category,
			subcategory: this.subcategory
		};

		Object.entries(desiredCells).forEach(([key, value]) => {
			const productCell = document.createElement('td');
			if (key == 'category') {
				productCell.innerHTML = categories[value];
			} else if (key == 'subcategory') {
				productCell.innerHTML = value != null ? subcategories[value] : '-';
			} else {
				productCell.innerHTML = value;
			}
			productRow.appendChild(productCell);
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
		productRow.appendChild(actionsCell);

		return productRow;
	}

}

class Order {
	constructor({ id, user_id, address_id, date, status, order_lines }) {
		this.id = id;
		this.user_id = user_id;
		this.address_id = address_id;
		this.date = date;
		this.status = status;
		this.order_lines = order_lines;
	}

	createRowOfData(users) {
		const orderRow = document.createElement('tr');
		orderRow.className = 'data-row';
		const desiredCells = {
			id: this.id,
			user: this.user_id,
			date: this.formatDate(this.date),
			status: this.status,
			total_price: this.getTotalPrice()
		};

		Object.entries(desiredCells).forEach(([key, value]) => {
			const orderCell = document.createElement('td');
			if (key == 'user') {
				orderCell.innerHTML = users[value];
			} else if (key == 'total_price') {
				orderCell.innerHTML = value + '€';
				orderCell.classList.add('price-cell');
			} else {
				orderCell.innerHTML = value;
			}
			orderRow.appendChild(orderCell);
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
		orderRow.appendChild(actionsCell);

		return orderRow;
	}

	getTotalPrice() {
		let totalPrice = 0;
		this.order_lines.forEach((orderline) => {
			totalPrice += orderline['unit_price'] * orderline['quantity'];
		});
		const taxes = totalPrice * 0.1;
		return (totalPrice + taxes).toFixed(2);
	}

	formatDate(date) {
		let dateFormatted = new Date(date);
		dateFormatted = dateFormatted.toLocaleDateString('es-ES', {
			day: '2-digit',
			month: '2-digit',
			year: 'numeric',
		}).replace(/\//g, '-');
		return dateFormatted;
	}
}

class Category {
	constructor({ id, name, subcategory, parent_id }) {
		this.id = id;
		this.name = name;
		this.subcategory = subcategory == 1 ? true : false;
		this.parent_id = parent_id;
	}
}