<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
	<div class="navbar-container justify-content-center container-fluid px-0">
		<a class="navbar-brand py-0 me-4" href="/"> <img src="<?= images('Logo') ?>" alt="LOGO"> </a>
		<button class="navbar-toggler position-absolute start-0 p-1 m-2" type="button" data-bs-toggle="offcanvas"
			data-bs-target="#offcanvasNav" aria-controls="offcanvasNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- TODO: Add offcanvas for the cart -->
		<button id="yourCartButtonNavMobile" class="navbar-toggler d-lg-none position-absolute end-0 p-1 m-2"
			type="button">
			<i class="bi-cart-fill"></i>
		</button>
		<div class="offcanvas offcanvas-start d-lg-flex justify-content-lg-center" tabindex="-1" id="offcanvasNav"
			aria-labelledby="offcanvasExampleLabel">
			<div class="navbar-nav-container d-lg-flex justify-content-lg-between">
				<ul class="navbar-nav d-lg-flex justify-content-lg-between">
					<li class="nav-item d-lg-flex align-items-lg-center dropdown position-static px-lg-2"
						id="productsDropdown">
						<a class="nav-link <?= isset($_GET['controller']) && $_GET['controller'] == 'products' ? 'active' : '' ?> d-lg-flex align-items-lg-center p-lg-0 dropdown-toggle"
							href="products" aria-expanded="false">
							<span>OUR MENU</span>
						</a>
						<div class="dropdown-menu pb-0 start-0 end-0 rounded-0 bg-black justify-content-center">
							<ul class="dropdown-list px-0">
								<li class="dropdown-sublist-container">
									<span class="list-header pb-1 text-white">AVAILABLE PRODUCTS</span>
									<ul class="dropdown-sublist px-0 pt-3">
										<li><a class="dropdown-sublist-link" href="#">Raid Preparations</a></li>
										<li><a class="dropdown-sublist-link" href="#">Tavernkeeper’s Sandwiches</a></li>
										<li><a class="dropdown-sublist-link" href="#">Arcane Trickster’s Sweet
												Temptations</a></li>
										<li><a class="dropdown-sublist-link" href="#">Alchemist’s Potions</a></li>
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
					<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
						<a class="nav-link d-lg-flex align-items-lg-center p-lg-0" href="#"><span>LATEST
								EVENTS</span><i class="bi bi-chevron-right d-lg-none"></i></a>
					</li>
					<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
						<a class="nav-link d-lg-flex align-items-lg-center p-lg-0" href="#"><span>BOOKINGS</span><i
								class="bi bi-chevron-right d-lg-none"></i></a>
					</li>
				</ul>
				<!-- TODO: Add container to switch between login/signup buttons and profile button -->
				<ul class="navbar-nav d-lg-flex align-items-lg-center px-lg-2">
					<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
						<a class="nav-link d-lg-flex align-items-lg-center p-lg-0" href="#"><span>LOG IN</span><i
								class="bi bi-chevron-right d-lg-none"></i></a>
					</li>
					<li class="nav-item d-lg-flex align-items-lg-center px-lg-2">
						<a class="nav-link d-lg-flex align-items-lg-center p-lg-0" href="#"><span>SIGN UP</span><i
								class="bi bi-chevron-right d-lg-none"></i></a>
					</li>
					<li id="yourCartButtonNav" class="nav-item d-lg-flex align-items-lg-center px-lg-2">
						<a class="btn btn-primary btn-primary-small rounded-0" href="#"><i class="bi-cart-fill"></i>YOUR
							CART</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>