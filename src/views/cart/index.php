<main class="container mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Your Cart</h1>
	</div>
	<?php if (isset($params['userCart'])): ?>
		<div class="container py-4">
			<?php $productsPrice = 0; ?>
			<?php foreach ($params['userCart'] as $productName => $data): ?>
				<div class="row cart-row">
					<img class="p-0" src="<?= images($data['image']) ?>" alt="<?= $productName ?>">
					<div class="col d-flex flex-column justify-content-between">
						<div class="row d-flex align-items-center justify-content-between m-0">
							<a class="cart-product-name w-auto"
								href="<?= url('products/show/' . $data['id']) ?>"><?= $productName ?></a>
							<a class="w-auto" href="<?= url('cart/deleteFromCart/' . $data['id']) ?>"><i
									class="bi bi-trash-fill"></i></a>
						</div>
						<div class="row justify-content-end m-0">
							<div class="quantity-container d-flex w-auto">
								<a href="<?= url('cart/removeOneFromCart/' . $data['id']) ?>"><i class="bi bi-dash-lg"></i></a>
								<span class="m-0 mx-3"><?= $data['quantity'] ?></span>
								<a href="<?= url('cart/addOneToCart/' . $data['id']) ?>"><i class="bi bi-plus-lg"></i></a>
								<span class="ms-5 m-0"><?= $data['price'] ?>€</span>
							</div>
						</div>
					</div>
				</div>
				<?php $productsPrice += $data['price'] ?>
			<?php endforeach; ?>
		</div>
		<?php $taxPrice = $productsPrice * .1; ?>
		<div class="container mt-5">
			<div class="row justify-content-between">
				<div class="container addresses-container w-auto d-flex flex-column pb-4 mx-0">
					<h2 class="dark">Addresses</h2>
					<form action="">
						<div class="row address-row align-items-center">
							<div class="form-check w-auto">
								<input class="form-check-input" type="radio" name="addressId" id="addressId" value=""
									required>
							</div>
							<div class="w-auto d-flex flex-column">
								<h3 class="dark m-0">Test</h3>
								<span>Fortnite Burger Street 14</span>
								<span>Fortnite City 42069</span>
							</div>
						</div>
					</form>
				</div>
				<div class="container amount-container w-auto d-flex flex-column align-items-end pb-4 mx-0">
					<h2 class="dark">Total amount</h2>
					<span>Products price: <?= number_format($productsPrice, 2) ?>€</span>
					<span>Taxes (10%): <?= number_format($taxPrice, 2) ?>€</span>
					<span class="total-price pt-2">Total price: <?= number_format($productsPrice + $taxPrice, 2) ?>€</span>
					<a class="btn btn-primary rounded-0 mt-4" href="<?= url('orders/store') ?>">PLACE ORDER</a>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="container py-4 d-flex flex-column align-items-center">
			<h2 class="dark">Your cart is empty :(</h2>
			<p>Try adding some products to your cart</p>
			<a class="btn btn-primary rounded-0 mt-4" href="<?= url('products') ?>">CHECK PRODUCTS</a>
		</div>
	<?php endif; ?>
</main>