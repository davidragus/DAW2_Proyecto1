<a class="card category-container rounded-0 border-0 p-0 my-lg-3 mx-lg-2 mx-xxl-2 <?= !$params && !isset($_GET['id']) ? 'd-none' : '' ?> <?= $params && (isset($_GET['id']) && $params->getCategoryId() == $_GET['id']) ? 'd-none' : '' ?>"
	href="<?= $params ? url("products/index/" . $params->getCategoryId()) : url("products") ?>">
	<img src="<?= $params ? images($params->getImage()) : images('Logo') ?>" class="card-img-top rounded-0" alt="...">
	<div class="card-body d-flex align-items-center justify-content-center px-5">
		<h4 class="card-text text-center"><?= $params ? $params->getName() : 'All Products' ?></h4>
	</div>
</a>