<main class="container pb-5">
	<div class="row pt-4">
		<a href="<?= url('admin/users') ?>" class="go-back-button"><i class="bi bi-arrow-left pe-2"></i>Back to users
			table</a>
	</div>
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">User Data</h1>
	</div>
	<div class="container">
		<fieldset class="d-flex flex-column px-4 pb-4 mb-5 w-100">
			<legend class="float-none w-auto">
				<h2 class="dark px-2">Order Information</h2>
			</legend>
			<div class="row w-100">
				<span class="information-text w-auto me-3" id="userId"><b>User ID:</b> </span>
				<span class="information-text w-auto me-3" id="firstName"><b>First name:</b>
				</span>
				<span class="information-text w-auto me-3" id="lastName"><b>Last name:</b></span>
			</div>
			<div class="row w-100 mt-3">
				<span class="information-text w-auto me-3" id="email"><b>Email address:</b> </span>
				<span class="information-text w-auto me-3" id="role"><b>Role:</b> </span>
			</div>
		</fieldset>
	</div>
</main>
<script src="<?= js('adminClasses') ?>"></script>
<script src="<?= js('userShow') ?>"></script>