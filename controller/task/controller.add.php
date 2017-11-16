<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$_GET['todoId'] = $route->params[2];

if( isset( $_GET['todoId'] ) && is_numeric( $_GET['todoId'] ) )
{
	$todo = new Todo( $db );
	if( $todo->findByIdAndUserId( $_GET['todoId'], $_SESSION['userId'] ) )
	{
		if( isset( $_POST['sendAddTask'] ) )
		{
			if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
			{
				$task = new Task( $db );

				$name = htmlspecialchars( $_POST['name'] );
				$priority = htmlspecialchars( $_POST['priority'] );
				$description = htmlspecialchars( $_POST['description'] );

				if( $name && $priority && $description )
				{
					if( $task->create( $name, $priority, $description, $_SESSION['userId'], $_GET['todoId'] ) ) {
						header( 'Location: /task/browse/' );
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