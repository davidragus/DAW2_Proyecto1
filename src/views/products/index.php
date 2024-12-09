<main class="container pb-5">
	<div class="row pt-4">
		<h1 class="dark d-flex justify-content-center">Our Menu</h1>
	</div>
	<div class="row justify-content-center">
		<?= view('common/categoryContainer') ?>
		<?php foreach ($params['categories'] as $category): ?>
			<?= view('common/categoryContainer', $category) ?>
		<?php endforeach; ?>
	</div>
	<div class="container p-0">
		<?php foreach ($params['products'] as $categoryName => $content): ?>
			<div class="row justify-content-center">
				<h2 class="dark text-center mt-5"><?= $categoryName ?></h2>
				<?php foreach ($content as $subcategoryName => $value): ?>
					<?php if (is_array($value)): ?>
						<div class="row justify-content-center p-0">
							<h3 class="dark text-center mt-5"><?= $subcategoryName ?></h3>
							<?php foreach ($value as $products): ?>
								<?= view('common/productContainer', $products) ?>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<?= view('common/productContainer', $value) ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</main>