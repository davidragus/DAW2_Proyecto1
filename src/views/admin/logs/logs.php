<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to admin main
			page</a>
	</div>
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Logs</h1>
	</div>
	<div class="container mb-2">
		<form method="get" action="" class="d-flex flex-column align-items-center my-2" id="filtersForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Filters</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-4">
						<div class="form-floating">
							<select class="form-select" id="userFilter" name="user_id">
								<option value=""></option>
							</select>
							<label for="userFilter">User</label>
						</div>
					</div>
					<div class="col-2">
						<div class="form-floating">
							<input type="date" class="form-control" id="startDateFilter" name="startDate">
							<label for="startDateFilter">Start Date</label>
						</div>
					</div>
					<div class="col-2">
						<div class="form-floating">
							<input type="date" class="form-control" id="endDateFilter" name="endDate">
							<label for="endDateFilter">End Date</label>
						</div>
					</div>
					<div class="col-2">
						<div class="form-floating">
							<select class="form-select" name="action" id="actionFilter">
								<option value="" selected></option>
								<option value="CREATE">CREATE</option>
								<option value="UPDATE">UPDATE</option>
								<option value="DELETE">DELETE</option>
							</select>
							<label for="actionFilter">Action</label>
						</div>
					</div>
					<div class="col-2">
						<div class="form-floating">
							<select class="form-select" name="type" id="typeFilter">
								<option value="" selected></option>
								<option value="USER">USER</option>
								<option value="PRODUCT">PRODUCT</option>
								<option value="ORDER">ORDER</option>
							</select>
							<label for="typeFilter">Type</label>
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
	<table id="logsTable" class="container admin-table mb-5">
		<tr>
			<th>Date</th>
			<th>User</th>
			<th>Action</th>
			<th>Type</th>
			<th>ID</th>
		</tr>
	</table>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('logs') ?>"></script>