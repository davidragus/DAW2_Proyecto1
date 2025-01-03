<main class="container pb-5">
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Manage Products</h1>
	</div>
	<div class="container mb-2">
		<form method="get" action="" class="d-flex flex-column align-items-center my-2" id="filtersForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Filters</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-6">
						<div class="form-floating">
							<input type="text" class="form-control" id="nameFilter" name="name">
							<label for="nameFilter">Product Name</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<select class="form-select" name="category" id="categoryFilter">
								<option value=""></option>
							</select>
							<label for="categoryFilter">Category</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<select class="form-select" name="subcategory" id="subcategoryFilter">
								<option value=""></option>
							</select>
							<label for="subcategoryFilter">Subcategory</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="filtersForm" type="submit">SEARCH</button>
					<button id="clearFilter" class="btn btn-primary rounded-0 col mx-2" form="filtersForm"
						type="submit">CLEAR</button>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="container d-flex justify-content-end mb-2">
		<a class="btn btn-primary btn-primary-small rounded-0" href="<?= url('products') ?>"><i
				class="bi bi-plus-lg"></i>ADD PRODUCT</a>
	</div>
	<table id="productsTable" class="container admin-table mb-5">
		<tr>
			<th>ID</th>
			<th>Product Name</th>
			<th>Category</th>
			<th>Subcategory</th>
			<th>Actions</th>
		</tr>
	</table>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('productsManagement') ?>"></script>