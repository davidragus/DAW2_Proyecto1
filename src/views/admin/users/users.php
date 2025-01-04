<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to admin main
			page</a>
	</div>
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Manage Users</h1>
	</div>
	<div class="container mb-2">
		<form method="get" action="" class="d-flex flex-column align-items-center my-2" id="filtersForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Filters</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-2">
						<div class="form-floating">
							<select class="form-select" name="role" id="roleFilter">
								<option value="" selected></option>
								<option value="ADMIN">ADMIN</option>
								<option value="USER">USER</option>
							</select>
							<label for="roleFilter">Role</label>
						</div>
					</div>
					<div class="col-4">
						<div class="form-floating">
							<input type="text" class="form-control" id="emailFilter" name="email">
							<label for="emailFilter">Email</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="firstNameFilter" name="first_name">
							<label for="firstNameFilter">First Name</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="lastNameFilter" name="last_name">
							<label for="lastNameFilter">Last Name</label>
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
	<div class="container d-flex justify-content-end align-items-center mb-2">
		<a class="btn btn-primary btn-primary-small rounded-0" href="<?= url('admin/createUser') ?>"><i
				class="bi bi-plus-lg"></i>CREATE USER</a>
	</div>
	<table id="usersTable" class="container admin-table mb-5">
		<tr>
			<th>ID</th>
			<th>Role</th>
			<th>Email Address</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Actions</th>
		</tr>
	</table>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('userManagement') ?>"></script>