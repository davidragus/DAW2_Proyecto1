<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('users') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to
			user settings</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">
			<?= $params['formType'] == 'edit' ? 'Modify Address' : 'Create Address' ?>
		</h1>
	</div>
	<div class="container">
		<?php //TODO: Añadir longitud maxima en los inputs ?>
		<form method="post"
			action="<?= url($params['formType'] == 'edit' ? 'addresses/update/' . $params['address']->getAddressId() : 'addresses/store') ?>"
			class="d-flex flex-column align-items-center my-2" id="addressForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Address information</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-lg-3 col-12 mb-lg-0 mb-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="alias" name="alias"
								value="<?= $params['formType'] == 'edit' ? $params['address']->getAlias() : '' ?>"
								required>
							<label for="alias">Alias</label>
						</div>
					</div>
					<div class="col-lg-4 col-12 mb-lg-0 mb-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="address" name="address"
								value="<?= $params['formType'] == 'edit' ? $params['address']->getAddress() : '' ?>"
								required>
							<label for="address">Address</label>
						</div>
					</div>
					<div class="col-lg-3 col-12 mb-lg-0 mb-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="city" name="city"
								value="<?= $params['formType'] == 'edit' ? $params['address']->getCity() : '' ?>"
								required>
							<label for="city">City</label>
						</div>
					</div>
					<div class="col-lg-2 col-12 mb-lg-0">
						<div class="form-floating">
							<input type="text" class="form-control" id="cp" name="cp"
								value="<?= $params['formType'] == 'edit' ? $params['address']->getCP() : '' ?>"
								required>
							<label for="cp">Zip Code</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="addressForm" type="submit">SAVE</button>
				</div>
			</fieldset>
		</form>
	</div>
</main>