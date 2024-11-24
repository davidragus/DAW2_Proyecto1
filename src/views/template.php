<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> <?= isset($params['pageTitle']) ? $params['pageTitle'] : "Tiefling's Tavern" ?> </title>

	<!-- BOOTSTRAP STYLES -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
	<!-- BOOTSTRAP ICONS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<!-- FONTS STYLESHEET -->
	<link rel="stylesheet" href="<?= css('fonts') ?>">
	<!-- MAIN STYLESHEET -->
	<link rel="stylesheet" href="<?= css('style') ?>">

</head>

<body>

	<header class="sticky-top">
		<?= view($params['pageHeader']) ?>
	</header>

	<?= view($params['pageContent'], $params['variables']) ?>

	<footer>
		<?= view($params['pageFooter']) ?>
	</footer>

	<!-- BOOTSTRAP JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>

</body>

</html>