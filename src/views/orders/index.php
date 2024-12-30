<main class="mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Your Orders</h1>
	</div>
	<div class="container last-order-container d-flex flex-column align-items-center py-4">
		<h2 class="dark">Your Last Order</h2>
		<div class="container my-2">
			<div class="row cart-row">
				<img class="p-0" src="<?= images('logo') ?>" alt="test">
				<div class="col d-flex flex-column justify-content-between">
					<div class="row d-flex align-items-center justify-content-between m-0">
						<a class="cart-product-name w-auto" href="">TESTING</a>
					</div>
					<div class="row justify-content-end m-0">
						<div class="quantity-container d-flex w-auto">
							<span class="m-0 mx-3">Amount: </span>
							<span class="ms-5 m-0">Price: €</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row w-100 py-2">
			<span class="more-products">...and X more products. <a href="">Check full order</a> </span>
		</div>
		<div class="row">
			<a class="btn btn-primary rounded-0" href=""><i class="bi-cart-fill"></i>REPEAT ORDER</a>
		</div>
	</div>
	<div class="container d-flex flex-column align-items-center py-4">
		<h2 class="dark">Order History</h2>
		<div class="container my-2">
			<div class="row cart-row d-flex justify-content-between align-items-center">
				<div class="w-auto order-info">
					<span class="me-5">Date: </span>
					<span class="me-5">Amount of products: </span>
					<span>Total price: </span>
				</div>
				<div class="w-auto">
					<a href=""><i class="bi bi-eye-fill"></i></a>
				</div>
			</div>
		</div>
	</div>
</main>