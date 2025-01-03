<main class="container body-content login-form-container w-100 py-5">
	<div class="row justify-content-center">
		<div class="col-4 login-form bg-black py-5 px-3 d-flex flex-column align-items-center"
			style="--bs-bg-opacity: .9;">
			<h1 class="text-white">Sign Up</h1>
			<?php if (isset($_SESSION['error'])): ?>
				<div class="row error-container w-100 py-2 my-2 d-flex justify-content-center">
					<p class="m-0 w-auto text-light"><?= $_SESSION['error'] ?></p>
				</div>
				<?php unset($_SESSION['error']) ?>
			<?php endif; ?>
			<form method="post" action="<?= url('users/register') ?>"
				class="d-flex flex-column align-items-center my-2 w-75">
				<div class="row mb-3 w-100">
					<div class="col">
						<div class="form-floating">
							<input type="text" class="form-control" id="firstNameInput" name="firstName"
								placeholder="John" maxlength="30" required>
							<label for="firstNameInput">First Name</label>
						</div>
					</div>
					<div class="col">
						<div class="form-floating">
							<input type="text" class="form-control" id="lastNameInput" name="lastName" placeholder="Doe"
								maxlength="60" required>
							<label for="lastNameInput">Last Name</label>
						</div>
					</div>
				</div>
				<div class="row mb-3 w-100">
					<div class="col">
						<div class="form-floating">
							<input type="email" class="form-control" id="emailInput" name="email"
								placeholder="example@email.com" maxlength="255" required>
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
					<div class="col">
						<div class="form-floating">
							<input type="password" class="form-control" id="confirmPasswordInput" name="confirmPassword"
								placeholder="Confirm Password" required>
							<label for="confirmPasswordInput">Confirm Password</label>
						</div>
					</div>
					<div id="passwordHelpBlock" class="form-text text-white-50">
						Your password must be 8-20 characters long, contain a upper case letter, a lower case letter and
						a number.
					</div>
				</div>
				<button class="btn btn-primary rounded-0" href="#">SIGN UP</button>
			</form>
			<a href="<?= url('users/login') ?>" class="form-link text-white-50">Or log in here</a>
		</div>
	</div>
</main>