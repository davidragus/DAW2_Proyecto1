<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/orders') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			orders table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Order Data</h1>
	</div>
	<div class="container" id="orderData">
		<fieldset class="d-flex flex-column px-4 pb-4 mb-5 w-100">
			<legend class="float-none w-auto">
				<h2 class="dark px-2">General Information</h2>
			</legend>
			<div class="row w-100 mb-3">
				<span class="information-text w-auto me-3" id="orderId"><b>Order ID:</b> </span>
				<span class="information-text w-auto me-3" id="user"><b>User:</b> </span>
				<span class="information-text w-auto me-3" id="date"><b>Date:</b> </span>
			</div>
			<div class="row w-100">
				<span class="information-text w-auto me-3" id="address"><b>Address:</b> </span>
				<form method="post" action="" class="w-auto" id="orderForm">
					<div class="col">
						<div class="form-floating">
							<select class="form-select" id="status" name="status">
								<option value="CANCELLED">CANCELLED</option>
								<option value="PENDING">PENDING</option>
								<option value="DELIVERED">DELIVERED</option>
							</select>
							<label for="status">Status</label>
						</div>
					</div>
				</form>
				<div class="col">
					<button class="btn btn-primary rounded-0 col mx-2" form="orderForm" type="submit">SAVE
						ORDER</button>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="container d-flex justify-content-end align-items-center mb-2">
		<div class="form-floating">
			<select class="form-select" id="changeCurrency" name="currency">
				<option value="EUR">Euro (€)</option>
				<option value="USD">United States Dollar ($)</option>
				<option value="CAD">Canadian Dollar (C$)</option>
				<option value="AUD">Australian Dollar (A$)</option>
			</select>
			<label for="changeCurrency">Currency</label>
		</div>
	</div>
	<div class="container">
		<div class="container pb-4" id="orderLinesContainer">
			<div class="mb-3">
				<h2 class="dark d-flex justify-content-center m-0" id="addressTitle">Order Lines</h2>
			</div>
		</div>
	</div>
	<div class="container amount-container w-auto d-flex flex-column align-items-end py-4 mb-3 mx-0">
		<h2 class="dark">Total amount</h2>
		<span id="productsPrice">Products price: </span>
		<span id="taxesPrice">Taxes (10%): </span>
		<span class="total-price pt-2" id="totalPrice">Total price: </span>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('orderForm') ?>"></script>