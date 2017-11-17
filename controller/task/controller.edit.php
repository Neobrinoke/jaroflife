<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$taskId = $route->params[2];

if( isset( $taskId ) && is_numeric( $taskId ) )
{
	$task = new Task( $db );
	$todo = new Todo( $db );
	
	$result = $task->findById( $taskId );
	if( $result )
	{
		if( $todo->findByIdAndUserId( $result->todo_id, $_SESSION['userId'] ) )
		{
			if( isset( $_POST['submit'] ) )
			{
				if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
				{
					$name = htmlspecialchars( $_POST['name'] );
					$priority = htmlspecialchars( $_POST['priority'] );
					$description = htmlspecialchars( $_POST['description'] );
		
					if( $name && $priority && $description )
					{
						if( $task->update( $name, $priority, $description, $taskId ) ) {
							header( 'Location: /task/read/'.$taskId.'/' );
						} else {
							sendMessage( 'Une erreur s\'est produite', 'error' );
						}
					}
					else sendMessage( 'Merci de tous completer', 'error' );
				}
				else sendMessage( 'Merci de tous completer', 'error' );
			}
			require_once( 'view/task/view.edit.php' );
		}
		else sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
?>