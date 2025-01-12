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

		const baseUrl = window.location.origin;

		const showUserButton = document.createElement('a');
		showUserButton.href = `${baseUrl}/admin/showUser/${this.id}`;
		const showUserIcon = document.createElement('i');
		showUserIcon.classList.add('show-button', 'bi', 'bi-eye-fill', 'mx-1');
		showUserButton.appendChild(showUserIcon);

		const editUserButton = document.createElement('a');
		editUserButton.href = `${baseUrl}/admin/editUser/${this.id}`;
		const editUserIcon = document.createElement('i');
		editUserIcon.classList.add('edit-button', 'bi', 'bi-pencil-fill', 'mx-1');
		editUserButton.appendChild(editUserIcon);

		const deleteUserButton = document.createElement('a');
		deleteUserButton.href = '';
		deleteUserButton.setAttribute('userId', this.id);
		deleteUserButton.classList.add('delete-button');
		const deleteUserIcon = document.createElement('i');
		deleteUserIcon.classList.add('bi', 'bi-trash-fill', 'mx-1');
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

		const baseUrl = window.location.origin;

		const showProductButton = document.createElement('a');
		showProductButton.href = `${baseUrl}/admin/showProduct/${this.id}`;
		const showProductIcon = document.createElement('i');
		showProductIcon.classList.add('show-button', 'bi', 'bi-eye-fill', 'mx-1');
		showProductButton.appendChild(showProductIcon);

		const editProductButton = document.createElement('a');
		editProductButton.href = `${baseUrl}/admin/editProduct/${this.id}`;
		const editProductIcon = document.createElement('i');
		editProductIcon.classList.add('edit-button', 'bi', 'bi-pencil-fill', 'mx-1');
		editProductButton.appendChild(editProductIcon);

		const deleteProductButton = document.createElement('a');
		deleteProductButton.href = '';
		deleteProductButton.setAttribute('productId', this.id);
		deleteProductButton.classList.add('delete-button');
		const deleteProductIcon = document.createElement('i');
		deleteProductIcon.classList.add('bi', 'bi-trash-fill', 'mx-1');
		deleteProductButton.appendChild(deleteProductIcon);

		const actionsCell = document.createElement('td');
		actionsCell.append(showProductButton, editProductButton, deleteProductButton);
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

		const baseUrl = window.location.origin;

		const showOrderButton = document.createElement('a');
		showOrderButton.href = `${baseUrl}/admin/showOrder/${this.id}`;
		const showOrderIcon = document.createElement('i');
		showOrderIcon.classList.add('show-button', 'bi', 'bi-eye-fill', 'mx-1');
		showOrderButton.appendChild(showOrderIcon);

		const editOrderButton = document.createElement('a');
		editOrderButton.href = `${baseUrl}/admin/editOrderStatus/${this.id}`;
		const editOrderIcon = document.createElement('i');
		editOrderIcon.classList.add('edit-button', 'bi', 'bi-pencil-fill', 'mx-1');
		editOrderButton.appendChild(editOrderIcon);

		const deleteOrderButton = document.createElement('a');
		deleteOrderButton.href = '';
		deleteOrderButton.setAttribute('orderId', this.id);
		deleteOrderButton.classList.add('delete-button');
		const deleteOrderIcon = document.createElement('i');
		deleteOrderIcon.classList.add('bi', 'bi-trash-fill', 'mx-1');
		deleteOrderButton.appendChild(deleteOrderIcon);

		const actionsCell = document.createElement('td');
		actionsCell.append(showOrderButton, editOrderButton, deleteOrderButton);
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
		let dateFormatted = new Date(date).toLocaleDateString('es-ES', {
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

class Address {
	constructor({ id, user_id, alias, city, cp, address }) {
		this.id = id;
		this.user_id = user_id;
		this.alias = alias;
		this.city = city;
		this.cp = cp;
		this.address = address;
	}
}

class Log {
	constructor({ log_id, user_id, action, type, id, timestamp }) {
		this.log_id = log_id;
		this.user_id = user_id;
		this.action = action;
		this.type = type;
		this.id = id;
		this.timestamp = timestamp;
	}

	createRowOfData(users) {
		const logRow = document.createElement('tr');
		logRow.className = 'data-row';
		const desiredCells = {
			date: this.formatDate(this.timestamp),
			user: this.user_id,
			action: this.action,
			type: this.type,
			id: this.id
		};

		Object.entries(desiredCells).forEach(([key, value]) => {
			const logCell = document.createElement('td');
			if (key == 'user') {
				logCell.innerHTML = users[value];
			} else if (key == 'total_price') {
				logCell.innerHTML = value + '€';
				logCell.classList.add('price-cell');
			} else {
				logCell.innerHTML = value;
			}
			logRow.appendChild(logCell);
		});

		return logRow;
	}

	formatDate(date) {
		let dateFormatted = new Date(date).toLocaleString('es-ES', {
			day: '2-digit',
			month: '2-digit',
			year: 'numeric',
			hour: '2-digit',
			minute: '2-digit',
			second: '2-digit',
			hour12: false
		}).replace(/\//g, '-');
		return dateFormatted;
	}
}