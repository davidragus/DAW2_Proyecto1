<div class="container body-content">
	<div class="row">
		<h1 class="d-flex justify-content-center">OUR MENU</h1>
	</div>
	<div class="row justify-content-center">
		<?php foreach ($params['categories'] as $category): ?>
			<?= view('common/categoryContainer', $category) ?>
		<?php endforeach; ?>
	</div>
	<div class="row">
		<?php foreach ($params['categories'] as $category): ?>
			<h2><?= $category->getName() ?></h2>
			<?php foreach ($params['subcategories'] as $subcategories): ?>
				<?php if ($subcategories->getParentId() == $category->getCategoryId()): ?>
					<h3><?= $subcategories->getName() ?></h3>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</div>
</div>

<?php //foreach ($params['products'] as $product): ?>
<?php //view('common/productContainer', $product) ?>
<?php //endforeach; ?>