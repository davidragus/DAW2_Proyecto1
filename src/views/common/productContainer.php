<a class="card product-container rounded-0 border-0 px-0 my-lg-3 mx-lg-2 mx-xxl-2 position-relative">
	<img src="<?= images($params->getImage()) ?>" class="card-img-top rounded-0" alt="...">
	<div class="card-body d-flex align-items-center justify-content-center px-5">
		<h4 class="card-title text-center"><?= $params->getName() ?></h4>
	</div>
	<span class="on-sale-tag position-absolute text-light">
		ON SALE
	</span>
	<?php if ($params->getAdultsOnly() == 1): ?>
		<span class="adult-tag position-absolute bg-white">
			+18
		</span>
	<?php endif; ?>
</a>