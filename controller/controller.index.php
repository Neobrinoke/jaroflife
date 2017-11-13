<?php
// Démarrage de la session
session_start();

// Importation des modèles
require_once( 'model/model.database.php' );
require_once( 'script/function.php' );

// Déclaration de la variable base de donnée
$db = new Database( 'todo_project' );

function getNavBar()
{
	if( isset( $_SESSION['userId'] ) )
	{
		echo '
		<a href="/browse" class="ui item">Afficher mes listes</a>
		<div class="right menu">
			<a href="/disconnect" class="ui item">Déconnexion</a>
		</div>';
	}
	else
	{
		echo '
		<div class="right menu">
			<a href="/register" class="ui item">Inscription</a>
			<a href="/connect" class="ui item">Connexion</a>
		</div>';
	}
}

// Affichage de la vue principale
require( 'view/view.index.php' );
?>