<div class="card product-card rounded-0 border-0" style="width: 20rem;">
	<img src="<?= images($params->getImage()) ?>" class="card-img-top rounded-0" alt="...">
	<div class="card-body">
		<h5 class="card-title"><?= $params->getName() ?></h5>
		<p class="card-text"><?= $params->getDescription() ?></p>
	</div>
</div>