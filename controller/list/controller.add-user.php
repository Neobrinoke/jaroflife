<?php
require_once( 'model/model.user.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$user = new User( $db );
$todo = new Todo( $db );

$todoId = $route->params[2];
$userId = $_SESSION['userId'];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	if( $todo->findById( $todoId ) )
	{
		if( $todo->findByIdAndUserId( $todoId, $userId ) )
		{
			if( isset( $_POST['sendAddUser'] ) )
			{
				$error = [];
				$userInfo = null;
				$name = null;
				$authorityId = null;

				if( isset( $_POST['name'] ) )
				{
					$name = htmlspecialchars( $_POST['name'] );
					$authorityId = htmlspecialchars( $_POST['authority'] );
					if( $name && $authorityId )
					{
						$userInfo = $user->findByNameOrEmail( $name );
						if( !$userInfo ) {
							array_push( $error, 'Utilisateur introuvable' );
						}
					}
					else array_push( $error, 'Merci de tous completer' );
				}
				else array_push( $error, 'Merci de tous completer' );

				if( empty( $error ) )
				{
					if( $todo->addUser( $userInfo->userid, $todoId, $authorityId ) ) {
						sendMessage( 'Utilisateur ajouté', 'valid' );
					} else {
						sendMessage( 'Une erreur s\'est produite', 'error' );
					}
				}
				else sendMessage( $error, 'error', true );
			}

			require_once( 'view/list/view.add-user.php' );
		}
		else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
	}
	else sendMessage( 'Aucune liste correspondante', 'error' );
}
else sendMessage( 'Aucune liste correspondante', 'error' );
?>