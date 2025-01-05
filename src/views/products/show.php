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
			<p><?= $params['product']->getDescription() ?></p>
		</div>
	</div>
	<div class="row pt-4 d-flex justify-content-between">
		<?php //TODO: Agregar alergenos e ingredientes ?>
		<?php if (false): ?>
			<div class="col-4 card rounded-0 border-0 px-0 d-flex align-items-center">
				<h2 class="card-product-info w-100 text-center py-3 text-white">Product Information</h2>
				<div class="container d-flex flex-column align-items-center py-4">
					<h3 class="card-product-subtitle">Ingredients</h3>
				</div>
				<div class="container d-flex flex-column align-items-center pb-5">
					<h3 class="card-product-subtitle">Allergens</h3>
				</div>
			</div>
		<?php endif; ?>
		<div class="w-auto">
			<div class="d-flex justify-content-end mb-1">
				<?php if (isset($params['productInOffer'])): ?>
					<h4 class="dark m-0 text-decoration-line-through me-2" id="oldPrice">
						<?= $params['product']->getPrice() ?>€
					</h4>
					<span
						class="offer-value d-flex align-items-center px-2"><?= $params['productInOffer']['isPercentage'] ? intval($params['productInOffer']['offerValue']) . '%' : $params['productInOffer']['offerValue'] . '€' ?></span>
				<?php endif; ?>
			</div>
			<div class="d-flex justify-content-end mb-1">
				<button class="product-quantity-buttons border-0 bg-transparent" id="lessButton"><i
						class="bi bi-dash-lg"></i></button>
				<h3 class="dark m-0 mx-3" id="counter">1</h3>
				<button class="product-quantity-buttons border-0 bg-transparent" id="moreButton"><i
						class="bi bi-plus-lg"></i></button>
				<h3 class="dark m-0 ms-5" id="price">
					<?= isset($params['productInOffer']) ? number_format(round($params['productInOffer']['productPrice'], 2, PHP_ROUND_HALF_DOWN), 2) : $params['product']->getPrice() ?>€
				</h3>
			</div>
			<form class="d-flex justify-content-end" method="post" id="addToCart"
				action="<?= url('cart/addToCart/' . $params['product']->getId()) ?>">
				<input type="hidden" name="productQuantity" id="productQuantity" value="1">
				<button type="submit" form="addToCart" class="btn btn-primary rounded-0"><i class="bi-cart-fill"></i>ADD
					TO CART</button>
			</form>
		</div>
	</div>
</main>
<script src="<?= js('quantityButtons') ?>"></script>