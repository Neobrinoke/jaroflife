<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todoId = $route->params[2];
$taskId = $route->params[3];

if( isset( $taskId, $todoId ) && is_numeric( $taskId ) && is_numeric( $todoId ) )
{
	$task = new Task( $db );
	$todo = new Todo( $db );
	$result = $task->findById( $taskId );
	if( $result )
	{
		if( $todo->findByIdAndUserId( $result->todo_id, $_SESSION['userId'] ) )
		{
			if( $task->remove( $taskId ) ) {
				header( 'Location: /task/browse/'.$todoId.'/' );
			} else {
				sendMessage( 'Une erreur s\'est produite', 'error' );
			}
		}
		else sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
?>