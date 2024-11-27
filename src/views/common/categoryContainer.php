<a class="card category-container rounded-0 border-0 p-0 my-lg-3 mx-lg-2 mx-xxl-2 <?= !$params && !isset($_GET['id']) ? 'active' : '' ?> <?= $params && (isset($_GET['id']) && $params->getCategoryId() == $_GET['id']) ? 'active' : '' ?>"
	href="<?= $params ? url("products/index/" . $params->getCategoryId()) : url("products") ?>">
	<div class="card-body d-flex align-items-center justify-content-center px-3">
		<h4 class="card-text text-center"><?= $params ? $params->getName() : 'Show All Products' ?></h4>
	</div>
</a>