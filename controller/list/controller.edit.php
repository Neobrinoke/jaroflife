<?php
require_once( 'model/model.todo.php' );

$userId = $_SESSION['userId'];

if( !isset( $userId ) ) {
	header( 'Location: /user/connect/' );
}

$todo = new Todo( $db );
$todoId = $route->params[2];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	if( $todo->findByIdAndUserId( $todoId, $userId ) )
	{
		$result = $todo->findById( $todoId );
		if( $result )
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
		else sendMessage( 'Aucune liste correspondante', 'error' );
	}
	else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
}
else sendMessage( 'Aucune liste correspondante', 'error' );
?>