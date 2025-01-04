<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/users') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to users
			table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">User Data</h1>
	</div>
	<div class="container" id="userData">
		<fieldset class="d-flex flex-column px-4 pb-4 mb-5 w-100">
			<legend class="float-none w-auto">
				<h2 class="dark px-2">General Information</h2>
			</legend>
			<div class="row w-100">
				<span class="information-text w-auto me-3" id="userId"><b>User ID:</b> </span>
				<span class="information-text w-auto me-3" id="firstName"><b>First name:</b>
				</span>
				<span class="information-text w-auto me-3" id="lastName"><b>Last name:</b> </span>
			</div>
			<div class="row w-100 mt-3">
				<span class="information-text w-auto me-3" id="email"><b>Email address:</b> </span>
				<span class="information-text w-auto me-3" id="role"><b>Role:</b> </span>
			</div>
		</fieldset>
	</div>
	<div class="container">
		<div class="container pb-4" id="addressesContainer">
			<div class="mb-3">
				<h2 class="dark d-flex justify-content-center m-0" id="addressTitle">Addresses</h2>
			</div>
			<div class="row address-row d-flex justify-content-between py-2">
				<div class="w-auto d-flex flex-column">
					<h3 class="dark m-0"></h3>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>