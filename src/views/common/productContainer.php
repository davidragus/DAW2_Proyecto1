<a class="card product-container rounded-0 border-0 px-0 my-lg-3 mx-lg-2 mx-xxl-2 position-relative"
	href="<?= url('products/show/' . $params['product']->getId()) ?>">
	<img src="<?= images($params['product']->getImage()) ?>" class="card-img-top rounded-0"
		alt="<?= $params['product']->getName() ?>">
	<div class="card-body d-flex align-items-center justify-content-center px-5">
		<h4 class="card-title text-center"><?= $params['product']->getName() ?></h4>
	</div>
	<?php if (in_array($params['product']->getId(), $params['productsInOffer'])): ?>
		<span class="on-sale-tag position-absolute text-light">
			ON SALE
		</span>
	<?php endif; ?>
	<?php if ($params['product']->getAdultsOnly() == 1): ?>
		<span class="adult-tag position-absolute bg-white">
			+18
		</span>
	<?php endif; ?>
</a>