<main class="container mw-100 pb-5 px-0">
	<div class="container mw-100 main-banner mb-5 d-flex flex-column justify-content-center align-items-center">
		<h1 class="text-light">Meet other adventurers!</h1>
		<p class="text-light m-0">Come with your friends and enjoy an adventure.</p>
		<p class="text-light mt-0 mb-4">Or have your own adventure at home with our fantastic sandwiches.</p>
		<div>
			<a class="btn btn-primary rounded-0 mx-4" href="<?= url('products') ?>">ORDER NOW</a>
		</div>
	</div>
	<article class="container first-banner mb-5">
		<div class="container d-flex flex-column justify-content-between w-50 h-100 m-0 p-5">
			<div>
				<h2 class="text-light">New ordering system</h2>
				<p class="text-light">The new ordering system is now launched. Order now to have supplies for your next
					campaign!</p>
			</div>
			<div>
				<a class="btn btn-primary rounded-0 w-auto" href="<?= url('products') ?>">ORDER NOW</a>
			</div>
		</div>
	</article>
	<article class="container second-banner mb-5">
		<div class="container d-flex flex-column justify-content-between w-50 h-100 m-0 p-5">
			<div>
				<h2 class="text-light">Sign up!</h2>
				<p class="text-light">Create an account if you want to be able to create orders!</p>
			</div>
			<div>
				<a class="btn btn-primary rounded-0 w-auto" href="<?= url('users/signup') ?>">SIGN UP</a>
			</div>
		</div>
	</article>
	<div class="container d-flex justify-content-between align-items-center px-5">
		<h3 class="dark mb-0">You might be interested...</h3>
		<div class="carousel-buttons position-relative">
			<button id="carousel-prev" class="carousel-button carousel-left-button position-absolute"
				data-bs-target="#carouselExample" data-bs-slide="prev">
				<i class="bi bi-arrow-left"></i>
			</button>
			<button id="carousel-next" class="carousel-button" data-bs-target="#carouselExample" data-bs-slide="next">
				<i class="bi bi-arrow-right"></i>
			</button>
		</div>
	</div>
	<div id="carouselExample" class="carousel slide">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 position-relative">
					<img src="<?= images('KingsFallNectar') ?>" class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">New drinks: Necrotic Concoctions</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href="<?= url('products/index/4') ?>"><i
									class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 position-relative">
					<img src="<?= images('MainBanner') ?>" class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">Create your account!</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href="<?= url('users/signup') ?>"><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 position-relative">
					<img src="<?= images('CrimeLordsBanquet') ?>" class="card-img-top carousel-image rounded-0"
						alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">New sandwich: Crime Lord's Banquet</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href="<?= url('products/show/12') ?>"><i
									class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 position-relative">
					<img src="<?= images('FranticBarbarianNachos') ?>" class="card-img-top carousel-image rounded-0"
						alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">New starter dish: Frantic Barbarian Nachos</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href="<?= url('products/show/5') ?>"><i
									class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 position-relative">
					<img src="<?= images('GuardianRootCrystal') ?>" class="card-img-top carousel-image rounded-0 mw-100"
						alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">Vegan options now available!</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href="<?= url('products/index/2') ?>"><i
									class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="carousel" data-bs-ride="carousel" id="carouselExample">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 me-4 position-relative">
					<img src="..." class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">This is a test 1</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href=""><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 me-4 position-relative">
					<img src="..." class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">This is a test 2</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href=""><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 me-4 position-relative">
					<img src="..." class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">This is a test 3</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href=""><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 me-4 position-relative">
					<img src="..." class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">This is a test 4</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href=""><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="carousel-card card rounded-0 border-0 px-0 my-lg-3 me-4 position-relative">
					<img src="..." class="card-img-top carousel-image rounded-0" alt="...">
					<div class="card-body mx-3 d-flex flex-column justify-content-between">
						<h4 class="card-title">This is a test 5</h4>
						<div class="d-flex justify-content-end">
							<a class="card-link" href=""><i class="bi bi-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</main>

<script src="<?= js('carousel') ?>"></script>