<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
	<div class="navbar-container justify-content-center container-fluid px-0">
		<a class="navbar-brand py-0 me-4" href="/"> <?= images('Logo', 'svg') ?> </a>
		<button class="navbar-toggler position-absolute start-0 p-1 m-2" type="button" data-bs-toggle="offcanvas"
			data-bs-target="#offcanvasNav" aria-controls="offcanvasNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a id="yourCartButtonNavMobile" class="navbar-toggler d-lg-none position-absolute end-0 p-1 m-2" type="button"
			href="<?= url('cart') ?>">
			<i class="bi-cart-fill"></i>
		</a>
		<div class="offcanvas offcanvas-start d-lg-flex justify-content-lg-center" tabindex="-1" id="offcanvasNav"
			aria-labelledby="offcanvasExampleLabel">
			<div class="navbar-nav-container d-lg-flex justify-content-lg-between">
				<ul class="navbar-nav d-lg-flex justify-content-lg-between">
					<li class="nav-item d-lg-flex align-items-lg-center dropdown position-static px-lg-2"
						id="productsDropdown">
						<a class="nav-link <?= isset($_GET['controller']) && $_GET['controller'] == 'products' ? 'active' : '' ?> d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
							href="<?= url("products") ?>" aria-expanded=" false">
							<span>OUR MENU</span>
						</a>
						<div class="dropdown-menu pb-0 start-0 end-0 rounded-0 bg-black justify-content-center">
							<ul class="dropdown-list px-0 d-flex">
								<li class="dropdown-sublist-container">
									<span class="list-header pb-1 text-white">AVAILABLE PRODUCTS</span>
									<ul class="dropdown-sublist px-0 pt-3">
										<?php foreach ($categories as $category): ?>
											<li><a class="dropdown-sublist-link"
													href="<?= url("products/index/" . $category->getCategoryId()) ?>"><?= $category->getName() ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item d-lg-none align-items-lg-center dropdown position-static px-lg-2">
						<a class="nav-link d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
							href="?controller=products" aria-expanded="false">
							<span>OUR MENU</span><i class="bi bi-chevron-right d-lg-none"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav d-lg-flex align-items-lg-center px-lg-2">
					<?php if (!checkSessionVar(USER_SESSION_VAR)): ?>
						<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
							<a class="nav-link <?= (isset($_GET['controller']) && $_GET['controller'] == 'users') && (isset($_GET['action']) && $_GET['action'] == 'login') ? 'active' : '' ?> d-lg-flex align-items-lg-center p-lg-0"
								href="<?= url('users/login') ?>"><span>LOG
									IN</span><i class="bi bi-chevron-right d-lg-none"></i></a>
						</li>
						<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
							<a class="nav-link <?= (isset($_GET['controller']) && $_GET['controller'] == 'users') && (isset($_GET['action']) && $_GET['action'] == 'signup') ? 'active' : '' ?> d-lg-flex align-items-lg-center p-lg-0"
								href="<?= url('users/signup') ?>"><span>SIGN
									UP</span><i class="bi bi-chevron-right d-lg-none"></i></a>
						</li>
					<?php endif; ?>
					<?php if (checkSessionVar(USER_SESSION_VAR) && checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')): ?>
						<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
							<a class="nav-link <?= (isset($_GET['controller']) && $_GET['controller'] == 'users') && (isset($_GET['action']) && $_GET['action'] == 'signup') ? 'active' : '' ?> d-lg-flex align-items-lg-center p-lg-0"
								href="<?= url('admin') ?>"><span>ADMIN PANEL</span><i
									class="bi bi-chevron-right d-lg-none"></i></a>
						</li>
					<?php endif; ?>
					<?php if (checkSessionVar(USER_SESSION_VAR)): ?>
						<li class="nav-item d-lg-flex align-items-lg-center dropdown position-static px-lg-2"
							id="userSettingsDropdown">
							<a class="nav-link d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
								href="<?= url("users") ?>" aria-expanded=" false">
								<span>YOUR PROFILE</span><i class="bi bi-chevron-right d-lg-none"></i>
							</a>
							<div class="dropdown-menu pb-0 start-0 end-0 rounded-0 bg-black justify-content-center">
								<ul class="dropdown-list px-0 d-flex">
									<li class="dropdown-sublist-container">
										<span class="list-header pb-1 text-white">ORDERS</span>
										<ul class="dropdown-sublist px-0 pt-3">
											<li><a class="dropdown-sublist-link" href="<?= url('orders') ?>">Your orders</a>
											</li>
										</ul>
									</li>
									<li class="dropdown-sublist-container">
										<span class="list-header pb-1 text-white">SETTINGS</span>
										<ul class="dropdown-sublist px-0 pt-3">
											<li><a class="dropdown-sublist-link" href="<?= url('users') ?>">Edit your
													profile</a></li>
											<li><a class="dropdown-sublist-link" href="<?= url('users/logout') ?>">Log
													out</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</li>
						<li id="yourCartButtonNav" class="nav-item d-lg-flex align-items-lg-center px-lg-2">
							<a class="btn btn-primary btn-primary-small rounded-0" href="<?= url('cart') ?>"><i
									class="bi-cart-fill"></i>YOUR
								CART</a>
						</li>
						<li class="nav-item d-lg-none align-items-lg-center dropdown position-static px-lg-2"
							id="userSettingsDropdown">
							<a class="nav-link d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
								href="<?= url("orders") ?>" aria-expanded=" false">
								<span>YOUR ORDERS</span><i class="bi bi-chevron-right d-lg-none"></i>
							</a>
						</li>
						<li class="nav-item d-lg-none align-items-lg-center dropdown position-static px-lg-2"
							id="userSettingsDropdown">
							<a class="nav-link d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
								href="<?= url("users/logout") ?>" aria-expanded=" false">
								<span>LOG OUT</span><i class="bi bi-chevron-right d-lg-none"></i>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</nav>