<main class="container pb-5">
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Manage Orders</h1>
	</div>
	<div class="container mb-2">
		<form method="get" action="" class="d-flex flex-column align-items-center my-2" id="filtersForm">
			<fieldset class="d-flex flex-column align-items-center p-4 mb-5 w-100">
				<legend class="float-none w-auto">
					<h2 class="dark px-2">Filters</h2>
				</legend>
				<div class="row w-100 mb-4">
					<div class="col-3">
						<div class="form-floating">
							<select class="form-select" id="userFilter" name="user">
								<option value=""></option>
							</select>
							<label for="userFilter">User</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<select class="form-select" id="statusFilter" name="status">
								<option value=""></option>
								<option value="CANCELLED">CANCELLED</option>
								<option value="PENDING">PENDING</option>
								<option value="DELIVERED">DELIVERED</option>
							</select>
							<label for="statusFilter">Status</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="date" class="form-control" id="startDateFilter" name="startDate">
							<label for="startDateFilter">Start Date</label>
						</div>
					</div>
					<div class="col-3">
						<div class="form-floating">
							<input type="date" class="form-control" id="endDateFilter" name="endDate">
							<label for="endDateFilter">End Date</label>
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
	<table id="ordersTable" class="container admin-table mb-5">
		<tr>
			<th>ID</th>
			<th>User</th>
			<th>Order Date</th>
			<th>Status</th>
			<th>Total Price</th>
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
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('ordersManagement') ?>"></script>