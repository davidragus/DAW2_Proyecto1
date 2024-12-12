const items = document.querySelectorAll('.carousel .carousel-item');
items.forEach((e) => {
	const slide = 4;
	let next = e.nextElementSibling;
	for (let i = 0; i < slide; i++) {
		if (!next) {
			next = items[0];
		}
		let cloneChild = next.cloneNode(true);
		e.appendChild(cloneChild.children[0]);
		next = next.nextElementSibling;
	}
})