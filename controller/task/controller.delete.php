<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$_GET['id'] = $route->params[2];

if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$task = new Task( $db );
	$todo = new Todo( $db );
	$result = $task->findById( $_GET['id'] );
	if( $result )
	{
		if( $todo->findByIdAndUserId( $result->todo_id, $_SESSION['userId'] ) )
		{
			if( $task->remove( $_GET['id'] ) ) {
				header( 'Location: /task/browse/' );
			} else {
				sendMessage( 'Une erreur s\'est produite', 'error' );
			}
		}
		else sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
?>