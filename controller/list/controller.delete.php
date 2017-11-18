<?php
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todoId = $route->params[2];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	$todo = new Todo( $db );
	if( $todo->findByIdAndUserId( $todoId, $_SESSION['userId'] ) )
	{
		if( $todo->remove( $todoId ) ) {
			header( 'Location: /list/browse/' );
		} else {
			sendMessage( 'Une erreur s\'est produite', 'error' );
		}
	}
	else sendMessage( "Vous n'avez pas accès à cette liste", "error" );
}
?>