<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Todo-List</title>
		<link rel="stylesheet" href="/style/semantic.css">
	</head>
	<body onload="sendActive()">
		<header class="ui attached stackable menu inverted" style="margin-bottom: 25px;">
			<div class="ui container">
				<?= getNavBar() ?>
			</div>
		</header>
		<main class="ui container">
			<?php require_once( getRoute() ); ?>
		</main>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="/script/semantic.js"></script>
		<script src="/script/script.js"></script>
	</body>
</html>