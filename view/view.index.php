<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Todo-List</title>
		<link rel="stylesheet" href="/style/semantic.css">
		<link rel="stylesheet" href="/style/style.css">
	</head>
	<body>
		<header class="ui attached stackable menu inverted" style="margin-bottom: 25px;">
			<div class="ui container">
				<?= $navigation ?>
			</div>
		</header>
		<main class="ui container">
			<?php require_once( $route->getRoute() ); ?>
		</main>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="/script/tablesort.js"></script>
		<script src="/script/semantic.js"></script>
		<script src="/script/script.js"></script>
	</body>
</html>