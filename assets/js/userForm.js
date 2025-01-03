const API_URL = new URL('http://www.tieflingstavern.com/api/');
const userForm = document.getElementById('userForm');
const urlParams = document.location.pathname.split('/');
const searchParams = new URLSearchParams({
	action: urlParams[2],
	id: urlParams.length > 3 ? urlParams[3] : null
});

document.getElementById('resetPassword').addEventListener('click', async function (e) {
	e.preventDefault();
	if (confirm('Are you sure that you want to reset the password of this user?')) {
		await resetPassword(searchParams.get('id'));
	}
});

document.addEventListener('DOMContentLoaded', async (e) => {
	if (searchParams.get('action') == 'editUser' && searchParams.get('id') != 'null') {
		await getUser(searchParams.get('id'));
	}
});

// TODO: Cambiar toda la pagina si el usuario no existe
async function getUser($id) {
	const idParam = new URLSearchParams({
		id: $id
	});
	const url = new URL(`${API_URL}getUserById?${idParam}`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			let data = responseJson.data;
			modifyDom(data);
		})
}

async function modifyDom(jsonResponse) {
	const formData = new FormData(userForm);
	formData.delete('password');
	for (const key of formData.keys()) {
		formData.set(key, jsonResponse[key])
	}
	for (const [key, value] of formData.entries()) {
		document.getElementById(key).value = value;
	}
}

async function resetPassword(data) {
	const url = new URL(`${API_URL}resetUserPassword`);
	const response = await fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data)
	})
		.then(response => response.json())
		.then(responseJson => {
			alert(responseJson.data);
		})
		.catch(error => alert(error));
}