<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( isset( $_SESSION['userId'] ) ) {
	header( 'Location: /connect' );
}

if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$task = new Task( $db );
	$todo = new Todo( $db );
	$result = $task->getTaskById( $_GET['id'] );
	if( $result )
	{
		if( $todo->getTodoByIdAndUserId( $result->todo_id, $_SESSION['userId'] ) )
		{
			if( $task->removeTaskById( $_GET['id'] ) ) {
				sendMessage( 'La tâche à bien été supprimé', 'valid' );
			} else {
				sendMessage( 'Une erreur s\'est produite', 'error' );
			}
		}
		else sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
?>