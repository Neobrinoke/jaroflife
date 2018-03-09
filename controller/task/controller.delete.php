<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$task = new Task( $db );
$todo = new Todo( $db );

$todoId = $route->params[2];
$taskId = $route->params[3];
$userId = $_SESSION['userId'];

if( isset( $taskId, $todoId ) && is_numeric( $taskId ) && is_numeric( $todoId ) )
{
	if( $task->findById( $taskId ) )
	{
		$todoMember = $todo->findByIdAndUserId( $todoId, $userId );
		if( $todoMember )
		{
			if( $todoMember->authority_id == 1 || $todoMember->authority_id == 2 )
			{
				if( $task->remove( $taskId ) ) {
					header( 'Location: /task/browse/'.$todoId.'/' );
				} else {
					sendMessage( 'Une erreur s\'est produite', 'error' );
				}
			}
			else sendMessage( 'Vous n\'avez pas la permission requise pour supprimer cette tâche', 'error' );
		}
		else sendMessage( 'Vous n\'avez pas accès à cette tâche', 'error' );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
else sendMessage( 'Impossible de trouvé la tâche', 'error' );
?>