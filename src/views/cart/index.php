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
								<?php if (isset($data['offerPrice'])): ?>
									<span class="ms-5 m-0 text-decoration-line-through"><?= $data['price'] ?>€</span>
									<span
										class="offer-value d-flex align-items-center px-2 mx-2"><?= $data['isPercentage'] ? intval($data['offerValue']) . '%' : $data['offerValue'] . '€' ?></span>
								<?php endif; ?>
								<span
									class="m-0"><?= isset($data['offerPrice']) ? number_format(round($data['offerPrice'], 2, PHP_ROUND_HALF_DOWN), 2) : $data['price'] ?>€</span>
							</div>
						</div>
					</div>
				</div>
				<?php
				if (isset($data['offerPrice'])) {
					$productsPrice += $data['offerPrice'];
				} else {
					$productsPrice += $data['price'];
				}
				?>
			<?php endforeach; ?>
		</div>
		<?php $taxPrice = $productsPrice * .1; ?>
		<div class="container mt-5">
			<div class="row justify-content-between">
				<div class="container addresses-container w-auto d-flex flex-column pb-4 mx-0">
					<h2 class="dark">Addresses</h2>
					<?php if (isset($params['addresses'])): ?>
						<form method="post" action="<?= url('orders/store') ?>" id="orderForm">
							<?php foreach ($params['addresses'] as $address): ?>
								<div class="row address-row align-items-center py-2">
									<div class="form-check w-auto">
										<input class="form-check-input" type="radio" name="addressId" id="addressId"
											value="<?= $address->getAddressId() ?>" required>
									</div>
									<div class="w-auto d-flex flex-column">
										<h3 class="dark m-0"><?= $address->getAlias() ?></h3>
										<span><?= $address->getAddress() ?></span>
										<span><?= $address->getCity() ?> 			<?= $address->getCP() ?></span>
									</div>
								</div>
							<?php endforeach; ?>
						</form>
					<?php else: ?>
						<p>You need to <a href="<?= url('users') ?>">create an address</a> before placing an order.</p>
					<?php endif; ?>
				</div>
				<div class="container amount-container w-auto d-flex flex-column align-items-end pb-4 mx-0">
					<h2 class="dark">Total amount</h2>
					<span>Products price: <?= number_format($productsPrice, 2) ?>€</span>
					<span>Taxes (10%): <?= number_format($taxPrice, 2) ?>€</span>
					<span class="total-price pt-2">Total price: <?= number_format($productsPrice + $taxPrice, 2) ?>€</span>
					<button class="btn btn-primary rounded-0 mt-4" type="submit" form="orderForm"
						<?= !isset($params['addresses']) ? 'disabled' : '' ?>>PLACE ORDER</button>
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