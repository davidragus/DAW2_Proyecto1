<main class="mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Your Orders</h1>
	</div>
	<?php if (isset($params['orders'])): ?>
		<div class="container last-order-container d-flex flex-column align-items-center py-4">
			<h2 class="dark">Your Last Order</h2>
			<div class="row">
				<span class="w-auto">Test</span>
				<span class="w-auto">Test</span>
				<span class="w-auto">Test</span>
				<span class="w-auto">Test</span>
			</div>
			<div class="container my-2">
				<?php $counter = 0; ?>
				<?php foreach ($params['lastOrderLines'] as $orderLine): ?>
					<?php if ($counter >= 3): ?>
						<?php break; ?>
					<?php endif; ?>
					<div class="row cart-row">
						<img class="p-0" src="<?= images($params['products'][$orderLine->getProductId()]->getImage()) ?>"
							alt="<?= $params['products'][$orderLine->getProductId()]->getName() ?>">
						<div class="col d-flex flex-column justify-content-between">
							<div class="row d-flex align-items-center justify-content-between m-0">
								<a class="cart-product-name w-auto"
									href=""><?= $params['products'][$orderLine->getProductId()]->getName() ?></a>
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
					<?php $counter++; ?>
				<?php endforeach; ?>
			</div>
			<div class="row w-100 py-2">
				<span class="more-products"> <?php if (count($params['lastOrderLines']) > 3): ?>...and
						<?= count($params['lastOrderLines']) - 3 ?> more
						products.<?php endif; ?> <a
						href="<?= url('orders/show/' . $params['orders'][0]->getOrderId()) ?>">Check more details</a>
				</span>
			</div>
			<div class="row">
				<a class="btn btn-primary rounded-0" href=""><i class="bi-cart-fill"></i>REPEAT ORDER</a>
			</div>
		</div>
		<div class="container d-flex flex-column align-items-center py-4">
			<h2 class="dark">Order History</h2>
			<table class="container my-2">
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Amount of products</th>
					<th>Total price</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				<?php foreach ($params['orders'] as $order): ?>
					<?php
					$totalPrice = 0;
					$totalAmount = 0;
					foreach ($order->getOrderLines() as $orderLine) {
						$totalPrice += number_format($orderLine->getUnitPrice() * $orderLine->getAmount(), 2);
						$totalAmount += $orderLine->getAmount();
					}
					?>
					<tr>
						<td><?= $order->getOrderId() ?></td>
						<td><?= date('d-m-Y', strtotime($order->getDate())) ?></td>
						<td><?= $totalAmount ?> products</td>
						<td><?= number_format($totalPrice + $totalPrice * 0.1, 2) ?>€</td>
						<td><?= $order->getStatus() ?></td>
						<td><a href="<?= url('orders/show/' . $order->getOrderId()) ?>"><i class="bi bi-eye-fill"></i></a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	<?php else: ?>
		<div class="container py-4 d-flex flex-column align-items-center">
			<h2 class="dark">There isn't any order made by you :(</h2>
			<p>First, order some products and then come back</p>
			<a class="btn btn-primary rounded-0 mt-4" href="<?= url('products') ?>">CHECK PRODUCTS</a>
		</div>
	<?php endif; ?>
</main>