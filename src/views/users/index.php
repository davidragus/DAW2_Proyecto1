<main class="mb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Edit Your Profile</h1>
	</div>
	<div class="container">
		<form method="post" action="" class="d-flex flex-column align-items-center my-2" id="changeInfoForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Change your information</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="firstName" name="firstName" value="">
							<label for="firstName">First name</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="lastName" name="lastName" value="">
							<label for="lastName">Last name</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="email" class="form-control" id="email" name="email" value="">
							<label for="email">Email</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="changeInfoForm" type="submit">CHANGE
						INFORMATION</button>
				</div>
			</fieldset>
		</form>
		<form method="post" action="<?= url('users/changePassword') ?>"
			class="d-flex flex-column align-items-center my-2" id="changePasswordForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Change your password</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-4">
						<div class="form-floating">
							<input type="password" class="form-control" id="currentPassword" name="currentPassword"
								required>
							<label for="currentPassword">Current password</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="password" class="form-control" id="newPassword" name="newPassword" required>
							<label for="newPassword">New password</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
								required>
							<label for="confirmPassword">Confirm new password</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="changePasswordForm" type="submit">CHANGE
						PASSWORD</button>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="container pb-4">
		<h2 class="dark d-flex justify-content-center">Your Addresses</h2>
		<div class="container">
			<div class="row address-row d-flex justify-content-between py-2">
				<div class="w-auto">
					<h3 class="dark m-0">Test</h3>
					<span>test</span>
				</div>
				<div class="w-auto d-flex align-items-center">
					<a href="" class="me-2"><i class="bi bi-pencil-fill"></i></a>
					<a href=""><i class="bi bi-trash-fill"></i></a>
				</div>
			</div>
		</div>
	</div>
</main>