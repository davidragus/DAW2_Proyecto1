<main class="container body-content login-form-container w-100">
	<div class="row justify-content-center">
		<div class="col-4 login-form bg-black m-5 py-5 px-3 d-flex flex-column align-items-center"
			style="--bs-bg-opacity: .9;">
			<h1 class="text-white">Log In</h1>
			<form action="" class="d-flex flex-column align-items-center my-2">
				<div class="form-floating mb-3 w-75">
					<input type="email" class="form-control" id="emailInput" name="email"
						placeholder="example@email.com">
					<label for="emailInput">Email address</label>
				</div>
				<div class="form-floating mb-4 w-75">
					<input type="password" class="form-control" id="passwordInput" name="password"
						placeholder="Password">
					<label for="passwordInput">Password</label>
					<div id="passwordHelpBlock" class="form-text text-white-50">
						Your password must be 8-20 characters long, contain letters and numbers, and must not contain
						spaces, special characters, or emoji.
					</div>
				</div>
				<button class="btn btn-primary rounded-0" href="#">LOG IN</button>
			</form>
			<a href="<?= url('users/signup') ?>" class="form-link text-white-50">Or sign up here</a>
		</div>
	</div>
</main>