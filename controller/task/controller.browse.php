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

$resTodos = $todo->findByUserId( $_SESSION['userId'] );

function getTasks( $id ) {
	global $task;
	return $task->findByTodoId( $id );
}

function getPriority( $priority )
{
	switch( $priority )
	{
		case 1: return 'Basse';
		case 2: return 'Moyenne';
		case 3: return 'Haute';
	}
}

require_once( 'view/task/view.browse.php' );
?>