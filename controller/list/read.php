<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /connect' );
}

$_GET['id'] = $route->params[2];

if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$task = new Task( $db );
	$todo = new Todo( $db );
	
	$result = $task->findById( $_GET['id'] );
	if( $result )
	{
		if( $todo->findByIdAndUserId( $result->todo_id, $_SESSION['userId'] ) ) {
			require_once( 'view/list/read.php' );
		} else {
			sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
		} 
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
?>