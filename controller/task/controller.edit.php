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
	$resTask = $task->findById( $taskId );
	if( $resTask )
	{
		$todoMember = $todo->findByIdAndUserId( $todoId, $userId );
		if( $todoMember )
		{
			if( $todoMember->authority_id == 1 || $todoMember->authority_id == 2 )
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
			else sendMessage( 'Vous n\'avez pas la permission requise pour éditer cette tâche', 'error' );
		}
		else sendMessage( "Vous n'avez pas accès à cette tâche", "error" );
	}
	else sendMessage( 'Impossible de trouvé la tâche', 'error' );
}
else sendMessage( 'Impossible de trouvé la tâche', 'error' );
?>