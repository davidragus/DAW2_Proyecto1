<main class="mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Create Address</h1>
	</div>
	<div class="container">
		<form method="post" action="" class="d-flex flex-column align-items-center my-2" id="changeInfoForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Address information</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="alias" name="alias" value="">
							<label for="alias">Alias</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="address" name="address" value="">
							<label for="address">Address</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="city" name="city" value="">
							<label for="city">City</label>
						</div>
					</div>
					<div class="col-2">
						<div class="form-floating">
							<input type="text" class="form-control" id="cp" name="cp" value="">
							<label for="cp">Zip Code</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="changeInfoForm" type="submit">SAVE</button>
				</div>
			</fieldset>
		</form>
	</div>
</main>