<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );
require_once( 'model/model.user.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$task = new Task( $db );
$todo = new Todo( $db );
$user = new User( $db );

$todoId = $route->params[2];

function getPriority( $priority )
{
	switch( $priority )
	{
		case 1: return 'Basse';
		case 2: return 'Moyenne';
		case 3: return 'Haute';
	}
}

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	$resTodo = $todo->findById( $todoId );
	if( $resTodo )
	{
		$resTasks = $task->findByTodoId( $todoId );
		require_once( 'view/task/view.browse.php' );
	}
	else sendMessage( 'Aucune liste trouvée', 'error' );
}
else sendMessage( 'Aucune liste trouvée', 'error' );
?>