<main class="container body-content login-form-container w-100 py-5">
	<div class="row justify-content-center">
		<div class="col-4 login-form bg-black py-5 px-3 d-flex flex-column align-items-center"
			style="--bs-bg-opacity: .9;">
			<h1 class="text-white">Log In</h1>
			<form method="post" action="<?= url('users/checkLogin') ?>"
				class="d-flex flex-column align-items-center my-2">
				<div class="row mb-3 w-100">
					<div class="col">
						<div class="form-floating">
							<input type="email" class="form-control" id="emailInput" name="email"
								placeholder="example@email.com" required>
							<label for="emailInput">Email address</label>
						</div>
					</div>
				</div>
				<div class="row mb-3 w-100">
					<div class="col">
						<div class="form-floating">
							<input type="password" class="form-control" id="passwordInput" name="password"
								placeholder="Password" required>
							<label for="passwordInput">Password</label>
						</div>
					</div>
				</div>
				<button class="btn btn-primary rounded-0" href="#">LOG IN</button>
			</form>
			<a href="<?= url('users/signup') ?>" class="form-link text-white-50">Or sign up here</a>
		</div>
	</div>
</main>