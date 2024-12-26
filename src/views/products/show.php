<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('products') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			products</a>
	</div>
	<div class="row pt-4">
		<img class="product-image col-5 ps-0" src="<?= images($params['product']->getImage()) ?>"
			alt="<?= $params['product']->getName() ?>">
		<div class="col container">
			<h1 class="dark"><?= $params['product']->getName() ?></h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit ante sit amet enim
				vehicula, et molestie ante semper. Praesent sagittis, lorem sit amet eleifend iaculis, neque erat
				suscipit lorem, ut sodales urna justo eget magna. Mauris non tincidunt diam. Aliquam a purus vitae risus
				tristique facilisis. Aliquam erat volutpat. Nulla at rutrum mauris, eu accumsan urna. Donec nec tortor
				sed sapien porta vehicula. </p>
		</div>
	</div>
	<div class="row pt-4 d-flex justify-content-between">
		<div class="col-4 card rounded-0 border-0 px-0 d-flex align-items-center">
			<h2 class="card-product-info w-100 text-center py-3 text-white">Product Information</h2>
			<div class="container d-flex flex-column align-items-center py-4">
				<h3 class="card-product-subtitle">Ingredients</h3>
			</div>
			<div class="container d-flex flex-column align-items-center pb-5">
				<h3 class="card-product-subtitle">Allergens</h3>
			</div>
		</div>
		<div class="w-auto">
			<div class="d-flex justify-content-end">
				<h3 class="dark"><?= $params['product']->getPrice() ?>€</h3>
			</div>
			<a class="btn btn-primary rounded-0" href="#"><i class="bi-cart-fill"></i>ADD TO CART</a>
		</div>
	</div>
</main>