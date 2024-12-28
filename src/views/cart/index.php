<main class="mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Your Cart</h1>
	</div>
	<div class="container py-4">
		<?php $productsPrice = 0; ?>
		<?php foreach ($params['userCart'] as $productName => $data): ?>
			<div class="row cart-row">
				<img class="p-0" src="<?= images($data['image']) ?>" alt="<?= $productName ?>">
				<div class="col d-flex flex-column justify-content-between">
					<div class="row d-flex align-items-center justify-content-between m-0">
						<a class="cart-product-name w-auto"
							href="<?= url('products/show/' . $data['id']) ?>"><?= $productName ?></a>
						<a class="w-auto" href=""><i class="bi bi-trash-fill"></i></a>
					</div>
					<div class="row justify-content-end m-0">
						<div class="quantity-container d-flex w-auto">
							<a href=""><i class="bi bi-plus-lg"></i></a>
							<span class="m-0 mx-3"><?= $data['quantity'] ?></span>
							<a href=""><i class="bi bi-dash-lg"></i></a>
							<span class="ms-5 m-0"><?= $data['price'] ?>€</span>
						</div>
					</div>
				</div>
			</div>
			<?php $productsPrice += $data['price'] ?>
		<?php endforeach; ?>
	</div>
	<?php $taxPrice = $productsPrice * .1; ?>
	<div class="container amount-container d-flex flex-column align-items-end pb-4">
		<h2>Total amount</h2>
		<span>Products price: <?= number_format($productsPrice, 2) ?>€</span>
		<span>Taxes (10%): <?= number_format($taxPrice, 2) ?>€</span>
		<span class="total-price pt-2">Total price: <?= number_format($productsPrice + $taxPrice, 2) ?>€</span>
		<a class="btn btn-primary rounded-0 mt-4" href="">PLACE ORDER</a>
	</div>
</main>