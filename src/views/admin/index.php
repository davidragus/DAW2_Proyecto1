<main class="container pb-5">
	<div class="row py-4">
		<h1 class="dark d-flex justify-content-center">Administration Panel</h1>
		<h2 class="dark d-flex justify-content-center">Select which data would you like to manage</h2>
	</div>
	<div class="row py-4">
		<div class="container">
			<div class="row d-flex justify-content-around">
				<a class="card rounded-0 border-0 p-0 py-4 col-3" href="<?= url('admin/products') ?>">
					<div class="card-body d-flex align-items-center justify-content-center px-3">
						<h3 class="dark card-text text-center">Manage products</h3>
					</div>
				</a>
				<a class="card rounded-0 border-0 p-0 py-4 col-3" href="<?= url('admin/orders') ?>">
					<div class="card-body d-flex align-items-center justify-content-center px-3">
						<h3 class="dark card-text text-center">Manage orders</h3>
					</div>
				</a>
				<?php if (false): ?>
					<a class="card rounded-0 border-0 p-0 py-4 col-3" href="<?= url('admin/users') ?>">
						<div class="card-body d-flex align-items-center justify-content-center px-3">
							<h3 class="dark card-text text-center">Manage users</h3>
						</div>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>