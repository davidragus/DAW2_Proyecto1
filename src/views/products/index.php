<main class="container body-content">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Our Menu</h1>
	</div>
	<div class="row justify-content-center">
		<?= view('common/categoryContainer') ?>
		<?php foreach ($params['categories'] as $category): ?>
			<?= view('common/categoryContainer', $category) ?>
		<?php endforeach; ?>
	</div>
	<div class="container products-container p-0">
		<?php foreach ($params['categories'] as $category): ?>
			<div class="row">
				<h2 class="dark text-center mt-5"><?= $category->getName() ?></h2>
				<?php foreach ($params['subcategories'] as $subcategories): ?>
					<?php if ($subcategories->getParentId() == $category->getCategoryId()): ?>
						<h3 class="dark text-center"><?= $subcategories->getName() ?></h3>
						<?= view('common/productContainer') ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</main>