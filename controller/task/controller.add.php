<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todo = new Todo( $db );
$task = new Task( $db );

$todoId = $route->params[2];
$userId = $_SESSION['userId'];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	if( $todo->findByIdAndUserId( $todoId, $userId ) )
	{
		if( isset( $_POST['sendAddTask'] ) )
		{
			if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
			{
				$name = htmlspecialchars( $_POST['name'] );
				$priority = htmlspecialchars( $_POST['priority'] );
				$description = htmlspecialchars( $_POST['description'] );

				if( $name && $priority && $description )
				{
					if( $task->create( $name, $priority, $description, $userId, $todoId ) ) {
						header( 'Location: /task/browse/'.$todoId.'/' );
					} else {
						sendMessage( 'Une erreur s\'est produite', 'error' );
					}
				}
				else sendMessage( 'Merci de tous completer', 'error' );
			}
			else sendMessage( 'Merci de tous completer', 'error' );
		}
		
		require_once( 'view/task/view.add.php' );
	}
	else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
}
?>