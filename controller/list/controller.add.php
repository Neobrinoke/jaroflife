<?php
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$userId = $_SESSION['userId'];

if( isset( $_POST['createTodo'] ) )
{
	$todo = new Todo( $db );
	$error = [];
	$name = null;
	$description = null;

	if( isset( $_POST['name'], $_POST['description'] ) )
	{
		$name = htmlspecialchars( protect( $_POST['name'] ) );
		$description = htmlspecialchars( protect( $_POST['description'] ) );

		if( $name && $description )
		{
			if( strlen( $name ) < 4 ) {
				array_push( $error, "Le nom dois avoir une longueur supérieur à 4" );
			}

			if( strlen( $description ) < 4 ) {
				array_push( $error, "La description dois avoir une longueur supérieur à 4" );
			}
		}
		else array_push( $error, "Merci de tous compléter" );
	}
	else array_push( $error, "Merci de tous compléter" );

	if( empty( $error ) )
	{
		if( $todo->create( $name, $description, $userId ) ) {
			header( 'Location: /list/browse/' );
		} else {
			sendMessage( 'Une erreur s\'est produite', 'error' );
		}
	}
	else sendMessage( $error, 'error', true );
}

require_once( 'view/list/view.add.php' );
?>