<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/products') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			products
			table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Product Data</h1>
	</div>
	<div class="container" id="productData">
		<fieldset class="d-flex flex-column px-4 pb-4 mb-5 w-100">
			<legend class="float-none w-auto">
				<h2 class="dark px-2">General Information</h2>
			</legend>
			<div class="row w-100 justify-content-between">
				<div class="col-3 w-auto">
					<img class="information-image" id="image" alt="">
				</div>
				<div class="col">
					<div class="row mt-2">
						<span class="information-text w-auto me-3" id="productId"><b>Product ID:</b> </span>
						<span class="information-text w-auto me-3" id="productName"><b>Name:</b> </span>
					</div>
					<div class="row mt-2">
						<span class="information-text w-auto me-3" id="category"><b>Category:</b> </span>
						<span class="information-text w-auto me-3" id="subcategory"><b>Subcategory:</b> </span>
					</div>
					<div class="row mt-2">
						<span class="information-text w-auto me-3" id="onlyAdults"><b>Only for adults:</b> </span>
						<span class="information-text w-auto me-3" id="unitPrice"><b>Price:</b> </span>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('productShow') ?>"></script>