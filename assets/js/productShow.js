const API_URL = new URL('http://www.tieflingstavern.com/api/');
const urlParams = document.location.pathname.split('/');
const searchParam = new URLSearchParams({
	id: urlParams[urlParams.length - 1]
});

document.addEventListener('DOMContentLoaded', async (e) => {
	await getProduct();
});

async function getProduct() {
	const url = new URL(`${API_URL}getProductById?${searchParam}`);
	const response = await fetch(url)
		.then(response => response.json())
		.then(responseJson => {
			const data = responseJson.data;
			modifyDom(data);
		});
}

async function modifyDom(jsonResponse) {

}