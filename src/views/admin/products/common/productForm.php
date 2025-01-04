<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/products') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			products
			table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">
			<?= isset($params['form_type']) ? 'Edit Product' : 'Create Product' ?>
		</h1>
	</div>
	<div class="container">
		<form method="post" action="" class="d-flex flex-column align-items-center my-2" id="productForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Product data</h2>
				</legend>
				<div class="row w-100 mb-3">
					<div class="col-3 d-flex flex-column align-items-center">
						<img class="information-image" id="image" alt="">
						<input class="form-control mt-2" type="file" id="formFile" accept="image/webp" required>
					</div>
					<div class="col">
						<div class="row w-100 mb-4">
							<div class="col-6">
								<div class="form-floating">
									<input type="text" class="form-control" id="productName" name="productName"
										required>
									<label for="productName">Product name</label>
								</div>
							</div>
							<div class="col-3">
								<div class="form-floating">
									<select class="form-select" id="category" name="category" required>
										<option value=""></option>
									</select>
									<label for="category">Category</label>
								</div>
							</div>
							<div class="col-3">
								<div class="form-floating">
									<select class="form-select" id="subcategory" name="subcategory" required>
										<option value=""></option>
									</select>
									<label for="subcategory">Subcategory</label>
								</div>
							</div>
						</div>
						<div class="row w-100 mb-3">
							<div class="col-3">
								<div class="form-floating">
									<input type="number" class="form-control" id="unitPrice" name="unitPrice" required>
									<label for="unitPrice">Price (€)</label>
								</div>
							</div>
							<div class="col-3 d-flex align-items-center">
								<input class="form-check-input input-check m-0 me-2 fs-3" type="checkbox" value=""
									id="onlyAdults">
								<label class="form-check-label" for="onlyAdults">
									<p class="m-0 mt-1">Only for adults</p>
								</label>
							</div>
						</div>
						<div class="row w-100">
							<div class="col">
								<div class="form-floating">
									<textarea class="form-control input-description" id="description"></textarea>
									<label for="description">Description</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="productForm" type="submit">SAVE
						PRODUCT</button>
				</div>
			</fieldset>
		</form>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>