<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> <?= isset($params['pageTitle']) ? $params['pageTitle'] : "Tiefling's Tavern" ?> </title>
</head>

<body>

	<header>
		<?= view($params['pageHeader']) ?>
	</header>



	<footer>
		<?= view($params['pageFooter']) ?>
	</footer>

</body>

</html>