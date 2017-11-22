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

if( isset( $todoId, $taskId ) && is_numeric( $todoId ) && is_numeric( $taskId ) )
{
	$result = $task->findById( $taskId );
	if( $result )
	{
		if( $todo->findByIdAndUserId( $todoId, $userId ) ) {
			require_once( 'view/task/view.read.php' );
		} else {
			sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
		} 
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
else sendMessage( 'Impossible de trouvé la tâche', 'error' );
?>