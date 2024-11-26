<a class="card category-container rounded-0 border-0 p-0 my-lg-3 mx-lg-2 mx-xxl-2"
	href="<?= url("products/index/" . $params->getCategoryId()) ?>">
	<img src="<?= images($params->getImage()) ?>" class="card-img-top category-image rounded-0" alt="...">
	<div class="card-body d-flex align-items-center justify-content-center px-5">
		<h4 class="card-text text-center"><?= $params->getName() ?></h4>
	</div>
</a>