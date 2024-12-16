<main class="container pb-5">
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Manage Users</h1>
	</div>
	<div class="container mb-2">
		<form action="" class="d-flex flex-column align-items-center my-2">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Filters</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-2">
						<div class="form-floating">
							<select class="form-select" id="roleFilter">
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
							<input type="text" class="form-control" id="firstNameFilter" name="firstName">
							<label for="firstNameFilter">First Name</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="text" class="form-control" id="lastNameFilter" name="lastName">
							<label for="lastNameFilter">Last Name</label>
						</div>
					</div>
				</div>
				<input class="btn btn-primary rounded-0" type="submit" value="APPLY FILTERS">
			</fieldset>
		</form>
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
		<!-- <tr>
			<td>1</td>
			<td>ADMIN</td>
			<td>johndoe@test.com</td>
			<td>John</td>
			<td>Doe</td>
			<td>Test</td>
		</tr>
		<tr>
			<td>1</td>
			<td>ADMIN</td>
			<td>johndoe@test.com</td>
			<td>John</td>
			<td>Doe</td>
			<td>Test</td>
		</tr>
		<tr>
			<td>1</td>
			<td>ADMIN</td>
			<td>johndoe@test.com</td>
			<td>John</td>
			<td>Doe</td>
			<td>Test</td>
		</tr> -->
	</table>
</main>
<script src="<?= js('userManagement') ?>"></script>