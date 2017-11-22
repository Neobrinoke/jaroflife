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
			if( $todoMember->authority_id == 1 || $todoMember->authority_id == 2 )
			{
				if( isset( $_POST['editTodo'] ) )
				{
					$error = [];
					if( isset( $_POST['name'], $_POST['description'] ) )
					{
						$name = htmlspecialchars( $_POST['name'] );
						$description = htmlspecialchars( $_POST['description'] );
						if( $name && $description )
						{
							if( strlen( $name ) < 4 ) {
								array_push( $error, "Le nom dois avoir une longueur supérieur à 4" );
							}

							if( strlen( $description ) < 4 ) {
								array_push( $error, "La description dois avoir une longueur supérieur à 4" );
							}

							if( trim( $name ) == null || trim( $description ) == null ) {
								array_push( $error, "Merci de tous compléter" );
							}
						}
						else array_push( $error, "Merci de tous compléter" );
					}
					else array_push( $error, "Merci de tous compléter" );

					if( empty( $error ) )
					{
						if( $todo->update( $name, $description, $todoId ) ) {
							header( 'Location: /list/browse/' );
						} else {
							sendMessage( 'Une erreur s\'est produite', 'error' );
						}
					}
					else sendMessage( $error, 'error', true );
				}
				
				require_once( 'view/list/view.edit.php' );
			}
			else sendMessage( 'Vous n\'avez pas la permission requise pour éditer cette liste', 'error' );
		}
		else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
	}
	else sendMessage( 'Aucune liste correspondante', 'error' );
}
else sendMessage( 'Aucune liste correspondante', 'error' );
?>