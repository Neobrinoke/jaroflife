<?php
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todo = new Todo( $db );

$todoId = $route->params[2];
$userId = $_SESSION['userId'];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	if( $todo->findById( $todoId ) )
	{
		$todoMember = $todo->findByIdAndUserId( $todoId, $userId );
		if( $todoMember )
		{
			if( $todoMember->authority_id == 1 )
			{
				if( $todo->remove( $todoId ) ) {
					header( 'Location: /list/browse/' );
				} else {
					sendMessage( 'Une erreur s\'est produite', 'error' );
				}
			}
			else sendMessage( 'Vous n\'avez pas la permission requise pour supprimer cette liste', 'error' );
		}
		else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
	}
	else sendMessage( 'Aucune liste correspondante', 'error' );
}
else sendMessage( 'Aucune liste correspondante', 'error' );
?>