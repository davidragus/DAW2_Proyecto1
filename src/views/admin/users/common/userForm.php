<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/users') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to users
			table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center"><?= isset($params['form_type']) ? 'Edit User' : 'Create User' ?>
		</h1>
	</div>
	<div class="container">
		<form method="post" action="" class="d-flex flex-column align-items-center my-2" id="userForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">User data</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-2">
						<div class="form-floating">
							<select class="form-select" id="role" name="role" required>
								<option value="USER">USER</option>
								<option value="ADMIN">ADMIN</option>
							</select>
							<label for="role">Role</label>
						</div>
					</div>
					<div class="col-5">
						<div class="form-floating">
							<input type="email" class="form-control" id="email" name="email" required>
							<label for="email">Email</label>
						</div>
					</div>
					<div class="col-5">
						<div class="form-floating">
							<input type="password" class="form-control" id="password" name="password" required>
							<label for="password">Password</label>
						</div>
					</div>
				</div>
				<div class="row w-100 mb-4">
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="first_name" name="first_name" required>
							<label for="first_name">First Name</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="last_name" name="last_name" required>
							<label for="last_name">Last Name</label>
						</div>
					</div>
				</div>
				<div class="row">
					<button class="btn btn-primary rounded-0 col mx-2" form="userForm" type="submit">SAVE</button>
				</div>
			</fieldset>
		</form>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>