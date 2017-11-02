<?php
include 'class/database.php';
$db = new Database('todo_project');
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Todo-List</title>
		<link rel="stylesheet" href="style/semantic.css">
	</head>
	<body onload="sendActive()">
		<header class="ui attached stackable menu" style="margin-bottom: 25px;">
			<div class="ui container">
				<a href="/browse" class="item">Afficher la liste</a>
				<a href="/add" class="item">Ajouter une tâche</a>
			</div>
		</header>
		<main class="ui container">
			<div class="ui segment">
				<?php
				$uri = $_SERVER['REQUEST_URI'];
				if( $uri !== "/" )
				{
					$uri = substr( $_SERVER['REQUEST_URI'], 1 );
					if( strpos( $uri, "?" ) !== false )
						$uri = substr( $uri, 0, strpos( $uri, "?" ) );

					$page = "pages/".$uri.".php";
					if( !file_exists( $page ) )
						$page = "pages/browse.php";
				}
				else $page = "pages/browse.php";

				require $page;
				?>
			</div>
		</main>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="script/semantic.js"></script>
		<script src="script/script.js"></script>
	</body>
</html>