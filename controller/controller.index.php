<?php
// Démarrage de la session
session_start();

// Importation des modèles
require_once( 'model/model.database.php' );
require_once( 'model/model.route.php' );
require_once( 'script/function.php' );

// Déclaration de la variable base de donnée
$db = new Database( 'todo_project' );
$route = new Route( $_SERVER['REQUEST_URI'] );

ob_start();
if( isset( $_SESSION['userId'] ) )
{
?>
	<a href="/list/create/" class="ui item">Crée une liste</a>
	<div class="right menu">
		<div class="ui dropdown icon item">
			<span><i class="user circle outline icon"></i><?= $_SESSION['name'] ?><i class="dropdown icon"></i></span>
			<div class="menu">
				<p class="item">Connecté en tant que <strong><?= $_SESSION['name'] ?></strong></p>
				<div class="divider"></div>
				<a href="/list/browse/" class="item"><i class="list icon"></i>Afficher mes listes</a>
				<div class="divider"></div>
				<!-- <a href="/user/account/" class="item"><i class="settings icon"></i>Mon compte</a> -->
				<a href="#" class="item"><i class="settings icon"></i>Mon compte</a>
				<div class="divider"></div>
				<a href="/user/disconnect/" class="item"><i class="sign out icon"></i>Déconnexion</a>
			</div>
		</div>
	</div>
<?php
}
else
{
?>
	<div class="right menu">
		<a href="/user/register/" class="ui item">Inscription</a>
		<a href="/user/connect/" class="ui item">Connexion</a>
	</div>
<?php
}
$navigation = ob_get_clean();

// Affichage de la vue principale
require( 'view/view.index.php' );
?>