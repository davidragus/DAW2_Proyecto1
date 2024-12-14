<nav class="navbar navbar-expand bg-body-tertiary py-0">
	<div class="navbar-container justify-content-center container-fluid px-0">
		<a class="navbar-brand py-0 me-4" href=""> <?= images('Logo', 'svg') ?> </a>
		<div class="flex-grow-1 d-flex flex-column justify-content-center">
			<div class="navbar-nav-container d-flex justify-content-between">
				<ul class="navbar-nav d-flex justify-content-between">
					<li class="nav-item d-flex align-items-center px-2">
						<a class="nav-link d-flex align-items-center p-0" href="#"><span>MANAGE PRODUCTS</span><i
								class="bi bi-chevron-right d-none"></i></a>
					</li>
					<li class="nav-item d-flex align-items-center px-2">
						<a class="nav-link d-flex align-items-center p-0" href="#"><span>MANAGE ORDERS</span><i
								class="bi bi-chevron-right d-none"></i></a>
					</li>
					<li class="nav-item d-flex align-items-center px-2">
						<a class="nav-link d-flex align-items-center p-0" href="#"><span>MANAGE USERS</span><i
								class="bi bi-chevron-right d-none"></i></a>
					</li>
				</ul>
				<ul class="navbar-nav d-flex align-items-center px-2">
					<li class="nav-item d-flex align-items-center px-2">
						<a class="btn btn-primary btn-primary-small rounded-0" href="<?= url('') ?>">RETURN TO USER
							VIEW</a>
					</li>
					<li class="nav-item d-flex align-items-center px-2">
						<a class="btn btn-primary btn-primary-small rounded-0" href="#">LOG OUT</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>