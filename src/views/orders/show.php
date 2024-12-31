<?php $productsPrice = 0; ?>
<main class="container mb-5">
	<div class="row pt-4">
		<a href="<?= url('orders') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			orders</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Order Details</h1>
	</div>
	<div class="container">
		<fieldset class="d-flex flex-column px-4 pb-4 mb-5 w-100">
			<legend class="float-none w-auto">
				<h2 class="dark px-2">Order Information</h2>
			</legend>
			<div class="row w-100 justify-content-between">
				<span class="information-text w-auto"><b>Order ID:</b> <?= $params['order']->getOrderId() ?></span>
				<span class="information-text w-auto"><b>Date:</b>
					<?= date('d-m-Y', strtotime($params['order']->getDate())) ?></span>
				<span class="information-text w-auto"><b>Order status:</b> <?= $params['order']->getStatus() ?></span>
			</div>
			<div class="row w-100 mt-3	">
				<span class="information-text w-auto"><b>Delivery Address:</b>
					<?= $params['address']->getAddress() ?>, <?= $params['address']->getCity() ?>
					<?= $params['address']->getCP() ?></span>
			</div>
		</fieldset>
	</div>
	<div class="container">
		<h2 class="dark d-flex justify-content-center">Order Lines</h2>
		<div class="container py-2">
			<?php foreach ($params['order']->getOrderLines() as $orderLine): ?>
				<div class="row cart-row">
					<img class="p-0" src="<?= images($params['products'][$orderLine->getProductId()]->getImage()) ?>"
						alt="<?= $params['products'][$orderLine->getProductId()]->getName() ?>">
					<div class="col d-flex flex-column justify-content-between">
						<div class="row d-flex align-items-center justify-content-between m-0">
							<a class="cart-product-name w-auto"
								href="<?= url('products/show/' . $orderLine->getProductId()) ?>"><?= $params['products'][$orderLine->getProductId()]->getName() ?></a>
						</div>
						<div class="row justify-content-end m-0">
							<div class="quantity-container d-flex w-auto">
								<span class="m-0 mx-3">Amount: <?= $orderLine->getAmount() ?></span>
								<span class="ms-5 m-0">Price:
									<?= number_format($orderLine->getUnitPrice() * $orderLine->getAmount(), 2) ?>€</span>
							</div>
						</div>
					</div>
				</div>
				<?php $productsPrice += number_format($orderLine->getUnitPrice() * $orderLine->getAmount(), 2); ?>
			<?php endforeach; ?>
			<?php $taxPrice = $productsPrice * 0.1; ?>
		</div>
	</div>
	<div class="container amount-container w-auto d-flex flex-column align-items-end py-4 mb-3 mx-0">
		<h2 class="dark">Total amount</h2>
		<span>Products price: <?= number_format($productsPrice, 2) ?>€</span>
		<span>Taxes (10%): <?= number_format($taxPrice, 2) ?>€</span>
		<span class="total-price pt-2">Total price: <?= number_format($productsPrice + $taxPrice, 2) ?>€</span>
	</div>
</main>